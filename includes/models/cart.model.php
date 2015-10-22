<?php

/* 购物车 cart */
class CartModel extends BaseModel
{
    var $table  = 'cart';
    var $prikey = 'rec_id';
    var $_name  = 'cart';

    var $_relation = array(
        'belongs_to_store'  => array(
            'type'      =>  BELONGS_TO,
            'model'     =>  'store',
            'reverse'   =>  'has_cart',
        ),
        'belongs_to_goodsspec'  => array(
            'type'      =>  BELONGS_TO,
            'model'     =>  'goodsspec',
            'foreign_key' => 'spec_id',
            'reverse'   =>  'has_cart_items',
        ),
    );

    /**
     *    获取商品种类数
     *
     *    @author    Garbin
     *    @return    void
     */
    function get_kinds($sess_id, $user_id = 0)
    {
        $where_user_id = $user_id ? " AND user_id={$user_id}" : '';
        $kinds = $this->db->getOne("SELECT COUNT(DISTINCT goods_id) as c FROM {$this->table} WHERE session_id='{$sess_id}'{$where_user_id}");

        return $kinds;
    }
    
    /**
     * 获取购物车列表
     */
    public function listCart($condition){
        $cart_list = $this->find(array(
            'conditions' => $condition,
            'join'       => 'belongs_to_goodsspec',
        ));
        //获取店铺名称
        $store_mod = & m('store');
        foreach ($cart_list as $k=>$v){
            $store_info = $store_mod->get_one_info($v['store_id'],'store_name');
            $cart_list[$k]['store_name'] = $store_info['store_name'];
        }
        return !is_array($cart_list) ? array() : $cart_list;
    }
    
    /**
     * 取商品最新的在售信息
     * @param unknown $cart_list
     * @return array
     */
    public function getOnlineCartList($cart_list) {
        if (empty($cart_list) || !is_array($cart_list)) return $cart_list;
        //验证商品是否有效
        $goods_id_array = array();
        foreach ($cart_list as $key => $cart_info) {
            $goods_id_array[] = $cart_info['goods_id'];
        }
        $model_goods = & m('goods');
        $goods_online_list = $model_goods->get_list(array(
            'conditions' =>"g.goods_id in(".implode(',', $goods_id_array).") AND s.state = 1"
            ));
        
        foreach ((array)$cart_list as $key => $cart_info) {
            $cart_list[$key]['state'] = true; //店铺状态
            $cart_list[$key]['storage_state'] = true; //库存状态
            if (in_array($cart_info['goods_id'],array_keys($goods_online_list))) {
                $goods_online_info = $goods_online_list[$cart_info['goods_id']]; 
                $cart_list[$key]['if_show'] = $goods_online_info['if_show']; //是否上架  1是  0否
                $cart_list[$key]['closed'] = $goods_online_info['closed'];   //是否禁售  1是  0否
                if ($cart_info['quantity'] > $cart_info['stock']) {
                    $cart_list[$key]['storage_state'] = false;
                }
            } else {
                //如果商品下架
                $cart_list[$key]['state'] = false;
                $cart_list[$key]['storage_state'] = false;
                $cart_list[$key]['if_show'] = false; //是否上架  1是  0否
                $cart_list[$key]['closed'] = true;   //是否禁售  1是  0否
            }
            $cart_list[$key]['otype'] = 'normal';
        }
        return $cart_list;
    }
    
