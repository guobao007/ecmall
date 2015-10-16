<?php echo $this->fetch('member.header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
    $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<style type="text/css">
.float_right {float: right;}
</style>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="public">
                <div class="user_search">
                <form method="get">
                    <?php if ($this->_var['query']['seller_name'] || $this->_var['query']['add_time_from'] || $this->_var['query']['add_time_to'] || $this->_var['query']['order_sn']): ?>
                     <a class="detlink float_right" href="<?php echo url('app=buyer_order'); ?>">取消检索</a>
                    <?php endif; ?>
                    <span>下单时间: </span>
                    <input type="text" class="text1 width2" name="add_time_from" id="add_time_from" value="<?php echo $this->_var['query']['add_time_from']; ?>"/> &#8211;
                    <input type="text" class="text1 width2" name="add_time_to" id="add_time_to" value="<?php echo $this->_var['query']['add_time_to']; ?>"/>
                    <span>订单号:</span>
                    <input type="text" class="text1 width_normal" name="order_sn" value="<?php echo htmlspecialchars($this->_var['query']['order_sn']); ?>">
                    <span>订单状态</span>
                    <select name="type">
                    <?php echo $this->html_options(array('options'=>$this->_var['types'],'selected'=>$this->_var['type'])); ?>
                    </select>
                    <input type="hidden" name="app" value="buyer_order" />
                    <input type="hidden" name="act" value="index" />
                    <input type="submit" class="btn" value="搜索" />
                </form>
                </div>
                <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
                <div class="order_form">
                    <h2>
                        <p class="num">订单号: <?php echo $this->_var['order']['order_sn']; ?><?php if ($this->_var['order']['extension'] == 'groupbuy'): ?><span class="color8">[团购]</span><?php endif; ?></p>
                        <p class="name"><span>店铺名: <a href="<?php echo url('app=store&id=' . $this->_var['order']['seller_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['order']['seller_name']); ?></a></span><a target="_blank" href="<?php echo url('app=message&act=send&to_id=' . $this->_var['order']['seller_id']. ''); ?>" class="email"></a></p>
                        <p class="state">订单状态: <strong><?php echo call_user_func("order_status",$this->_var['order']['status']); ?><?php if ($this->_var['order']['evaluation_status']): ?>,&nbsp;已评价<?php endif; ?></strong></p>
                    </h2>

                    <?php $_from = $this->_var['order']['order_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <div class="con">
                        <p class="ware_pic"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_image']; ?>" width="50" height="50"  /></a></p>
                        <p class="ware_text"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a><br /><span class="attr"><?php echo htmlspecialchars($this->_var['goods']['specification']); ?></span></p>
                        <p class="price">价格: <span><?php echo price_format($this->_var['goods']['price']); ?></span></p>
                        <p class="amount">数量: <span><?php echo $this->_var['goods']['quantity']; ?></span></p>
                    </div>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                    <div class="foot">
                        <p class="time">下单时间: <?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?></p>
                        <?php if ($this->_var['order']['payment_name']): ?>
                        <p class="defray">支付方式: <?php echo htmlspecialchars($this->_var['order']['payment_name']); ?></p>
                        <?php endif; ?>
                        <div class="handle">
                            <div style="float:left;">
                                订单总价: <b id="order<?php echo $this->_var['order']['order_id']; ?>_order_amount"><?php echo price_format($this->_var['order']['order_amount']); ?></b>
                            </div>
                            <a class="btn1" href="<?php echo url('app=buyer_order&act=evaluate&order_id=' . $this->_var['order']['order_id']. ''); ?>" target="_blank" id="order<?php echo $this->_var['order']['order_id']; ?>_evaluate"<?php if ($this->_var['order']['status'] != ORDER_FINISHED || $this->_var['order']['evaluation_status'] != 0): ?> style="display:none"<?php endif; ?>>我要评价</a>
                            <a href="<?php echo url('app=cashier&order_id=' . $this->_var['order']['order_id']. ''); ?>" target="_blank" id="order<?php echo $this->_var['order']['order_id']; ?>_action_pay"<?php if ($this->_var['order']['status'] != ORDER_PENDING): ?> style="display:none"<?php endif; ?> class="btn">付款</a>
                            <input type="button" value="确认收货" class="btn1" ectype="dialog" dialog_id="buyer_order_confirm_order" dialog_width="400" dialog_title="确认收货" uri="index.php?app=buyer_order&amp;act=confirm_order&order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax"  id="order<?php echo $this->_var['order']['order_id']; ?>_action_confirm"<?php if ($this->_var['order']['status'] != ORDER_SHIPPED || $this->_var['order']['payment_code'] == 'cod'): ?> style="display:none"<?php endif; ?> />
                            <input type="button" value="取消订单" class="btn1" ectype="dialog" dialog_width="400" dialog_title="取消订单" dialog_id="buyer_order_cancel_order" uri="index.php?app=buyer_order&amp;act=cancel_order&order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax"  id="order<?php echo $this->_var['order']['order_id']; ?>_action_cancel"<?php if ($this->_var['order']['status'] != ORDER_PENDING && $this->_var['order']['status'] != ORDER_SUBMITTED): ?> style="display:none"<?php endif; ?> />
                            <a href="<?php echo url('app=buyer_order&act=view&order_id=' . $this->_var['order']['order_id']. ''); ?>" target="_blank" class="btn1">查看订单</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; else: ?>
                <div class="order_form member_no_records">
                    <span>没有符合条件的订单</span>
                </div>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <div class="order_form_page">
                    <div class="page">
                        <?php echo $this->fetch('member.page.bottom.html'); ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="wrap_bottom"></div>
        </div>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<iframe id='iframe_post' name="iframe_post" src="about:blank" frameborder="0" width="0" height="0"></iframe>
<?php echo $this->fetch('footer.html'); ?>
