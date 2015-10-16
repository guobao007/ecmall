<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/layout.css'; ?>" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.masonry.js'; ?>" charset="utf-8"></script>
<div class="nch-container wrapper">
    <div class="nch-all-menu">
        <ul class="tab-bar">
          <li class="current"><a href="javascript:void(0);">全部商品分类</a></li>
          <li><a href="<?php echo url('app=brand'); ?>">全部品牌</a></li>
          <!--<li><a href="">全部商品</a></li>-->
        </ul>
    </div>
    <div class="nch-category-all">
        <?php if ($this->_var['gcategorys']): ?>
        <ul class="nch-category-container" id="categoryList">
        <?php $_from = $this->_var['gcategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
        <li class="classes">
            <div class="title">
                <i></i>
                <a href="<?php echo url('app=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a>
            </div>
            <?php if ($this->_var['gcategory']['children']): ?>
            <?php $_from = $this->_var['gcategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
            <dl>
                <dt><a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a></dt>
                <dd>
                    <?php if ($this->_var['child']['children']): ?>
                    <?php $_from = $this->_var['child']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child2');if (count($_from)):
    foreach ($_from AS $this->_var['child2']):
?>
                    <a href="<?php echo url('app=search&cate_id=' . $this->_var['child2']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child2']['value']); ?></a>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endif; ?>
                </dd>
            </dl>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
<script>
$(function(){
    $("#categoryList").imagesLoaded( function(){
        $("#categoryList").masonry({
                itemSelector : '.classes'
        });
    });
});
</script> 
<?php echo $this->fetch('footer.html'); ?>