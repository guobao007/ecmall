<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>
<div class="flow_chart">
    <div class="pos_x1 bg_a1" title="选购商品"></div>
    <div class="pos_x2 bg_b2" title="完成订单信息并下单"></div>
    <div class="pos_x3 bg_c2" title="下单完成并支付"></div>
</div>

<div class="content">

    <div class="module_common">

        <div class="buy">
            <h3><b class="ico">您购物车中的商品</b></h3>
        <?php $_from = $this->_var['carts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('store_id', 'cart');if (count($_from)):
    foreach ($_from AS $this->_var['store_id'] => $this->_var['cart']):
?>
            <div class="con">
                <h4>店铺: <a href="<?php echo url('app=store&id=' . $this->_var['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['cart']['store_name']); ?></a></h4>
                <div class="buytable">
                    <table>
                        <tr>
                            <th width="420">店铺商品</th>
                            <th>价格</th>
                            <th>数量</th>
                            <th>小计</th>
                            <th>操作</th>
                        </tr>
                        <?php $_from = $this->_var['cart']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                        <tr id="cart_item_<?php echo $this->_var['goods']['rec_id']; ?>">
                            <td class="padding1">
                                <p class="ware_pic"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="65" height="65" /></a></p>
                                <h3>
                                    <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a>
                                    <span class="attr"><?php echo htmlspecialchars($this->_var['goods']['specification']); ?></span>
                                </h3>
                            </td>
                            <td class="align1"><span class="price1"><?php echo price_format($this->_var['goods']['price']); ?></span></td>
                            <td class="align2">
                                <img src="<?php echo $this->res_base . "/" . 'images/subtract.gif'; ?>" onclick="decrease_quantity(<?php echo $this->_var['goods']['rec_id']; ?>);" alt="decrease" width="12" height="12" />
                                <input id="input_item_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['quantity']; ?>" orig="<?php echo $this->_var['goods']['quantity']; ?>" changed="<?php echo $this->_var['goods']['quantity']; ?>" onkeyup="change_quantity(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>, <?php echo $this->_var['goods']['spec_id']; ?>, this);" class="text1 width3" type="text" />
                                <img src="<?php echo $this->res_base . "/" . 'images/adding.gif'; ?>"onclick="add_quantity(<?php echo $this->_var['goods']['rec_id']; ?>);" alt="increase" width="12" height="12" />
                            </td>
                            <td class="align1"><span class="price2" id="item<?php echo $this->_var['goods']['rec_id']; ?>_subtotal"><?php echo price_format($this->_var['goods']['subtotal']); ?></span></td>
                            <td class="align2">
                                <a class="move" href="javascript:;" onclick="move_favorite(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>, <?php echo $this->_var['goods']['goods_id']; ?>);">加入收藏夹</a>
                                <a class="del" href="javascript:;" onclick="drop_cart_item(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>);">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </table>
                    <div class="buy_foot">
                        <p>商品总价:&nbsp;&nbsp;<strong class="fontsize1" id="cart<?php echo $this->_var['store_id']; ?>_amount"><?php echo price_format($this->_var['cart']['amount']); ?></strong></p>
                        <p>
                            <a href="<?php echo url('app=order&goods=cart&store_id=' . $this->_var['store_id']. ''); ?>" class="btn">填写并确认订单</a>
                            <a href="<?php echo url('app=store&id=' . $this->_var['store_id']. ''); ?>" class="back">继续购物</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>