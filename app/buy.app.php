<?php

/**
 * 购买流程(下订单)
 *
 * @author QT
 */
class buyApp extends ShoppingbaseApp{
    public function __construct() {
        parent::__construct();
        $this->order = & m('order');
        $this->cart  = & m('cart');
        $this->buy  = & m('buy');
        $this->member  = & m('member');
        $this->goodsstatistics  =& m('goodsstatistics');
    }
    /**
     * 购物车、直接购买第一步:选择收获地址和配送方式
     */
    public function buy_step1(){
        $result = $this->buy->buyStep1($_POST['cart_id'], $_POST['ifcart'], $_POST['invalid_cart'], $_SESSION['user_info']['user_id'], $_SESSION['user_info']['store_id']);
        if(!empty($result['error'])) {
            $this->show_warning($result['error']);
        }
        $this->assign('ifcart', $result['ifcart']);
        //商品金额计算(分别对每个商品、每个店铺小计)
        $this->assign('store_cart_list', $result['store_cart_list']);
        $this->assign('store_goods_total', $result['store_goods_total']);
        //输出用户收货地址
        $this->assign('address_info', $result['address_info']);
        //输出配送方式
        $this->assign('shipping_methods', $result['shipping_methods']);
        //地区
        $this->assign('regions', $result['regions']);
        //标识 购买流程执行第几步
        $this->assign('buy_step','step2');
        $this->display('buy_step1.html');
    }
    
    /**
     * 购物车、直接购买第二步:保存订单入库，产生订单号，开始选择支付方式
     *
     */
    public function buy_step2() {
        $result = $this->buy->buyStep2($_POST, $_SESSION['user_info']['user_id'], $_SESSION['user_info']['user_name']);
        if(!empty($result['error'])) {
            $this->show_message($result['error'], 'go_back', 'index.php?app=cart');
        }
        foreach ($result['order_list'] as $order_id=>$order_info) {
            /* 下单完成后清理商品，如清空购物车，或将团购拍卖的状态转为已下单之类的 */
            $this->cart->_clear_goods($order_id,$order_info['seller_id']);
            /* 减去商品库存 */
            $stock_info = $this->order->updateGoodsStorageNum('-', $order_id);
            if(!$stock_info){
                $this->show_message('更新库存失败', 'go_back', 'index.php?app=cart');
            }
            /* 获取订单信息 */
            $order_info = $this->order->get($order_id);
            /* 发送事件 */
            $feed_images = array();
            foreach ($result['store_cart_list'][$order_info['seller_id']] as $_gi)
            {
                $feed_images[] = array(
                    'url'   => SITE_URL . '/' . $_gi['goods_image'],
                    'link'  => SITE_URL . '/' . url('app=goods&id=' . $_gi['goods_id']),
                );
            }
            $this->send_feed('order_created', array(
                'user_id'   => $user_id,
                'user_name' => addslashes($user_name),
                'seller_id' => $order_info['seller_id'],
                'seller_name' => $order_info['seller_name'],
                'store_url' => SITE_URL . '/' . url('app=store&id=' . $order_info['seller_id']),
                'images'    => $feed_images,
            ));
            $buyer_address = $order_info['buyer_email'];
            $member_info  = $this->member->get($order_info['store_id']);
            $seller_address= $member_info['email'];
            /* 发送给买家下单通知 */
            $buyer_mail = get_mail('tobuyer_new_order_notify', array('order' => $order_info));
            $this->_mailto($buyer_address, addslashes($buyer_mail['subject']), addslashes($buyer_mail['message']));

            /* 发送给卖家新订单通知 */
            $seller_mail = get_mail('toseller_new_order_notify', array('order' => $order_info));
            $this->_mailto($seller_address, addslashes($seller_mail['subject']), addslashes($seller_mail['message']));
            /* 更新下单次数 */
            $goods_ids = array();
            foreach ($result['store_cart_list'][$order_info['seller_id']] as $goods)
            {
                $goods_ids[] = $goods['goods_id'];
            }
            $this->goodsstatistics->edit($goods_ids, 'orders=orders+1');
        }
        //转向到商城支付页面
        $pay_url = 'index.php?app=buy&act=pay&pay_sn='.$result['pay_sn'];
        /* 到收银台付款 */
        header('Location:' . $pay_url);
    }
    
    /**
     * 下单时支付页面
     */
    public function pay() {
        dump($_GET);
    }
    
    /**
     * 加载买家收货地址
     *
     */
    public function load_addr() {
        /* 取得列表数据 */
        $model_address =& m('address');
        //如果传入ID，先删除再查询
        if (!empty($_GET['id']) && intval($_GET['id']) > 0) {
            $drop_count = $model_address->drop("user_id = " . $this->visitor->get('user_id') . " AND addr_id =" . $_GET['id']);
        }
        $addresses     = $model_address->find(array(
            'conditions'    => 'user_id = ' . $this->visitor->get('user_id'),
        ));
        $this->assign('address_list', $addresses);
        $this->display('buy_address.load.html');
    }
    
    /**
     * 添加新的收货地址
     *
     */
    public function add_addr(){
        if(IS_POST){
            /* 电话和手机至少填一项 */
            if (!$_POST['phone_tel'] && !$_POST['phone_mob'])
            {
                $this->json_error('手机号码或固定电话请至少填写一个');
                return;
            }

            $region_name = $_POST['region_name'];
            $data = array(
                'user_id'       => $this->visitor->get('user_id'),
                'consignee'     => $_POST['consignee'],
                'region_id'     => $_POST['region_id'],
                'region_name'   => $_POST['region_name'],
                'address'       => $_POST['address'],
                'zipcode'       => $_POST['zipcode'],
                'phone_tel'     => $_POST['phone_tel'],
                'phone_mob'     => $_POST['phone_mob'],
            );
            $model_address =& m('address');
            if (!($address_id = $model_address->add($data)))
            {
                $this->json_error($model_address->get_error());
                return;
            }
            $this->json_result(array('addr_id'=>$address_id));
        }else{
            //获取每个店铺下的运费模板
            include_once(ROOT_PATH . '/includes/order.base.php');
            $order_base = new BaseOrder(array());
            $regions = $order_base->_get_regions();
            $this->assign('regions',$regions);
            $this->display('buy_address.add.html');
        }
    }
}