    /**
     * 从购物车数组中得到商品列表
     * @param array $cart_list
     */
    public function getGoodsList($cart_list){
        if (empty($cart_list) || !is_array($cart_list)) return $cart_list;
        $goods_list = array();
        $i = 0;
        foreach ($cart_list as $key => $cart) {
            if (!$cart['state'] || !$cart['storage_state'] || !$cart['if_show'] || $cart['closed']) continue;
            //购买数量
            $quantity = $cart['quantity'];
            //普通商品
            $goods_list[$i]['quantity'] = $quantity;
            $goods_list[$i]['goods_id'] = $cart['goods_id'];
            $goods_list[$i]['store_id'] = $cart['store_id'];
            $goods_list[$i]['spec_id'] = $cart['spec_id'];
            $goods_list[$i]['goods_name'] = $cart['goods_name'];
            $goods_list[$i]['price'] = $cart['price'];
            $goods_list[$i]['store_name'] = $cart['store_name'];
            $goods_list[$i]['goods_image'] = $cart['goods_image'];
            $goods_list[$i]['spec_1'] = $cart['spec_1'];
            $goods_list[$i]['spec_2'] = $cart['spec_2'];
            $goods_list[$i]['color_rgb'] = $cart['color_rgb'];
            $goods_list[$i]['otype'] = $cart['otype'];
            $i++;
        }
        return $goods_list;
    }
    
    /**
     * 将下单商品列表转换为以店铺ID为下标的数组
     *
     * @param array $cart_list
     * @return array
     */
    public function getStoreCartList($cart_list) {
        if (empty($cart_list) || !is_array($cart_list))
            return $cart_list;
        $new_array = array();
        foreach ($cart_list as $cart) {
            $new_array[$cart['store_id']][] = $cart;
        }
        return $new_array;
    }
    
    /**
     * 商品金额计算(分别对每个商品、每个店铺小计)
     * @param unknown $store_cart_list 以店铺ID分组的购物车商品信息
     * @return array
     */
    public function calcCartList($store_cart_list) {
        if (empty($store_cart_list) || !is_array($store_cart_list))
            return array($store_cart_list, array(), 0);

        //存放每个店铺的商品总金额
        $store_goods_total = array();
        //存放本次下单所有店铺商品总金额
        $order_goods_total = 0;

        foreach ($store_cart_list as $store_id => $store_cart) {
            $tmp_amount = 0;
            foreach ($store_cart as $key => $cart_info) {
                $store_cart[$key]['goods_total'] = number_format(($cart_info['price'] * $cart_info['quantity']),2,'.','');
                $tmp_amount += $store_cart[$key]['goods_total'];
            }
            $store_cart_list[$store_id] = $store_cart;
            $store_goods_total[$store_id] = number_format($tmp_amount,2,'.','');;
        }
        return array($store_cart_list, $store_goods_total);
    }
    
    /**
     * 重新计算每个店铺最终商品总金额(最初计算金额减去各种优惠/加运费)
     * @param array $store_goods_total 店铺商品总金额
     * @param array $preferential_array 店铺优惠活动内容
     * @param string $preferential_type 优惠类型，目前只有一个 'mansong'
     * @return array 返回扣除优惠后的店铺商品总金额
     */
    public function reCalcGoodsTotal($store_goods_total, $preferential_array, $preferential_type) {
        $deny = empty($store_goods_total) || !is_array($store_goods_total) || empty($preferential_array) || !is_array($preferential_array);
        if ($deny)
            return $store_goods_total;

        switch ($preferential_type) {
//            case 'voucher':
//                if (!C('voucher_allow'))
//                    return $store_goods_total;
//                foreach ($preferential_array as $store_id => $voucher_info) {
//                    $store_goods_total[$store_id] -= $voucher_info['voucher_price'];
//                }
//                break;

            case 'freight':
                foreach ($preferential_array as $store_id => $freight_total) {
                    $store_goods_total[$store_id] += $freight_total;
                }
                break;
        }
        return $store_goods_total;
    }

    /**
     * 删除购物车商品
     * @param int $rec_id_str 购物车ID (1,2)
     */
    public function delCart($rec_id_str){
        /* 传入rec_id，删除并返回购物车统计即可 */
        if (!$rec_id_str)
        {
            return false;
        }

        /* 从购物车中删除 */
        $droped_rows = $this->drop('rec_id in (' . $rec_id_str . ') AND session_id=\'' . SESS_ID . '\'', 'store_id');
        if ($droped_rows)
        {
            return true;
        }else{
            return false;
        }
    }

}

?>