<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<div class="flow_chart">
    <div class="pos_x1 bg_a1" title="选购商品"></div>
    <div class="pos_x2 bg_b2" title="完成订单信息并下单"></div>
    <div class="pos_x3 bg_c2" title="下单完成并支付"></div>
</div>

<div class="content">
    <div class="module_common">
        <div class="step_main">
            <div class="null_shopping">
                <h4>您的购物车是空的，您可以</h4>
                <p>
                    <a href="index.php">选购商品>></a>
                    <a href="<?php echo url('app=buyer_order'); ?>">查看订单>></a>
                </p>
            </div>

            <?php if ($this->_var['best_items']): ?>
            <h2><b class="best_item" title="精品推荐"></b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="list_pic">
                        <?php $_from = $this->_var['best_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                        <li>
                            <p><a href="<?php echo url('app=goods&goods_id=' . $this->_var['goods']['goods_id']. ''); ?>"><img alt="" src="<?php echo $this->_var['goods']['default_image']; ?>" width="100" height="100" /></a></p>
                            <h3><a href="<?php echo url('app=goods&goods_id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['goods']['description']); ?></a><span><?php echo price_format($this->_var['goods']['price']); ?></span></h3>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>

                </div>
            </div>
            <?php endif; ?>

            <div class="clear"></div>

        </div>
    </div>

</div>
<?php echo $this->fetch('footer.html'); ?>