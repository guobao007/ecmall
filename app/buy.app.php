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
