<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_goods.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
var upimg   = '<?php echo $this->res_base . "/" . 'images/up.gif'; ?>';
var downimg = '<?php echo $this->res_base . "/" . 'images/down.gif'; ?>';
imgUping = new Image();
imgUping.src = upimg;
$(function(){

	var order = '<?php echo $_GET['order']; ?>';
	var css = '';
	
	<?php if ($_GET['order']): ?>
	order_arr = order.split(' ');
	switch (order_arr[1]){
		case 'desc' : 
			css = 'order-down btn-order-cur';
		break;
		case 'asc' :
			css = 'order-up btn-order-cur';
		break;
		default : 
			css = 'order-down-gray';
	}
	$('.btn-order a[ectype='+order_arr[0]+']').attr('class','btn-order-click '+css);
	<?php endif; ?>
	
	$(".btn-order a").click(function(){
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
	
	<?php if ($_GET['price']): ?>
	var filter_price = '<?php echo $_GET['price']; ?>';
	filter_price = filter_price.split('-');
	$('input[name="start_price"]').val(number_format(filter_price[0],0));
	$('input[name="end_price"]').val(number_format(filter_price[1],0));
	<?php endif; ?>
	
	$('.attr-bottom .show-more').click(function(){
		$(this).parent().parent().children().find('.toggle').toggle();
		if($(this).find('span').html()=='expand'){
			$(this).find('span').html('fold');
			$(this).attr('class', 'hide-more');
		} else {
			$(this).find('span').html('expand');
			$(this).attr('class', '');
		}
	});



});


</script>
<div id="main" class="w-full">
	<div id="page-search-goods" class="w mb20 mt20">
		<div class="w mb10 clearfix">
   			<div class="col-main">
       			<?php echo $this->fetch('curlocal.html'); ?>
            
                <?php $_from = $this->_var['ultimate_store']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');$this->_foreach['fe_store'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_store']['total'] > 0):
    foreach ($_from AS $this->_var['store']):
        $this->_foreach['fe_store']['iteration']++;
?>
        		<div class="ultimate-store mb10">
                	<div class="item">
            			<div class="content clearfix">
                			<a class="float-left store-logo" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><img height="50" src="<?php echo $this->_var['store']['store_logo']; ?>" /> </a>
                    		<div class="float-left middleside">
                    			<a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></a>
                    			<span class="block"><?php echo htmlspecialchars($this->_var['store']['description']); ?></span>
                    		</div>
                    		<div class="float-right rightside">
                    			<b></b><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></a>
                    		</div>
            			</div>
                    </div>
           		</div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                
                <?php if (! $this->_var['goods_list_order'] || $this->_var['filters']): ?>
      			<div class="attribute">
            		<div class="selected-attr title">
             			<?php if ($this->_var['filters']): ?>
             			<strong>your_selected：</strong>
             			<?php $_from = $this->_var['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter');if (count($_from)):
    foreach ($_from AS $this->_var['filter']):
?>
             			<a href="javascript:;" id="<?php echo $this->_var['filter']['key']; ?>"><b><?php echo $this->_var['filter']['name']; ?>：</b><?php echo $this->_var['filter']['value']; ?><span></span></a>
             			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
             			<?php else: ?>
             			<strong>by_conditions</strong>
             			<?php endif; ?>
          			</div>
          			<div class="content">
          	 			<?php if ($this->_var['brands'] || $this->_var['price_intervals'] || $this->_var['regions'] || $this->_var['categories'] || $this->_var['props']): ?>
             			<?php if ($this->_var['brands'] && ! $this->_var['filters']['brand']): ?>
             			<div class="each clearfix">
                			<h4>按品牌：</h4>
                			<div class="pv" ectype="ul_brand">
                   				<?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_row']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_row']['iteration']++;
?>
                   				<a href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>" <?php if ($this->_foreach['fe_row']['iteration'] >= 25): ?>class="toggle" style="display:none"<?php endif; ?>><?php echo htmlspecialchars($this->_var['row']['brand']); ?><span class="count">(<?php echo $this->_var['row']['count']; ?>)</span></a>
                   				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                			</div>
             			</div>
            			<?php endif; ?>
             			<?php $_from = $this->_var['props']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'prop');$this->_foreach['fe_prop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_prop']['total'] > 0):
    foreach ($_from AS $this->_var['prop']):
        $this->_foreach['fe_prop']['iteration']++;
