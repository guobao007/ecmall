<?php
/**
 * 下单
 *
 * @author QT
 */
class buyModel extends BaseModel{
    /**
     * 购买第一步
     * @param array $cart_id 购物车
     * @param int $ifcart 是否为购物车
     * @param int $invalid_cart 无效购物车
     * @param int $user_id 会员编号
     * @param int $store_id 店铺编号
     */
    public function buyStep1($cart_id, $ifcart, $invalid_cart, $user_id, $store_id) {
        $model_cart = & m('cart');
        $result = array();
        //取得POST ID和购买数量
        $buy_items = $this->_parseItems($cart_id);
        //来源于购物车
        if($ifcart){
             //删除购物车中无效商品
            if ($ifcart) {
                if (is_array($invalid_cart)) {
                    $cart_id_str = implode(',',$invalid_cart);
                    if (preg_match_all('/^[\d,]+$/',$cart_id_str,$matches)) {
                        $model_cart->delCart($cart_id_str);
                    }
                }
            }
            //取购物车列表
            $condition = "user_id = " . $user_id . " AND rec_id in (".implode(',',array_keys($buy_items)).") AND session_id='" . SESS_ID . "'";
            $cart_list = $model_cart->listCart($condition);
            //取商品最新的在售信息
            $cart_list = $model_cart->getOnlineCartList($cart_list);
            //到得商品列表
            $goods_list = $model_cart->getGoodsList($cart_list);
            //购物车列表以店铺ID分组显示
            $store_cart_list = $model_cart->getStoreCartList($cart_list);
            //标识来源于购物车
            $result['ifcart'] = 1;
        }else{ //来源于直接购买
            
        }
        //商品金额计算(分别对每个商品、每个店铺小计)
        list($store_cart_list,$store_goods_total,$store_goods_num) = $model_cart->calcCartList($store_cart_list);
        $result['store_cart_list'] = $store_cart_list;
        $result['store_goods_total'] = $store_goods_total;
        
        //获取每个店铺下的运费模板
        include_once(ROOT_PATH . '/includes/order.base.php');
        $order_base = new BaseOrder(array());
        $store_ids = array_keys($store_cart_list);
        foreach ($store_ids as $v) {
            /* 配送方式 */
            $shippings = $order_base->_get_shipping_methods($v);
            foreach ($shippings as $key=>$val){
                /* 配送费用=首件费用＋超出的件数*续件费用 */
                $shipping_fee = $val['first_price'] + ($store_goods_num[$v]-1) * $val['step_price'];
                $shippings[$key]['shipping_fee'] = $shipping_fee;
            }
            $result['shipping_methods'][$v] = $shippings;
        }
        /* 获取我的收货地址 */
        $my_address = array_values($order_base->_get_my_address($user_id.' limit 1'));
        $result['address_info'] = $my_address[0];
        $result['regions'] = $order_base->_get_regions();
        return $result;
    }
    
