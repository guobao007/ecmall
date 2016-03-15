<div class="nc-s-c-s1 ncs-class-bar">
    <div class="title"><h4>商品分类</h4></div>
    <div class="content">
        <div class="ncs-search">
            <form id="" name="searchShop" method="get" action="index.php" >
                <input type="hidden" name="app" value="store" />
                <input type="hidden" name="act" value="search" />
                <input type="hidden" name="id" value="<?php echo $this->_var['store']['store_id']; ?>" />
                <input type="text" class="text w120" name="keyword" placeholder="搜索店内商品">
                <a href="javascript:document.searchShop.submit();" class="ncs-btn">搜索</a>
            </form>
        </div>
        <ul class="ncs-submenu">
            <li><span class="ico-none"><em>-</em></span><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search'); ?>">全部商品</a></li>
            <?php $_from = $this->_var['store']['store_gcates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
            <?php if ($this->_var['gcategory']['children']): ?>
            <li>
                <span class="ico-none" onclick="class_list(this);" span_id="<?php echo $this->_var['gcategory']['id']; ?>" style="cursor: pointer;"><em>-</em></span>
                <a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a>
                <ul id="stc_<?php echo $this->_var['gcategory']['id']; ?>">
                    <?php $_from = $this->_var['gcategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['child_gcategory']):
?>
                    <li><span class="ico-sub">&nbsp;</span><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['child_gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child_gcategory']['value']); ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </li>
            <?php else: ?>
            <li> <span class="ico-none"><em>-</em></span><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a></li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <div class="clear mb10"></div>
    </div>
</div>
<div class="nc-s-c-s1 ncs-top-bar">
    <div class="title"><h4>商品排行</h4></div>
    <div class="content">
        <ul class="ncs-top-tab pngFix">
            <li id="hot_sales_tab" class="current"><a href="javascript:;">热销商品排行</a></li>
            <li id="hot_collect_tab"><a href="javascript:;">热门收藏排行</a></li>
        </ul>
        <div id="hot_sales_list" class="ncs-top-panel">
            <?php if ($this->_var['store']['hot_saleslist']): ?>
            <ol>
            <?php $_from = $this->_var['store']['hot_saleslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'h_goods');$this->_foreach['fe_saleslist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_saleslist']['total'] > 0):
    foreach ($_from AS $this->_var['h_goods']):
        $this->_foreach['fe_saleslist']['iteration']++;
?>
            <li>
                <dl>
                    <dt><a href="<?php echo url('app=goods&id=' . $this->_var['h_goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['h_goods']['goods_name']); ?></a></dt>
                    <dd class="goods-pic">
                        <a href="<?php echo url('app=goods&id=' . $this->_var['h_goods']['goods_id']. ''); ?>"><span class="thumb size40"><i></i><img src="<?php echo $this->_var['h_goods']['default_image']; ?>" onload="javascript:DrawImage(this,40,40);"></span></a>
                        <p><span class="thumb size100"><i></i><img src="<?php echo $this->_var['h_goods']['default_image']; ?>" onload="javascript:DrawImage(this,100,100);" title="<?php echo htmlspecialchars($this->_var['h_goods']['goods_name']); ?>"><big></big><small></small></span></p>
                    </dd>
                    <dd class="price pngFix"><?php echo $this->_var['h_goods']['price']; ?>元</dd>
                    <dd class="selled pngFix">售出：<strong><?php echo $this->_var['h_goods']['sales']; ?></strong>笔</dd>
                </dl>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ol>
            <?php endif; ?>
        </div>
        <div id="hot_collect_list" class="ncs-top-panel hide">
            <?php if ($this->_var['store']['collect_goodslist']): ?>
            <ol>
            <?php $_from = $this->_var['store']['collect_goodslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c_goods');$this->_foreach['fe_collectlist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_collectlist']['total'] > 0):
    foreach ($_from AS $this->_var['c_goods']):
        $this->_foreach['fe_collectlist']['iteration']++;
?>
            <li>
                <dl>
                  <dt><a href="<?php echo url('app=goods&id=' . $this->_var['c_goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['c_goods']['goods_name']); ?></a></dt>
                  <dd class="goods-pic"><a href="<?php echo url('app=goods&id=' . $this->_var['c_goods']['goods_id']. ''); ?>" title=""><span class="thumb size40"><i></i> <img src="<?php echo $this->_var['c_goods']['default_image']; ?>" onload="javascript:DrawImage(this,40,40);"></span></a>
                    <p><span class="thumb size100"><i></i><img src="<?php echo $this->_var['c_goods']['default_image']; ?>" onload="javascript:DrawImage(this,100,100);" title="<?php echo htmlspecialchars($this->_var['c_goods']['goods_name']); ?>"><big></big><small></small></span></p>
                  </dd>
                  <dd class="price pngFix"><?php echo $this->_var['c_goods']['price']; ?>元</dd>
                  <dd class="collection pngFix">收藏人气：<strong><?php echo $this->_var['c_goods']['collects']; ?></strong></dd>
                </dl>
              </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ol>
            <?php endif; ?>
        </div>
        <p><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>">查看本店其他商品</a></p>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        //热销排行切换
        $('#hot_sales_tab').on('mouseenter', function() {
            $(this).addClass('current');
            $('#hot_collect_tab').removeClass('current');
            $('#hot_sales_list').removeClass('hide');
            $('#hot_collect_list').addClass('hide');
        });
        $('#hot_collect_tab').on('mouseenter', function() {
            $(this).addClass('current');
            $('#hot_sales_tab').removeClass('current');
            $('#hot_sales_list').addClass('hide');
            $('#hot_collect_list').removeClass('hide');
        });
    });
    /** left.php **/
    // 商品分类
    function class_list(obj){
    	var stc_id=$(obj).attr('span_id');
    	var span_class=$(obj).attr('class');
    	if(span_class=='ico-block') {
    		$("#stc_"+stc_id).show();
    		$(obj).html('<em>-</em>');
    		$(obj).attr('class','ico-none');
    	}else{
    		$("#stc_"+stc_id).hide();
    		$(obj).html('<em>+</em>');
    		$(obj).attr('class','ico-block');
    	}
    }
</script>