?>
             			<div class="each clearfix" ectype="dl_props">
                			<h4><?php echo $this->_var['prop']['name']; ?>：</h4>
                			<div class="pv">
                   				<?php $_from = $this->_var['prop']['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                   				<a href="javascript:void(0);" id="<?php echo $this->_var['row']['pid']; ?>:<?php echo $this->_var['row']['vid']; ?>" selected_props="<?php echo $this->_var['props_selected']; ?>"><?php echo htmlspecialchars($this->_var['row']['prop_value']); ?></a>
                   				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                			</div>
             			</div>
            			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
             			<?php if ($this->_var['price_intervals'] && ! $this->_var['filters']['price']): ?>
             			<div class="each clearfix">
                			<h4>按价格：</h4>
               				<div class="pv" ectype="ul_price">
                   				<?php $_from = $this->_var['price_intervals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_row']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_row']['iteration']++;
?>
                   				<a href="javascript:void(0);" id="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>" <?php if ($this->_foreach['fe_row']['iteration'] >= 25): ?>class="toggle" style="display:none"<?php endif; ?>><?php echo price_format($this->_var['row']['min']); ?> - <?php echo price_format($this->_var['row']['max']); ?><span class="count">(<?php echo $this->_var['row']['count']; ?>)</span></a>
                   				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                			</div>
             			</div>
             			<?php endif; ?>
             
             			<?php if ($this->_var['regions'] && ! $this->_var['filters']['region_id']): ?>
             			<div class="each clearfix" style="border-bottom:0;">
                			<h4>按地区：</h4>
                			<div class="pv" ectype="ul_region">
                   				<?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_row']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_row']['iteration']++;
?>
                   				<a href="javascript:void(0);" hidefocus="true" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo htmlspecialchars($this->_var['row']['region_name']); ?>" <?php if ($this->_foreach['fe_row']['iteration'] >= 25): ?>class="toggle" style="display:none"<?php endif; ?>><?php echo htmlspecialchars($this->_var['row']['region_name']); ?><span class="count">(<?php echo $this->_var['row']['count']; ?>)</span></a>
                   				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                			</div>
             			</div>
             			<?php endif; ?>

             
              			<?php if ($this->_var['categories']): ?>
          	  			<div class="attr-cate">
            				<ul class="attr-list clearfix" style="border-top:0;" ectype="ul_cate">
                   				<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');$this->_foreach['fe_gcategory'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_gcategory']['total'] > 0):
    foreach ($_from AS $this->_var['gcategory']):
        $this->_foreach['fe_gcategory']['iteration']++;
