<div class="title">
    <h3><a href="<?php echo url('app=category'); ?>">所有商品分类</a></h3>
    <i class="arrow"></i>
</div>
<div class="category">
    <ul class="menu">
        <?php if ($this->_var['header_gcategories']): ?>
        <?php $_from = $this->_var['header_gcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'category');$this->_foreach['fe_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_category']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['category']):
        $this->_foreach['fe_category']['iteration']++;
?>
        <li cat_id="<?php echo $this->_var['category']['id']; ?>" class="<?php if ($this->_var['key'] % 2 == 1): ?>odd<?php else: ?>even<?php endif; ?>">
            <div class="class">
                <?php if ($this->_var['category']['pic']): ?>
                <span class="ico"><img src="http://fesh.chinammt.com/data/upload/shop/common/category-pic-1832.jpg"></span>
                <?php endif; ?>

                <h4><a href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['category']['value']); ?></a></h4>
                <span class="arrow"></span> 
            </div>
            <div cat_menu_id="<?php echo $this->_var['category']['id']; ?>" class="sub-class">
                <?php if ($this->_var['category']['children']): ?>
                <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?> 
                <dl>
                    <dt>
                    <h3><a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a></h3>
                    </dt>
                    <dd class="goods-class">
                        <?php if ($this->_var['child']['children']): ?>
                        <?php $_from = $this->_var['child']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child2');$this->_foreach['fe_child2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child2']['total'] > 0):
    foreach ($_from AS $this->_var['child2']):
        $this->_foreach['fe_child2']['iteration']++;
?>
                        <a href="<?php echo url('app=search&cate_id=' . $this->_var['child2']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child2']['value']); ?></a>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <?php endif; ?>
                    </dd>
                </dl>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
            </div>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
    </ul>
</div>