<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/layout.css'; ?>" rel="stylesheet" />
<div class="nch-container wrapper">
    <div class="left">
        <div class="nch-module nch-module-style01">
            <div class="title"><h3>文章分类</h3></div>
            <div class="content">
                <ul class="nch-sidebar-article-class">
                    <?php $_from = $this->_var['acategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'acategory');if (count($_from)):
    foreach ($_from AS $this->_var['acategory']):
?>
                    <li><a href="<?php echo url('app=article&cate_id=' . $this->_var['acategory']['cate_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['acategory']['cate_name']); ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
        <div class="nch-module nch-module-style03">
            <div class="title">
                <h3>最新文章</h3>
            </div>
            <div class="content">
                <ul class="nch-sidebar-article-list">
                    <?php $_from = $this->_var['new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'new_article');if (count($_from)):
    foreach ($_from AS $this->_var['new_article']):
?>
                    <li><i></i><a <?php if ($this->_var['new_article']['link']): ?>target="_blank"<?php endif; ?> href="<?php echo url('app=article&act=view&article_id=' . $this->_var['new_article']['article_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['new_article']['title']); ?></a></li>
                    <?php endforeach; else: ?>
                    <li>暂无新文章</li>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="nch-article-con">
            <div class="title-bar">
                <h3><?php echo $this->_var['articles_info']['cate_name']; ?></h3>
            </div>
            <ul class="nch-article-list">
                 <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
                 <li><i></i><a <?php if ($this->_var['article']['link']): ?>target="_blank"<?php endif; ?> href="<?php echo url('app=article&act=view&article_id=' . $this->_var['article']['article_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['article']['title']); ?></a><time><?php echo local_date("Y-m-d H:i",$this->_var['article']['add_time']); ?></time></li>
                 <?php endforeach; else: ?>
                <li>没有符合条件的记录</li>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
        <div class="tc mb20">  <div class="pagination"> <?php echo $this->fetch('page.bottom.html'); ?> </div></div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>