    /**
     * 购物车、直接购买第二步:保存订单入库，产生订单号，开始选择支付方式
     *
     */
    public function buyStep2($post, $user_id, $user_name) {
        $model_cart = & m('cart');
        //取得商品ID和购买数量
        $input_buy_items = $this->_parseItems($post['cart_id']);
        //验证收货地址
        $input_address_id = intval($post['address_id']);
        if ($input_address_id <= 0) {
            return array('error' => '请选择收货地址');
        } else {
            $input_address_info = & m('address')->get('addr_id=' . $input_address_id);
            if ($input_address_info['user_id'] != $user_id) {
                return array('error' => '请选择收货地址');
            }
        }
        /* 验证收货人信息填写是否完整 */
        $consignee_info = $this->_valid_consignee_info($input_address_info);
        if ($post['ifcart']) { //来源于购物车
            //取购物车列表
            $condition = "user_id = " . $user_id . " AND rec_id in (".implode(',',array_keys($input_buy_items)).") AND session_id='" . SESS_ID . "'";
            $cart_list = $model_cart->listCart($condition);
            //取商品最新的在售信息
            $cart_list = $model_cart->getOnlineCartList($cart_list);
            //到得商品列表
            $goods_list = $model_cart->getGoodsList($cart_list);
            //购物车列表以店铺ID分组显示
            $store_cart_list = $model_cart->getStoreCartList($cart_list);
        }else{//来源于直接购买
            
        }
        //商品金额计算(分别对每个商品、每个店铺小计)
        list($store_cart_list,$store_goods_total,$store_goods_num) = $model_cart->calcCartList($store_cart_list);
        //计算每个店铺运费
        list($store_freight_total,$shipping_list) = $this->calcStoreFreight($post['shipping'],$store_goods_num);
        //计算店铺最终订单实际支付金额(加上运费)
        $store_final_order_total = $model_cart->reCalcGoodsTotal($store_goods_total,$store_freight_total,'freight');
        
        //整理已经得出的固定数据，准备下单
        $input = array();
        $input['pay_message'] = $post['pay_message'];
        $input['store_name'] = $post['store_name'];
        $input['address_info'] = $input_address_info;
//        $input['voucher_list'] = $input_voucher_list;
        $input['store_goods_total'] = $store_goods_total;
        $input['store_final_order_total'] = $store_final_order_total;
        $input['store_freight_info'] = $shipping_list;
        $input['store_freight_total'] = $store_freight_total;
        $input['store_cart_list'] = $store_cart_list;
        $input['type'] = 'material';
        $input['otype'] = 'normal';
        try {
            //生成订单
            list($pay_sn,$order_list) = $this->createOrder($input, $user_id, $user_name);
            if (!$order_list || !$pay_sn){
                return array('error' =>'新增订单失败');;
            }
            return array('pay_sn'=>$pay_sn,'order_list'=>$order_list,'store_cart_list'=>$store_cart_list);
        }catch (Exception $e){
            return array('error' => $e->getMessage());
        }
    }
    
    /**
     * 生成订单
     * @param array $input
     * @throws Exception
     * @return array array(支付单sn,订单列表)
     */
    public function createOrder($input, $user_id, $user_name) {
        extract($input);
        $model_order =& m('order');
        //存储生成的订单,函数会返回该数组
        $order_list = array();
        
        $pay_sn = $this->makePaySn($user_id);
        //收货人信息
        $reciver_info = array();
        $reciver_info['address'] = $address_info['region_name'].'&nbsp;'.$address_info['address'];
        $reciver_info['phone'] = $address_info['phone_mob'].($address_info['phone_tel'] ? ','.$address_info['phone_tel'] : null);
        $reciver_name = $address_info['consignee'];
        
        /* 默认都是待付款 */
        $order_status = ORDER_PENDING;
        /* 买家信息 */
        $visitor     =& env('visitor');
        $order_goods = array();
        foreach ($store_cart_list as $store_id => $goods_list) {
            /* 处理订单基本信息 */
            $base_info = $this->_handle_order_info($input, $store_id, $pay_sn);
            if (!$base_info){
                /* 基本信息验证不通过 */
                throw new Exception('处理订单基本信息错误');
            }
            /* 处理订单收货人信息 */
            $consignee_info = $this->_handle_consignee_info($input['address_info'], $input['store_freight_info'][$store_id]);
            if (!$consignee_info){
                /* 收货人信息验证不通过 */
                throw new Exception('收货人信息验证不通过');
            }
            /* 插入订单基本信息 */
            //订单总实际总金额，可能还会在此减去折扣等费用
            $base_info['order_amount']  =   $base_info['goods_amount'] + $consignee_info['shipping_fee'] - $base_info['discount'];
            /* 如果优惠金额大于商品总额和运费的总和 */
            if ($base_info['order_amount'] < 0)
            {
                $base_info['order_amount'] = 0;
                $base_info['discount'] = $base_info['goods_amount'] + $consignee_info['shipping_fee'];
            }
            $order_model =& m('order');
            $order_id    = $order_model->add($base_info);
            if (!$order_id){
                /* 插入基本信息失败 */
                throw new Exception('新增订单失败');
            }
            $order_list[$order_id] = $base_info;
            /* 插入收货人信息 */
            $consignee_info['order_id'] = $order_id;
            $order_extm_model =& m('orderextm');
            $order_extm_model->add($consignee_info);
            //生成order_goods订单商品数据
            $i = 0;
            /* 插入商品信息 */
            $goods_items = array();
            foreach ($goods_list as $key=>$goods_info) {
                $goods_items[] = array(
                    'order_id'      =>  $order_id,
                    'goods_id'      =>  $goods_info['goods_id'],
                    'goods_name'    =>  $goods_info['goods_name'],
                    'spec_id'       =>  $goods_info['spec_id'],
                    'specification' =>  $goods_info['specification'],
                    'price'         =>  $goods_info['price'],
                    'quantity'      =>  $goods_info['quantity'],
                    'goods_image'   =>  $goods_info['goods_image'],
                );
            }
            $order_goods_model =& m('ordergoods');
            $order_goods_model->add(addslashes_deep($goods_items)); //防止二次注入
        }
        return array($pay_sn,$order_list);
    }
    
