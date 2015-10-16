<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/layout.css'; ?>" rel="stylesheet" />
<div class="nch-container wrapper">
    <div class="nch-all-menu">
        <ul class="tab-bar">
          <li><a href="<?php echo url('app=category'); ?>">全部商品分类</a></li>
          <li class="current"><a href="javascript:void(0);">全部品牌</a></li>
          <!--<li><a href="">全部商品</a></li>-->
        </ul>
    </div>
    <?php if ($this->_var['recommended_brands']): ?>
    <div class="nch-recommend-borand">
        <div class="title" title="推荐品牌"></div>
        <div class="nch-barnd-list">
            <ul>
                <?php $_from = $this->_var['recommended_brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
                <li>
                    <dl>
                      <dt><a href="<?php echo url('app=search&brand=' . $this->_var['brand']['brand_name']. ''); ?>"><img src="<?php echo $this->_var['brand']['brand_logo']; ?>" alt="<?php echo $this->_var['brand']['brand_name']; ?>" /></a></dt>
                      <dd><a href="<?php echo url('app=search&brand=' . $this->_var['brand']['brand_name']. ''); ?>"><?php echo $this->_var['brand']['brand_name']; ?></a></dd>
                    </dl>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>
    <div class="nch-brand-class">
        <div class="nch-brand-class-tab">
            <?php if ($this->_var['brands_class']): ?>
            <ul class="tabs-nav">
            <?php $_from = $this->_var['brands_class']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'brands_c');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['brands_c']):
?>
            <li <?php if ($this->_var['key'] == 0): ?>class="tabs-selected"<?php endif; ?>>
                <a href="javascript:void(0);"><?php if ($this->_var['brands_c']): ?><?php echo $this->_var['brands_c']; ?><?php else: ?>其它<?php endif; ?></a>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
            <?php endif; ?>
        </div>
        <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['brand']):
?>
        <div class="nch-barnd-list tabs-panel <?php if ($this->_var['key'] != 0): ?>tabs-hide<?php endif; ?>">
            <ul>
                <?php $_from = $this->_var['brand']['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'b');if (count($_from)):
    foreach ($_from AS $this->_var['b']):
?>
                <li>
                    <dl>
                        <dt><a href="<?php echo url('app=search&brand=' . $this->_var['b']['brand_name']. ''); ?>"><img src="<?php echo $this->_var['b']['brand_logo']; ?>" alt="<?php echo $this->_var['b']['brand_name']; ?>"/></a></dt>
                        <dd><a href="<?php echo url('app=search&brand=' . $this->_var['b']['brand_name']. ''); ?>"><?php echo $this->_var['b']['brand_name']; ?></a></dd>
                    </dl>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
</div>
<script>
//首页Tab标签卡滑门切换
$(".tabs-nav > li > a").live('mousedown', (function(e) {
	if (e.target == this) {
		var tabs = $(this).parents('ul:first').children("li");
		var panels = $(this).parents('.nch-brand-class:first').children(".tabs-panel");
		var index = $.inArray(this, $(this).parents('ul:first').find("a"));
		if (panels.eq(index)[0]) {
			tabs.removeClass("tabs-selected").eq(index).addClass("tabs-selected");
			panels.addClass("tabs-hide").eq(index).removeClass("tabs-hide");
		}
	}
}));
</script>
<?php echo $this->fetch('footer.html'); ?>
