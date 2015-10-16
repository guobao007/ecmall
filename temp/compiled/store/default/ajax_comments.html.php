<?php if ($this->_var['goodsevallist']): ?>
<?php $_from = $this->_var['goodsevallist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
<div id="t" class="ncs-commend-floor">
    <div class="user-avatar">
        <a><img src="<?php echo $this->res_base . "/" . 'images/default_user_portrait.gif.png'; ?>"></a>
    </div>
    <dl class="detail">
        <dt>
            <span class="user-name"><?php echo htmlspecialchars($this->_var['comment']['buyer_name']); ?></span>
            <time pubdate="pubdate">[<?php echo local_date("Y-m-d H:i:s",$this->_var['comment']['evaluation_time']); ?>]</time>
        </dt>
        <dd>用户评分：
            <span class="raty" data-score="<?php echo $this->_var['comment']['evaluation']; ?>">
                <?php if ($this->_var['comment']['evaluation'] > 0): ?><img src="<?php echo $this->res_base . "/" . 'images/star-on.png'; ?>" /><?php endif; ?>
                <?php if ($this->_var['comment']['evaluation'] > 1): ?><img src="<?php echo $this->res_base . "/" . 'images/star-on.png'; ?>" /><?php endif; ?>
                <?php if ($this->_var['comment']['evaluation'] > 2): ?><img src="<?php echo $this->res_base . "/" . 'images/star-on.png'; ?>" /><?php endif; ?>
                <?php if ($this->_var['comment']['evaluation'] < 3): ?><img src="<?php echo $this->res_base . "/" . 'images/star-off.png'; ?>" /><?php endif; ?>
                <?php if ($this->_var['comment']['evaluation'] < 2): ?><img src="<?php echo $this->res_base . "/" . 'images/star-off.png'; ?>" /><?php endif; ?>
                <?php if ($this->_var['comment']['evaluation'] < 1): ?><img src="<?php echo $this->res_base . "/" . 'images/star-off.png'; ?>" /><?php endif; ?>
            </span>
        </dd>
        <dd class="explain">评论详情：<span><?php echo nl2br(htmlspecialchars($this->_var['comment']['comment'])); ?></span></dd>
    </dl>
</div>
<div class="tr pr5 pb5 pr">
    <div class="pagination">
        <?php echo $this->fetch('page.bottom.html'); ?>
    </div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php else: ?>
<div class="ncs-norecord">暂无符合条件的数据记录</div>
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function(){
    $('#goodseval').find('a').ajaxContent({
        event:'click', //mouseover
        target:'#goodseval'
    });
});
</script> 