<div class="nch-breadcrumb-layout">
    <?php if ($this->_var['_curlocal']): ?>
    <div class="nch-breadcrumb wrapper"><i class="icon-home"></i>
    <?php $_from = $this->_var['_curlocal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'lnk');if (count($_from)):
    foreach ($_from AS $this->_var['lnk']):
?>
    <?php if ($this->_var['lnk']['url']): ?>
    <span><a href="<?php echo $this->_var['lnk']['url']; ?>"><?php echo htmlspecialchars($this->_var['lnk']['text']); ?></a></span><span class="arrow">></span>
    <?php else: ?>
    <span><?php echo htmlspecialchars($this->_var['lnk']['text']); ?></span>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <?php endif; ?>
</div>