?>
                  				<li><a <?php if ($_GET['cate_id'] == $this->_var['gcategory']['cate_id']): ?>style="color:#BF1B30"<?php endif; ?> href="javascript:void(0);" title="<?php echo $this->_var['gcategory']['cate_name']; ?>" id="<?php echo $this->_var['gcategory']['cate_id']; ?>"><?php echo $this->_var['gcategory']['cate_name']; ?></a><span>(<?php echo $this->_var['gcategory']['count']; ?>)</span></li>
                   				<?php if ($this->_foreach['fe_gcategory']['iteration'] % 5 == 0 && ! ($this->_foreach['fe_gcategory']['iteration'] == $this->_foreach['fe_gcategory']['total'])): ?>
                   			</ul>
                   			<ul class="attr-list clearfix <?php if ($this->_foreach['fe_gcategory']['iteration'] >= 25): ?> toggle hidden<?php endif; ?>" ectype="ul_cate">
                   				<?php endif; ?>
                   				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                			</ul>
          	  			</div>
						<?php endif; ?>
                        <?php endif; ?>
          			</div>
          			<div class="attr-bottom">
             			<ins></ins><b class="show-more"><span>展开</span>条件<i></i></b>
          			</div>
       			</div>
                <?php endif; ?>
            
       			<div class="glist w985 mt10">
          			<div class="clearfix">
                		<div class="list-sort">
                    		<div class="search-type clearfix">
								<div class="float-left btn-type">
									<a href="<?php echo url('app=search'); ?>" class="current">搜索商品</a>
									<a href="<?php echo url('app=search&act=store'); ?>" style="border-right:0px;">搜索店铺</a>
									<a href="<?php echo url('app=search&act=groupbuy'); ?>">搜索团购</a>
								</div>
								<?php if (! $this->_var['goods_list_order']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?>
                    		</div>	
                        	<form>
                            	<div class="display_mod float-left clearfix">
                                	<a class="qh-list" hidefocus="true" id="list"  href="javascript:;"><i></i>列表</a>
                                	<a class="qh-squares" hidefocus="true" id="squares"  href="javascript:;"><i></i>大图</a>
                            	</div>
                            	<div class="float-left btn-order">
                                	<!--<span>排序：</span>-->
                                	<?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'order');$this->_foreach['fe_order'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_order']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['order']):
        $this->_foreach['fe_order']['iteration']++;
?>
                                	<?php if (! $this->_var['k']): ?>
                                	<a class="btn-order-click default-sort" id="<?php echo $this->_var['k']; ?>" href="javascript:;"><?php echo $this->_var['order']; ?></a>
                                	<?php else: ?>
                                	<a class="btn-order-click order-down-gray" ectype="<?php echo $this->_var['k']; ?>" id="<?php echo $this->_var['k']; ?>" href="javascript:;"><?php echo $this->_var['order']; ?><i></i></a>
                                	<?php endif; ?>
                                	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            	</div>
                            	<div class="float-left filter-price">
                                	<div class="filter-price-box">
                                    	<b class="fp-input">
                                        	<i class="ui-price-plain">&yen;</i>
                                        	<input type="text" name="start_price" maxlength="6" value="" />
                                    	</b>
                                    	<i class="fp-split"></i>
                                    	<b class="fp-input">
                                        	<i class="ui-price-plain">&yen;</i>
                                        	<input type="text" name="end_price" maxlength="6" value="" />
                                    	</b>
                                    	<a class="ui-btn-s-primary">提交</a>
                                	</div>
                            	</div>
                        	</form>
                    	</div>
                        <?php if ($this->_var['goods_list_order']): ?>
                        <div class="goods-empty padding10 mb10">no_records_and_give_order</div>
                        <?php endif; ?>
            			<div class="<?php echo $this->_var['display_mode']; ?> goods-has clearfix w985" ectype="current_display_mode">
             				<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
             				<dl class="item clearfix dl-<?php echo $this->_var['goods']['goods_id']; ?>">
               					<dt><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['default_image']; ?>" /></a></dt>
                				<dd class="sub-images sub-images-<?php echo $this->_var['goods']['goods_id']; ?> hidden">
                					<?php $_from = $this->_var['goods']['_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image');$this->_foreach['fe_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_image']['total'] > 0):
    foreach ($_from AS $this->_var['image']):
        $this->_foreach['fe_image']['iteration']++;
