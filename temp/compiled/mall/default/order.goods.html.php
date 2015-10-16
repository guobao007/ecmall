                <h4 class="add_title"><b class="ico">已选商品</b></h4>
                <dl class="article">
                    <dt>店铺:&nbsp;<a href="<?php echo url('app=store&store_id=' . $this->_var['goods_info']['store_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods_info']['store_name']); ?></a></dt>
                    <?php $_from = $this->_var['goods_info']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <dd>
                        <p><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="65" height="65" /></a></p>
                        <h3>
                            <a target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a>
                            <span class="attr"><?php echo htmlspecialchars($this->_var['goods']['specification']); ?></span>
                            <b><?php echo $this->_var['goods']['quantity']; ?>件&nbsp;=&nbsp;<span class="money"><?php echo price_format($this->_var['goods']['subtotal']); ?></span></b>
                        </h3>
                    </dd>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </dl>