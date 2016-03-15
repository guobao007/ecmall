<style>
.ncc-table-style tbody tr.item_disabled td {
	background: none repeat scroll 0 0 #F9F9F9;
	height: 30px;
	padding: 10px 0;
	text-align: center;
}
</style>
<div class="ncc-receipt-info">
    <div class="ncc-receipt-info-title">
        <h3>商品清单</h3>
        <?php if ($this->_var['ifcart']): ?>
        <a href="index.php?app=cart">返回购物车</a>
        <?php endif; ?>
    </div>
    <table class="ncc-table-style">
        <thead>
            <tr>
                <th class="w20"></th>
                <th></th>
                <th>商品</th>
                <th class="w120">单价(元)</th>
                <th class="w120">数量</th>
                <th class="w120">小计</th>
                <th class="w160">配送方式</th>
            </tr>
        </thead>
        <?php $_from = $this->_var['store_cart_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('store_id', 'cart_list');if (count($_from)):
    foreach ($_from AS $this->_var['store_id'] => $this->_var['cart_list']):
?>
        <tbody>
            <tr>
                <th colspan="20"><i class="icon-home"></i><a target="_blank" href="<?php echo url('app=store&id=' . $this->_var['store_id']. ''); ?>"><?php echo $this->_var['cart_list']['0']['store_name']; ?></a>
                    <input type="hidden" value="<?php echo $this->_var['cart_list']['0']['store_name']; ?>" name="store_name[]">
                  <div class="store-sale">&emsp;</div>
                </th>
            </tr>
            <?php $_from = $this->_var['cart_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'cart_info');$this->_foreach['cart_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cart_name']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['cart_info']):
        $this->_foreach['cart_name']['iteration']++;
?>
            <tr id="cart_item_<?php echo $this->_var['cart_info']['rec_id']; ?>" class="shop-list <?php if ($this->_var['cart_info']['state'] && $this->_var['cart_info']['storage_state'] && $this->_var['cart_info']['if_show'] && ! $this->_var['cart_info']['closed']): ?><?php else: ?>item_disabled<?php endif; ?>">
                <td>
                    <?php if ($this->_var['cart_info']['state'] && $this->_var['cart_info']['storage_state'] && $this->_var['cart_info']['if_show'] && ! $this->_var['cart_info']['closed']): ?>
                    <input type="hidden" value="<?php echo $this->_var['cart_info']['rec_id']; ?>|<?php echo $this->_var['cart_info']['quantity']; ?>" name="cart_id[]">
                    <?php endif; ?>
                </td>
                <td class="w60">
                    <a href="<?php echo url('app=goods&id=' . $this->_var['cart_info']['goods_id']. ''); ?>" target="_blank" class="ncc-goods-thumb">
                        <img src="<?php echo $this->_var['cart_info']['goods_image']; ?>" alt="<?php echo $this->_var['cart_info']['goods_name']; ?>" />
                    </a>
                </td>
                <td class="tl">
                    <dl class="ncc-goods-info">
                    <dt><a href="<?php echo url('app=goods&id=' . $this->_var['cart_info']['goods_id']. ''); ?>" target="_blank"><?php echo $this->_var['cart_info']['goods_name']; ?></a></dt>
                    <dd></dd>
                    </dl>
                </td>
                <td class="w120">￥<em><?php echo $this->_var['cart_info']['price']; ?></em></span></td>
                <td class="w60"><?php echo $this->_var['cart_info']['quantity']; ?></td>
                <td class="w120">
                    <?php if ($this->_var['cart_info']['state'] && $this->_var['cart_info']['storage_state'] && $this->_var['cart_info']['if_show'] && ! $this->_var['cart_info']['closed']): ?>
                    ￥<em id="item<?php echo $this->_var['cart_info']['rec_id']; ?>_subtotal" nc_type="eachGoodsTotal"><?php echo $this->_var['cart_info']['goods_total']; ?></em>
                    <?php elseif (! $this->_var['cart_info'] [ 'storage_state' ]): ?>
                    <span style="color: #F00;">库存不足</span>
                    <?php elseif (! $this->_var['cart_info'] [ 'state' ] || $this->_var['cart_info']['closed'] || ! $this->_var['cart_info']['if_show']): ?>
                    <span style="color: #F00;">已下架</span>
                    <?php endif; ?>
                </td>
                <?php if (($this->_foreach['cart_name']['iteration'] <= 1)): ?>
                <td class="w160" rowspan="<?php echo $this->_foreach['cart_name']['total']; ?>">
                    <select class="w120" name="shipping[]" nctype="shipping">
                        <?php $_from = $this->_var['shipping_methods'][$this->_var['store_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');$this->_foreach['sp'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sp']['total'] > 0):
    foreach ($_from AS $this->_var['shipping']):
        $this->_foreach['sp']['iteration']++;
?>
                        <option value="<?php echo $this->_var['shipping']['shipping_id']; ?>|<?php echo $this->_var['store_id']; ?>|<?php echo $this->_var['shipping']['shipping_fee']; ?>" <?php if (($this->_foreach['sp']['iteration'] <= 1)): ?>selected<?php endif; ?>><?php echo $this->_var['shipping']['shipping_name']; ?>&nbsp;&nbsp;<?php echo $this->_var['shipping']['shipping_fee']; ?>元</option>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </select>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <tr>
                <td class="w10"></td>
                <td class="tl" colspan="2">买家留言：
                    <input type="text" value="" class="text w340" name="pay_message[<?php echo $this->_var['store_id']; ?>]" maxlength="150">&nbsp;</td>
                <td class="tl" colspan="10"><div class="ncc-form-default"> </div></td>
            </tr>
            <tr>
                <td class="tr" colspan="20">
                    <div class="ncc-store-account">
                        <dl class="freight">
                            <dt>运费：</dt>
                            <dd>￥<em id="eachStoreFreight_<?php echo $this->_var['store_id']; ?>">0.00</em></dd>
                        </dl>
                        <dl>
                            <dt>商品金额：</dt>
                            <dd>￥<em id="eachStoreGoodsTotal_<?php echo $this->_var['store_id']; ?>"><?php echo $this->_var['store_goods_total'][$this->_var['store_id']]; ?></em></dd>
                        </dl>
<!--                        <dl class="voucher">
                            <dt>
                              <select nctype="voucher" name="voucher">
                                <option value="">选择代金券</option>
                              </select> ：
                            <dd>￥<em id="eachStoreVoucher_<?php echo $this->_var['store_id']; ?>">-0.00</em></dd>
                        </dl>-->
                        <dl class="total">
                            <dt>本店合计    ：</dt>
                            <dd>￥<em store_id="<?php echo $this->_var['store_id']; ?>" nc_type="eachStoreTotal"></em></dd>
                        </dl>
                    </div>
                </td>
            </tr>
        </tbody>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <tfoot>
            <tr>
              <td colspan="20"><div class="ncc-all-account">订单总金额：￥<em id="orderTotal"></em>元</div></td>
            </tr>
        </tfoot>
    </table>
</div>