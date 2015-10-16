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
            <h1><?php echo htmlspecialchars($this->_var['article']['title']); ?></h1>
            <h2><?php echo local_date("Y-m-d H:i",$this->_var['article']['add_time']); ?></h2>
            <div class="default">
                <p>
                    <?php if ($this->_var['article']['store_id']): ?>
                    <?php echo html_filter($this->_var['article']['content']); ?>
                    <?php else: ?>
                    <?php echo $this->_var['article']['content']; ?>
                    <?php endif; ?>
                </p>
            </div>
            <div class="more_article">
                <span class="fl">
                    上一篇：
                    <?php if ($this->_var['pre_article']): ?><a target="<?php echo $this->_var['pre_article']['target']; ?>" href="<?php echo url('app=article&act=view&article_id=' . $this->_var['pre_article']['article_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['pre_article']['title']); ?></a> <time><?php echo local_date("Y-m-d H:i",$this->_var['pre_article']['add_time']); ?></time><?php else: ?>没有符合条件的记录<?php endif; ?>
                </span>
                <span class="fr">
                    下一篇：
                    <?php if ($this->_var['next_article']): ?><a target="<?php echo $this->_var['next_article']['target']; ?>" href="<?php echo url('app=article&act=view&article_id=' . $this->_var['next_article']['article_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['next_article']['title']); ?></a> <time><?php echo local_date("Y-m-d H:i",$this->_var['next_article']['add_time']); ?></time><?php else: ?>没有符合条件的记录<?php endif; ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>