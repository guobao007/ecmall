<?php echo $this->fetch('buy_header.html'); ?>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/goods_cart.js'; ?>" charset="utf-8"></script>
<style>
.ncc-table-style tbody tr.item_disabled td {
	background: none repeat scroll 0 0 #F9F9F9;
	height: 30px;
	padding: 10px 0;
	text-align: center;
}
</style>
<div class="ncc-wrapper">
    <div class="ncc-main">
        <div class="ncc-title">
            <h3>我的购物车</h3>
            <h5>查看购物车商品清单，增加减少商品数量，并勾选想要的商品进入下一步操作。</h5>
        </div>
        <form action="<?php echo url('app=buy&act=buy_step1'); ?>" method="POST" id="form_buy" name="form_buy">
            <input type="hidden" value="1" name="ifcart">
            <table class="ncc-table-style" nc_type="table_cart">
                <thead>
                    <tr>
                        <th class="w50"><label>
                            <input type="checkbox" checked value="1" id="selectAll">
                            全选</label></th>
                        <th></th>
                        <th>商品</th>
                        <th class="w120">单价(元)</th>
                        <th class="w120">数量</th>
                        <th class="w120">小计</th>
                        <th class="w80">操作</th>
                    </tr>
                </thead>
                <?php $_from = $this->_var['carts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('store_id', 'cart');if (count($_from)):
    foreach ($_from AS $this->_var['store_id'] => $this->_var['cart']):
?>
                <tbody>
                    <tr>
                        <th colspan="20">
                            <i class="icon-home"></i>
                            <a target="_blank" href="<?php echo url('app=store&id=' . $this->_var['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['cart']['store_name']); ?></a>
                        </th>
                    </tr>
                    <?php $_from = $this->_var['cart']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <tr id="cart_item_<?php echo $this->_var['goods']['rec_id']; ?>" nc_group="<?php echo $this->_var['goods']['rec_id']; ?>" class="shop-list">
                        <td><input type="checkbox" checked value="<?php echo $this->_var['goods']['rec_id']; ?>|<?php echo $this->_var['goods']['quantity']; ?>" id="cart_id<?php echo $this->_var['goods']['rec_id']; ?>" name="cart_id[]" nc_type="eachGoodsCheckBox"></td>
                        <td class="w60"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank" class="ncc-goods-thumb"><img src="<?php echo $this->_var['goods']['goods_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></a></td>
                        <td class="tl">
                            <dl class="ncc-goods-info">
                                <dt><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></dt>
                                <dd></dd>
                            </dl>
                        </td>
                        <td class="w120">￥<em id="item<?php echo $this->_var['goods']['rec_id']; ?>_price"><?php echo $this->_var['goods']['price']; ?></em></td>
                        <td class="w120 ws0">
                            <a href="JavaScript:void(0);" onclick="decrease_quantity(<?php echo $this->_var['goods']['rec_id']; ?>);" title="减少商品件数" class="add-substract-key tip">-</a>
                            <input id="input_item_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['quantity']; ?>" orig="<?php echo $cart_info['goods_num']; ?>" changed="<?php echo $this->_var['goods']['quantity']; ?>" onkeyup="change_quantity(<?php echo $this->_var['store_id']; ?>, <?php echo $this->_var['goods']['rec_id']; ?>, <?php echo $this->_var['goods']['spec_id']; ?>, this);" type="text" class="text w20"/>
                            <a href="JavaScript:void(0);" onclick="add_quantity(<?php echo $this->_var['goods']['rec_id']; ?>);" title="增加商品件数" class="add-substract-key tip" >+</a>
                        </td>
                        <td class="w120">
                            ￥<em id="item<?php echo $this->_var['goods']['rec_id']; ?>_subtotal" nc_type="eachGoodsTotal"><?php echo $this->_var['goods']['subtotal']; ?></em>
                        </td>
                        <td class="w80">
                            <a href="javascript:void(0)" onclick="collect_goods('<?php echo $this->_var['goods']['goods_id']; ?>');">收藏</a><br/>
                            <a href="javascript:void(0)" onclick="drop_cart_item(<?php echo $this->_var['goods']['rec_id']; ?>);">删除</a></td>
                    </tr>
                    <tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <td class="tr" colspan="20"><div class="ncc-store-account">
                        <dl>
                          <dt>店铺合计：</dt>
                          <dd>￥<em nc_type="eachStoreTotal"></em></dd>
                        </dl>
                      </div></td>
                    </tr>
                </tbody>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <tfoot>
                <tr>
                    <td colspan="20"><div class="ncc-all-account">商品总价（不含运费）￥<em id="cartTotal"><?php echo $this->_var['cart']['amount']; ?></em>元</div></td>
                    </tr>
              </tfoot>
            </table>
        </form>
    </div>
    <div class="ncc-bottom"><a id="next_submit" href="javascript:void(0)" class="ncc-btn ncc-btn-acidblue fr"><i class="icon-pencil"></i>下一步，填写核对购物信息</a></div>
</div>
<?php echo $this->fetch('footer.html'); ?>