?>
                   					<img src="<?php echo $this->_var['image']['thumbnail']; ?>" goods_id="<?php echo $this->_var['goods']['goods_id']; ?>" image_url="<?php echo $this->_var['image']['thumbnail']; ?>" width="30" height="30" style="<?php if (($this->_foreach['fe_image']['iteration'] <= 1)): ?>border:1px #BF1B30 solid<?php else: ?>border:1px #ddd solid<?php endif; ?>"/>
                    				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                				</dd>
                				<dd class="desc"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo sub_str(htmlspecialchars($this->_var['goods']['goods_name']),48); ?></a></dd>
                				<dd class="price twofloat clearfix"><em><?php echo $this->_var['goods']['price']; ?></em><span>zjcj<b><?php echo $this->_var['goods']['sales']; ?></b>bi</span></dd>
                            	<dd class="delivery twofloat clearfix hidden"><em></em><span></span></dd>
                            	<dd class="storeinfo twofloat clearfix">
                					<em><a href="<?php echo url('app=store&id=' . $this->_var['goods']['store_id']. ''); ?>" target="_blank"><?php echo $this->_var['goods']['store_name']; ?></a></em>
                                	<span class="hidden">
                                		<?php if ($this->_var['goods']['im_ww']): ?>
                    					<a title="与<?php echo $this->_var['goods']['store_name']; ?>店主交谈" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo urlencode($this->_var['goods']['im_ww']); ?>&site=cntaobao&s=2&charset=<?php echo $this->_var['charset']; ?>" target="_blank"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo urlencode($this->_var['goods']['im_ww']); ?>&site=cntaobao&s=2&charset=<?php echo $this->_var['charset']; ?>" alt="与<?php echo $this->_var['goods']['store_name']; ?>店主交谈" align="absmiddle"/></a>
                    					<?php endif; ?>
                                		<?php if ($this->_var['goods']['im_qq']): ?>
                   						<a title="与<?php echo $this->_var['goods']['store_name']; ?>店主交谈" href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo htmlspecialchars($this->_var['goods']['im_qq']); ?>&amp;Site=<?php echo htmlspecialchars($this->_var['goods']['store_name']); ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo htmlspecialchars($this->_var['goods']['im_qq']); ?>:4" alt="与<?php echo $this->_var['goods']['store_name']; ?>店主交谈" align="absmiddle"></a>
                                    	<?php endif; ?>
                                	</span>
                				</dd>
                            	<dd class="intro hidden">
                            		<ul>
            							<li><span>商品评价数：</span><span><a href="<?php echo url('app=goods&act=saleslog&id=' . $this->_var['goods']['goods_id']. ''); ?>">评论<?php echo $this->_var['goods']['comments']; ?>条</a></span></li>
            							<li><span>店铺好评率：</span><span><?php echo $this->_var['goods']['praise_rate']; ?>%</span></li>
            							<li><span>店铺信用度：</span><?php echo $this->_var['goods']['credit_value']; ?></li>
          							</ul>
                            	</dd>
             				</dl> 
            				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          				</div>
             			<?php if (! $this->_var['goods_list_order']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
          			</div>
       			</div>
  			</div>
        	<div class="col-sub">
      			<?php if ($this->_var['search_rec_goods']): ?>
      			<div class="sub-list mb10">
         			<div class="title"><h3>搜索推荐</h3></div>
         			<ul class="content clearfix">
            			<?php $_from = $this->_var['search_rec_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['fe_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['fe_goods']['iteration']++;
?>
             			<li class="item" <?php if (($this->_foreach['fe_goods']['iteration'] == $this->_foreach['fe_goods']['total'])): ?>style="border-bottom:0;"<?php endif; ?>>
                			<div class="pic"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img width="180" height="180" src="<?php echo $this->_var['goods']['default_image']; ?>"></a></div>
                			<div class="desc"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo sub_str(htmlspecialchars($this->_var['goods']['goods_name']),58); ?></a></div>
                			<div class="price"><em><?php echo $this->_var['goods']['price']; ?></em></div>
             			</li>
             			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          			</ul>
       			</div>
      			<?php endif; ?>
      			<?php if ($this->_var['search_rec_goods']): ?>
      			<div class="sub-list">
         			<div class="title"><h3>店长推荐</h3></div>
         			<ul class="content">
             			<?php $_from = $this->_var['owner_rec_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['fe_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['fe_goods']['iteration']++;
?>
             			<li class="item" <?php if (($this->_foreach['fe_goods']['iteration'] == $this->_foreach['fe_goods']['total'])): ?>style="border-bottom:0;"<?php endif; ?>>
                			<div class="pic"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><img width="180" height="180" src="<?php echo $this->_var['goods']['default_image']; ?>"></a></div>
                			<div class="desc"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo sub_str(htmlspecialchars($this->_var['goods']['goods_name']),58); ?></a></div>
                			<div class="price"><em><?php echo $this->_var['goods']['price']; ?></em></div>
             			</li>
             			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          			</ul>
      			</div>
     			<?php endif; ?>
   			</div>
    	</div>
   		<?php if ($this->_var['recommend_goods']): ?>
   		<div class="recommend">
			<div class="title"><span></span>recommend_goods</div>
			<div class="content clearfix">
				<?php $_from = $this->_var['recommend_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['fe_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['fe_goods']['iteration']++;
?>
				<dl class="mb10">
					<dt><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img width="170" height="170"  src="<?php echo $this->_var['goods']['default_image']; ?>" /></a></dt>
					<dd class="desc"><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo sub_str(htmlspecialchars($this->_var['goods']['goods_name']),48); ?></a></dd>
					<dd class="price twofloat clearfix"><em><?php echo $this->_var['goods']['price']; ?></em><span>zjcj<?php echo $this->_var['goods']['sales']; ?>bi</span></dd>
					<dd class="service"></dd>
				</dl>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		</div>
		<?php endif; ?>
    </div>
</div>
<?php echo $this->fetch('server.html'); ?>
<?php echo $this->fetch('footer.html'); ?>
