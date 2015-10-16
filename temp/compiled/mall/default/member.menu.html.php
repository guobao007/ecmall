    <div id="left">
        <h2>
            <strong title="用户中心"></strong>
            <div class="adorn1"></div>
            <div class="adorn2"></div>
        </h2>
    <?php $_from = $this->_var['_member_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        <?php if ($this->_var['item']['submenu']): ?>
        <dl>
            <dt><?php echo $this->_var['item']['text']; ?></dt>
        <?php $_from = $this->_var['item']['submenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'subitem');if (count($_from)):
    foreach ($_from AS $this->_var['subitem']):
?>
            <dd>
            <?php if ($this->_var['subitem']['name'] == $this->_var['_curitem']): ?>
                <a href="<?php echo $this->_var['subitem']['url']; ?>" class="active"><span class="<?php echo $this->_var['subitem']['icon']; ?>"><?php echo $this->_var['subitem']['text']; ?></span></a>
            <?php else: ?>
                <a href="<?php echo $this->_var['subitem']['url']; ?>" class="normal"><span class="<?php echo $this->_var['subitem']['icon']; ?>"><?php echo $this->_var['subitem']['text']; ?></span></a>
            <?php endif; ?>
            </dd>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </dl>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php if ($this->_var['_member_menu']['overview']): ?>
        <div class="application">
            <p>您目前不是卖家，您可以: </p>
            <a href="<?php echo $this->_var['_member_menu']['overview']['url']; ?>" title="<?php echo $this->_var['_member_menu']['overview']['text']; ?>"></a>
        </div>
        <div class="clear"></div> 
        <?php endif; ?>
        <div class="adorn_bottom"></div>
    </div>
