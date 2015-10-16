<?php if ($this->_var['page_info']['page_count'] > 1): ?>
<div class="pagination">
    <ul>
        <?php if ($this->_var['page_info']['first_link']): ?>
        <li><a href="<?php echo $this->_var['page_info']['first_link']; ?>" class="demo"><span>首页</span></a></li>
        <?php else: ?>
        <li><span>首页</span></li>
        <?php endif; ?>
        <?php if ($this->_var['page_info']['prev_link']): ?>
        <li><a href="<?php echo $this->_var['page_info']['prev_link']; ?>" class="demo"><span>上一页</span></a></li>
        <?php else: ?>
        <li><span>上一页</span></li>
        <?php endif; ?>
        
        
        <?php $_from = $this->_var['page_info']['page_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('page', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['page'] => $this->_var['link']):
?>
        <?php if ($this->_var['page_info']['curr_page'] == $this->_var['page']): ?>
        <li><span><?php echo $this->_var['page']; ?></span></li>
        <?php else: ?>
        <li><a href="<?php echo $this->_var['link']; ?>" class="demo"><span><?php echo $this->_var['page']; ?></span></a></li>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
        <?php if ($this->_var['page_info']['last_suspen']): ?>
        <li><span>...</span></li>
        <?php endif; ?>
        
        <?php if ($this->_var['page_info']['next_link']): ?>
        <li><a href="<?php echo $this->_var['page_info']['next_link']; ?>" class="demo"><span>下一页</span></a></li>
        <?php else: ?>
        <li><span>下一页</span></li>
        <?php endif; ?>
        <?php if ($this->_var['page_info']['last_link']): ?>
        <li><a href="<?php echo $this->_var['page_info']['last_link']; ?>" class="demo"><span>末页</span></a></li>
        <?php else: ?>
        <li><span>末页</span></li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>