<div class="message">
    <?php $_from = $this->_var['goods_comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
    <dl class="<?php echo $this->cycle(array('values'=>'message_text,message_text bg1')); ?>">
        <dt>
            <span class="light"><?php if ($this->_var['comment']['anonymous']): ?>***<?php else: ?><?php echo htmlspecialchars($this->_var['comment']['buyer_name']); ?><?php endif; ?> (<?php echo local_date("Y-m-d H:i:s",$this->_var['comment']['evaluation_time']); ?>)</span>
        </dt>
        <dd><?php echo nl2br(htmlspecialchars($this->_var['comment']['comment'])); ?></dd>
        <div class="beat">
            评价:
            <?php if ($this->_var['comment']['evaluation'] > 0): ?><img src="<?php echo $this->res_base . "/" . 'images/bit.gif'; ?>" /><?php endif; ?>
            <?php if ($this->_var['comment']['evaluation'] > 1): ?><img src="<?php echo $this->res_base . "/" . 'images/bit.gif'; ?>" /><?php endif; ?>
            <?php if ($this->_var['comment']['evaluation'] > 2): ?><img src="<?php echo $this->res_base . "/" . 'images/bit.gif'; ?>" /><?php endif; ?>
            <?php if ($this->_var['comment']['evaluation'] < 3): ?><img src="<?php echo $this->res_base . "/" . 'images/bit2.gif'; ?>" /><?php endif; ?>
            <?php if ($this->_var['comment']['evaluation'] < 2): ?><img src="<?php echo $this->res_base . "/" . 'images/bit2.gif'; ?>" /><?php endif; ?>
            <?php if ($this->_var['comment']['evaluation'] < 1): ?><img src="<?php echo $this->res_base . "/" . 'images/bit2.gif'; ?>" /><?php endif; ?>
        </div>
    </dl>
    <?php endforeach; else: ?>
    <dl class="message_text">
        <dt><span class="light">没有符合条件的记录</span></dt>
    </dl>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>


