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
        list($store_cart_list,$store_goods_total) = $model_cart->calcCartList($store_cart_list);
        $result['store_cart_list'] = $store_cart_list;
        $result['store_goods_total'] = $store_goods_total;
        
        //获取每个店铺下的运费模板
        include_once(ROOT_PATH . '/includes/order.base.php');
        $order_base = new BaseOrder(array());
        $store_ids = array_keys($store_cart_list);
        foreach ($store_ids as $v) {
            /* 配送方式 */
            $result['shipping_methods'][$v] = $order_base->_get_shipping_methods($v);
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
        list($store_cart_list,$store_goods_total) = $model_cart->calcCartList($store_cart_list);
        
        //计算每个店铺运费
        $store_freight_total = $this->calcStoreFreight($post['shipping']);
        
        //计算店铺最终订单实际支付金额(加上运费)
        $store_final_order_total = $model_cart->reCalcGoodsTotal($store_goods_total,$store_freight_total,'freight');
        
        //整理已经得出的固定数据，准备下单
        $input = array();
        $input['pay_message'] = $post['pay_message'];
        $input['address_info'] = $input_address_info;
//        $input['voucher_list'] = $input_voucher_list;
        $input['store_goods_total'] = $store_goods_total;
        $input['store_final_order_total'] = $store_final_order_total;
        $input['store_freight_total'] = $store_freight_total;
        $input['store_cart_list'] = $store_cart_list;
        $input['type'] = 'material';
        $input['otype'] = 'normal';
        
        try {
            //生成订单
            list($pay_sn,$order_list) = $this->createOrder($input, $user_id, $user_name);
            
        }catch (Exception $e){
            
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
    public function calcStoreFreight($freight_list) {
        if (!is_array($freight_list) || empty($freight_list)) return;
        //免费和固定运费计算结果
        foreach ($freight_list as $k=>$v) {
            $freight_info = explode('|', $v);
            $return_list[$freight_info[1]] = $freight_info[2];
        }
        return $return_list;
    }
}
