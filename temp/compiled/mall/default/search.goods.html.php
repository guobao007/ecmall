<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/search_goods.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/class_area_array.js'; ?>" charset="utf-8"></script>
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/layout.css'; ?>" rel="stylesheet" />
<script type="text/javascript">
$(function(){
    var order = '<?php echo $_GET['order']; ?>';
    var css = 'selected';
    <?php if ($_GET['order']): ?>
	order_arr = order.split(' ');
        order_id = order_arr[0];
        order_css = order_arr[1];
	$('#'+order_id).attr('class',css);
        $('#'+order_id+' a').attr('class',order_css);
    <?php endif; ?>
    $(".nch-sortbar-array li").click(function(){
        if(this.id==''){
            dropParam('order');// default order
            return false;
        }
        else
        {
            dd = " desc";
            if(order != '') {
                order_arr = order.split(' ');
                if(order_arr[0]==this.id && order_arr[1]=="desc")
                        dd = " asc";
                else dd = " desc";
            }
            replaceParam('order', this.id+dd);
            return false;
        }
    });
});
</script>

<?php echo $this->fetch('curlocal.html'); ?>

<div class="nch-container wrapper" >
    <div class="left">
        <?php if ($this->_var['recommended_brands']): ?>
        <div class="nch-module nch-module-style01">
            <div class="title">
                <h3>推荐品牌</h3>
            </div>
            <div class="content">
                <ul class="nch-sidebar-brand">
                    <?php $_from = $this->_var['recommended_brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
                    <li class="picture"> <a href="<?php echo url('app=search&brand=' . $this->_var['brand']['brand_name']. ''); ?>" target="_blank"> <span class="brand-logo"><img src="<?php echo $this->_var['brand']['brand_logo']; ?>" alt="<?php echo $this->_var['brand']['brand_name']; ?>" /></span> <span class="brand-name"><?php echo $this->_var['brand']['brand_name']; ?></span></a> </li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($this->_var['category_array']): ?>
        <div class="nch-module nch-module-style02">
            <div class="title">
                <h3>分类筛选</h3>
            </div>
            <div class="contents">
                <ul id="files" class="tree">
                    <?php $_from = $this->_var['category_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_category']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_category']['iteration']++;
?>
                    <li>
                        <i class="tree-parent tree-parent-collapsed"></i>
                        <a href="<?php echo url('app=search&cate_id=' . $this->_var['category']['cate_id']. ''); ?>" <?php if ($this->_var['category']['cate_id'] == $_GET['cate_id']): ?>class="selected"<?php endif; ?>><?php echo htmlspecialchars($this->_var['category']['cate_name']); ?></a>
                        <?php if ($this->_var['category']['class2']): ?>
                        <ul>
                            <?php $_from = $this->_var['category']['class2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'class2');if (count($_from)):
    foreach ($_from AS $this->_var['class2']):
?>
                            <li class="tree-parent tree-parent-collapsed"><i class="tree-parent tree-parent-collapsed"></i><a href="<?php echo url('app=search&cate_id=' . $this->_var['class2']['cate_id']. ''); ?>" <?php if ($this->_var['class2']['cate_id'] == $_GET['cate_id']): ?>class="selected"<?php endif; ?>><?php echo htmlspecialchars($this->_var['class2']['cate_name']); ?></a>
                            <?php if ($this->_var['class2']['class3']): ?>    
                            <ul>
                                <?php $_from = $this->_var['class2']['class3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'class3');if (count($_from)):
    foreach ($_from AS $this->_var['class3']):
?>
                                <li class="tree-parent tree-parent-collapsed"><i></i><a href="<?php echo url('app=search&cate_id=' . $this->_var['class3']['cate_id']. ''); ?>" <?php if ($this->_var['class3']['cate_id'] == $_GET['cate_id']): ?>class="selected"<?php endif; ?>><?php echo htmlspecialchars($this->_var['class3']['cate_name']); ?></a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                            <?php endif; ?>
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
        <div class="nch-module nch-module-style03">
            <div class="title">
                <h3>最近浏览</h3>
            </div>
            <div class="content2">
                <?php $_from = $this->_var['goods_history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gh_goods');if (count($_from)):
    foreach ($_from AS $this->_var['gh_goods']):
?>
                <dl class="nch-sidebar-bowers">
                    <dt class="goods-name"><a href="<?php echo url('app=goods&id=' . $this->_var['gh_goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gh_goods']['goods_name']); ?></a></dt>
                    <dd class="goods-pic"><a href="<?php echo url('app=goods&id=' . $this->_var['gh_goods']['goods_id']. ''); ?>"><img src="<?php echo $this->_var['gh_goods']['default_image']; ?>" title="<?php echo htmlspecialchars($this->_var['gh_goods']['goods_name']); ?>" alt="<?php echo htmlspecialchars($this->_var['gh_goods']['goods_name']); ?>" ></a></dd>
                    <dd class="goods-price">¥<?php echo $this->_var['gh_goods']['price']; ?></dd>
                </dl>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="shop_con_list" id="main-nav-holder">
            <nav class="sort-bar" id="main-nav">
                <div class="pagination">
                    <ul>
                        <?php if ($this->_var['page_info']['prev_link']): ?>
                        <li><a href="<?php echo $this->_var['page_info']['prev_link']; ?>" class="demo"><span>上一页</span></a></li>
                        <?php else: ?>
                        <li><span>上一页</span></li>
                        <?php endif; ?>
                        <?php if ($this->_var['page_info']['next_link']): ?>
                        <li><a href="<?php echo $this->_var['page_info']['next_link']; ?>" class="demo"><span>下一页</span></a></li>
                        <?php else: ?>
                        <li><span>下一页</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="nch-all-category">
                    <div class="all-category">
                        <?php echo $this->fetch('home_goods_class.html'); ?>
                    </div>
                </div>
                <div class="nch-sortbar-array"> 排序方式：
                    <ul>
                        <li id="" <?php if (! $_GET['order']): ?>class="selected"<?php endif; ?>><a href="<?php echo url('app=search&cate_id=' . $_GET['cate_id']. ''); ?>"  title="默认排序">默认</a></li>
                        <li id="sales">
                            <a href="<?php echo url('app=search&cate_id=' . $_GET['cate_id']. '&order=sales desc'); ?>">销量<i></i></a>
                        </li>
                        <li id="views">
                            <a href="<?php echo url('app=search&cate_id=' . $_GET['cate_id']. '&order=views desc'); ?>">人气<i></i></a>
                        </li>
                        <li id="price">
                            <a href="<?php echo url('app=search&cate_id=' . $_GET['cate_id']. '&order=price desc'); ?>">价格<i></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div>
            <?php echo $this->fetch('goods.squares.html'); ?>
            </div>
            <div class="tc mt20 mb20">
                <div class="pagination"><?php echo $this->fetch('page.bottom.html'); ?></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/waypoints.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/search_category_menu.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        $('#files').tree({
            expanded: 'li:lt(2)'
        });
        //浮动导航  waypoints.js
        $('#main-nav-holder').waypoint(function(event, direction) {
            $(this).parent().toggleClass('sticky', direction === "down");
            event.stopPropagation();
        });
    });
</script>
<?php echo $this->fetch('footer.html'); ?>
