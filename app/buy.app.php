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
    }
    /**
     * 购物车、直接购买第一步:选择收获地址和配送方式
     */
    public function buy_step1(){
        dump($_POST);
    }
}