    /**
     * 得到所购买的id和数量
     *
     */
    private function _parseItems($cart_id) {
        //存放所购商品ID和数量组成的键值对
        $buy_items = array();
        if (is_array($cart_id)) {
            foreach ($cart_id as $value) {
                if (preg_match_all('/^(\d{1,10})\|(\d{1,6})$/', $value, $match)) {
                    $buy_items[$match[1][0]] = $match[2][0];
                }
            }
        }
        return $buy_items;
    }
    
    /**
     * 根据地区选择计算出所有店铺最终运费
     * @param array $freight_list 运费信息(店铺ID，运费，运费模板ID，购买数量)
     * @param int $city_id 市级ID
     * @return array 返回店铺ID=>运费
     */
    public function calcStoreFreight($freight_list,$goods_num) {
        if (!is_array($freight_list) || empty($freight_list) || empty($goods_num)) return;
        //免费和固定运费计算结果
        $store_freight_total = array();
        $shipping_list = array();
        $shipping_model =& m('shipping');
        foreach ($freight_list as $k=>$v) {
            $freight_info = explode('|', $v);
            /* 计算配送费用 */
            $shipping_info  = $shipping_model->get("shipping_id={$freight_info[0]} AND store_id={$freight_info[1]} AND enabled=1");
            if (empty($shipping_info)) {
                return array('error' => '没有指定的配送方式');
            }
            /* 配送费用=首件费用＋超出的件数*续件费用 */
            $shipping_fee = $shipping_info['first_price'] + ($goods_num[$freight_info[1]]-1) * $shipping_info['step_price'];
            $store_freight_total[$freight_info[1]] = $shipping_fee;
            $shipping_list[$freight_info[1]]['shipping_id'] = $shipping_info['shipping_id'];
            $shipping_list[$freight_info[1]]['shipping_name'] = $shipping_info['shipping_name'];
            $shipping_list[$freight_info[1]]['shipping_fee'] = $shipping_fee;
        }
        return array($store_freight_total,$shipping_list);
    }
    
    /**
     * 生成支付单编号(两位随机 + 从2000-01-01 00:00:00 到现在的秒数+微秒+会员ID%1000)，该值会传给第三方支付接口
     * 长度 =2位 + 10位 + 3位 + 3位  = 18位
     * 1000个会员同一微秒提订单，重复机率为1/100
     * @return string
     */
    public function makePaySn($user_id) {
        return mt_rand(10, 99)
                . sprintf('%010d', time() - 946656000)
                . sprintf('%03d', (float) microtime() * 1000)
                . sprintf('%03d', (int) $user_id % 1000);
    }
    
    /**
     *    生成订单号
     *
     *    @author    Garbin
     *    @return    string
     */
    function _gen_order_sn()
    {
        /* 选择一个随机的方案 */
        mt_srand((double) microtime() * 1000000);
        $timestamp = gmtime();
        $y = date('y', $timestamp);
        $z = date('z', $timestamp);
        $order_sn = $y . str_pad($z, 3, '0', STR_PAD_LEFT) . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

        $model_order =& m('order');
        $orders = $model_order->find('order_sn=' . $order_sn);
        if (empty($orders))
        {
            /* 否则就使用这个订单号 */
            return $order_sn;
        }

        /* 如果有重复的，则重新生成 */
        return $this->_gen_order_sn();
    }
    
    /**
     *    处理订单基本信息,返回有效的订单信息数组
     *
     *    @author    Garbin
     *    @param     array $input
     *    @param     int $store_id
     *    @param     int $pay_sn
     *    @return    array
     */
    function _handle_order_info($input, $store_id, $pay_sn)
    {
        /* 默认都是待付款 */
        $order_status = ORDER_PENDING;

        /* 买家信息 */
        $visitor     =& env('visitor');
        $user_id     =  $visitor->get('user_id');
        $user_name   =  $visitor->get('user_name');

        /* 返回基本信息 */
        return array(
            'order_sn'      =>  $this->_gen_order_sn(),
            'pay_sn'        =>  $pay_sn,
            'type'          =>  $input['type'],
            'extension'     =>  $input['otype'],
            'seller_id'     =>  $store_id,
            'seller_name'   =>  addslashes($input['store_name'][$store_id]),
            'buyer_id'      =>  $user_id,
            'buyer_name'    =>  addslashes($user_name),
            'buyer_email'   =>  $visitor->get('email'),
            'status'        =>  $order_status,
            'add_time'      =>  gmtime(),
            'goods_amount'  =>  $input['store_goods_total'][$store_id],
            'discount'      =>  isset($input['discount']) ? $input['discount'] : 0,
            'anonymous'     =>  intval($input['anonymous']),
            'postscript'          =>  trim($input['pay_message'][$store_id]),
        );
    }
    
    /**
     *    处理收货人信息，返回有效的收货人信息
     *
     *    @author    Garbin
     *    @param     array $goods_info
     *    @param     array $post
     *    @return    array
     */
    function _handle_consignee_info($address_info, $store_freight_info)
    {
        return array(
            'consignee'     =>  $address_info['consignee'],
            'region_id'     =>  $address_info['region_id'],
            'region_name'   =>  $address_info['region_name'],
            'address'       =>  $address_info['address'],
            'zipcode'       =>  $address_info['zipcode'],
            'phone_tel'     =>  $address_info['phone_tel'],
            'phone_mob'     =>  $address_info['phone_mob'],
            'shipping_id'   =>  $store_freight_info['shipping_id'],
            'shipping_name' =>  addslashes($store_freight_info['shipping_name']),
            'shipping_fee'  =>  $store_freight_info['shipping_fee'],
        );
    }
    
    /**
     *    验证收货人信息是否合法
     *
     *    @author    Garbin
     *    @param     array $consignee
     *    @return    void
     */
    function _valid_consignee_info($consignee) {
        if (!$consignee['consignee']) {
            throw new Exception('收货人姓名不能为空');
        }
        if (!$consignee['region_id']) {
            throw new Exception('请选择地区');
        }
        if (!$consignee['address']) {
            throw new Exception('请填写详细地址');
        }
        if (!$consignee['phone_tel'] && !$consignee['phone_mob']) {
            throw new Exception('固定电话和手机号码至少填一个');
        }
        return $consignee;
    }
}
