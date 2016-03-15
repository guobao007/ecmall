<?php echo $this->fetch('header.html'); ?>
<link href="<?php echo $this->res_base . "/" . 'home_goods.css'; ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'goodsinfo.js'; ?>" charset="utf-8"></script>
<div id="content" class="wrapper pr">
    <div class="ncs-detail">
        
        <div id="ncs-goods-picture" class="ncs-goods-picture image_zoom"> </div>
        
        <div class="ncs-goods-summary">
            <div class="name">
            <h1><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></h1>
            <strong></strong>
            </div>
            <div class="ncs-meta">
                
<!--                <dl>
                    <dt>市 场 价：</dt>
                    <dd class="cost-price"><strong><?php echo price_format($this->_var['goods']['_specs']['0']['price']); ?></strong></dd>
                </dl>-->
                
                <dl>
                    <dt>商 城 价：</dt>
                    <dd class="price">
                      <strong ectype="goods_price"><?php echo price_format($this->_var['goods']['_specs']['0']['price']); ?></strong>
                    </dd>
                </dl>
                <dl>
                    <dt>品&nbsp;&nbsp;&nbsp;&nbsp;牌：</dt>
                    <dd><?php echo htmlspecialchars($this->_var['goods']['brand']); ?></dd>
                </dl>
                <dl>
                    <dt>所在地区：</dt>
                    <dd><?php echo htmlspecialchars($this->_var['store']['region_name']); ?></dd>
                </dl>
                
                <dl>
                    <dt>累计售出：</dt>
                    <dd><strong><a href="#ncGoodsTraded"><?php echo $this->_var['goods']['sales']; ?></a></strong>&nbsp;件</dd>
                </dl>
                 
            </div>
            <div class="ncs-key">
                
                <?php if ($this->_var['goods']['spec_qty'] > 0): ?>
                <dl nctype="nc-spec" class="nc-spec">
                    <dt><?php echo htmlspecialchars($this->_var['goods']['spec_name_1']); ?>：</dt>
                    <dd>
                        <ul nctyle="ul_sign"></ul>
                    </dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['goods']['spec_qty'] > 1): ?>
                <dl nctype="nc-spec" class="nc-spec">
                    <dt><?php echo htmlspecialchars($this->_var['goods']['spec_name_2']); ?>：</dt>
                    <dd>
                        <ul nctyle="ul_sign"></ul>
                    </dd>
                </dl>
                <?php endif; ?>
                 
                
                <dl>
                    <dt>购买数量：</dt>
                    <dd class="ncs-figure-input">
                        <input type="text" name="" id="quantity" value="1" size="3" maxlength="6" class="text w30">
                        <a href="javascript:void(0)" class="increase">+</a><a href="javascript:void(0)" class="decrease">-</a> <em>(当前库存<strong ectype="goods_stock"><?php echo $this->_var['goods']['_specs']['0']['stock']; ?></strong>件)</em>
                    </dd>
                </dl>
                 
                
                
                
                <div class="ncs-btn">
                    <?php if ($this->_var['goods']['spec_qty'] > 0): ?>
                    <div nctype="goods_prompt" class="ncs-point" ectype="current_spec"></div>
                    <?php endif; ?>
                     
                    <a href="javascript:void(0);" nctype="buynow_submit" class="buynow <?php if ($this->_var['goods']['_specs']['0']['stock'] <= 0): ?>no-buynow<?php endif; ?>" title="立即购买">立即购买</a>
                    
                    <a href="javascript:void(0);" nctype="addcart_submit" class="addcart <?php if ($this->_var['goods']['_specs']['0']['stock'] <= 0): ?>no-addcart<?php endif; ?>" title="添加购物车"><i class="icon-shopping-cart"></i>添加购物车</a>
                    
                    
                    <div class="ncs-cart-popup">
                        <dl>
                            <dt>成功添加到购物车<a title="关闭" onClick="$('.ncs-cart-popup').css({'display':'none'});">X</a></dt>
                            <dd>购物车共有 <strong id="bold_num"></strong> 种商品 总金额为：<em id="bold_mly" class="saleP"></em></dd>
                            <dd class="btns">
                                <a href="javascript:void(0);" class="ncs-btn-mini ncs-btn-green" onClick="location.href='<?php echo url('app=cart'); ?>'">查看购物车</a> 
                                <a href="javascript:void(0);" class="ncs-btn-mini" value="" onClick="$('.ncs-cart-popup').css({'display':'none'});">继续购物</a>
                            </dd>
                        </dl>
                    </div>
                    
                </div>
                <div class="ncs_share">
                    <a href="javascript:collect_goods(<?php echo $this->_var['goods']['goods_id']; ?>);"><i class="icon-star-empty"></i>收藏商品<em nctype="goods_collect"></em></a>
                </div>
            </div>
        </div>
    </div>
    <div class="ncs-goods-layout expanded" >
        <div class="ncs-goods-main" id="main-nav-holder">
            <nav class="tabbar pngFix" id="main-nav">
                <div class="ncs-goods-title-nav">
                    <ul id="categorymenu">
                        <li class="current"><a id="tabGoodsIntro" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>#content">商品详情</a></li>
                        <li><a id="tabGoodsRate" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>#content">商品评论</a></li>
                        <li><a id="tabGoodsTraded" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>#content">销售记录</a></li>
                        <li><a id="tabGuestbook" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>#content">产品咨询</a></li>
                    </ul>
                    <div class="switch-bar"><a href="javascript:void(0)" id="fold">&nbsp;</a></div>
                </div>
            </nav>
            <div class="ncs-intro">
                <div class="content bd" id="ncGoodsIntro">
                    <div class="ncs-goods-info-content">
                        <?php echo html_filter($this->_var['goods']['description']); ?>
                    </div>
                </div>
            </div>
            <div class="ncs-comment">
                <div class="ncs-goods-title-bar hd">
                    <h4><a href="javascript:void(0);">商品评价</a></h4>
                </div>
                <div class="ncs-goods-info-content bd" id="ncGoodsRate">
                    <div class="ncs-goods-title-nav">
                        <ul id="comment_tab">
                            <li data-type="all" class="current"><a href="javascript:void(0);">商品评论(<?php echo $this->_var['count_all']; ?>)</a></li>
                            <li data-type="3"><a href="javascript:void(0);">好评(<?php echo $this->_var['count_type3']; ?>)</a></li>
                            <li data-type="2"><a href="javascript:void(0);">中评(<?php echo $this->_var['count_type2']; ?>)</a></li> 
                            <li data-type="1"><a href="javascript:void(0);">差评(<?php echo $this->_var['count_type1']; ?>)</a></li>
                        </ul>
                    </div>
                    
                    <div id="goodseval" class="ncs-commend-main"></div>
                </div>
            </div>
            <div class="ncg-salelog">
                <div class="ncs-goods-title-bar hd">
                    <h4><a href="javascript:void(0);">销售记录</a></h4>
                </div>
                <div class="ncs-goods-info-content bd" id="ncGoodsTraded">
                    <div class="top">
                        <div class="price">
                            商 城 价<strong><?php echo $this->_var['goods']['price']; ?></strong>元
                            <span>购买的价格不同可能是由于店铺往期促销活动引起的，详情可以咨询卖家</span>
                        </div>
                    </div>
                    
                    <div id="salelog_demo" class="ncs-loading"> </div>
                </div>
            </div>
            <div class="ncs-consult">
                <div class="ncs-goods-title-bar hd">
                    <h4><a href="javascript:void(0);">购买咨询</a></h4>
                </div>
                <div class="ncs-goods-info-content bd" id="ncGuestbook"> 
                    
                    <div class="ncs-guestbook">
                        <div id="cosulting_demo" class="ncs-loading"> </div>
                    </div>
                </div>
            </div>
            <?php if ($this->_var['store']['rec_goodslist']): ?>
            <div class="ncs-recommend">
                <div class="title"><h4>热门推荐</h4></div>
                <div class="content">
                    <ul>
                        <?php $_from = $this->_var['store']['rec_goodslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'r_goods');if (count($_from)):
    foreach ($_from AS $this->_var['r_goods']):
?>
                        <li>
                            <dl>
                                <dt class="goods-name"><a href="<?php echo url('app=goods&id=' . $this->_var['r_goods']['goods_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['r_goods']['goods_name']); ?></a></dt>
                                <dd class="goods-pic"><a href="<?php echo url('app=goods&id=' . $this->_var['r_goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['r_goods']['default_image']; ?>" onload="javascript:DrawImage(this,240,240);" alt="<?php echo htmlspecialchars($this->_var['r_goods']['goods_name']); ?>"/></a></dd>                            <dd class="goods-price">¥<?php echo $this->_var['r_goods']['price']; ?></dd>
                            </dl>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="ncs-sidebar">
            <div class="nc-s-c-s1">
                <div class="title">
                  <h4>商品二维码<?php echo $this->_var['goods']['store_data']['store_id']; ?></h4>
                </div>
                <div class="content">
                    <div class="ncs-goods-code">
                        <p><img src="<?php echo $this->_var['goods_qrcode']; ?>"></p>
                        <span class="ncs-goods-code-note"><i></i>扫描二维码，手机查看分享</span> 
                    </div>
                </div>
            </div>
            <div class="ncs-message-bar">
                <div class="default">
                    <h5><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></h5>
                </div>
                <?php if ($this->_var['store']['im_qq'] || $this->_var['store']['im_ww'] || $this->_var['store']['im_msn']): ?>
                <div class="service-list">
                    <dl>
                        <dt>在线客服：</dt>
                    </dl>
                    <?php if ($this->_var['store']['im_qq']): ?>
                    <dd>
                        <span>Q&nbsp;Q</span>
                        <span>
                            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo htmlspecialchars($this->_var['store']['im_qq']); ?>&site=qq&menu=yes" title="QQ: <?php echo htmlspecialchars($this->_var['store']['im_qq']); ?>"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo htmlspecialchars($this->_var['store']['im_qq']); ?>:51" style=" vertical-align: middle;"/></a>
                        </span>
                    </dd>
                    <?php endif; ?>
                    <?php if ($this->_var['store']['im_ww']): ?>
                    <dd>
                        <span>旺旺</span>
                        <span>
                            <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid=<?php echo urlencode($this->_var['store']['im_ww']); ?>&site=cntaobao&s=1&charset=<?php echo $this->_var['charset']; ?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo urlencode($this->_var['store']['im_ww']); ?>&site=cntaobao&s=1&charset=<?php echo $this->_var['charset']; ?>" alt="Wang Wang"/></a>
                        </span>
                    </dd>
                    <?php endif; ?>
                    <?php if ($this->_var['store']['im_msn']): ?>
                    <dd>
                        <span>MSN</span>
                        <span>
                            <a target="_blank" href="http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee=<?php echo htmlspecialchars($this->_var['store']['im_msn']); ?>"><img src="http://messenger.services.live.com/users/<?php echo htmlspecialchars($this->_var['store']['im_msn']); ?>/presenceimage/" alt="status" /></a>
                        </span>
                    </dd>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php echo $this->fetch('goods.left.html'); ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->_var['mallStyle']; ?>/js/waypoints.js"></script>
<script type="text/javascript">
/** 辅助浏览 **/
jQuery(function($){
	//产品图片
	$.getScript('<?php echo $this->res_base . "/" . 'js/ImageZoom.js'; ?>', function(){
		var 
		zoomController,
		zoomControllerUl,
		zoomControllerUlLeft = 0,
		shell = $('#ncs-goods-picture'),
		shellPanel = shell.parent().hide(),
		heightOffset = 80,
		minGallerySize = [380, shellPanel.height() - heightOffset],
		imageZoom = new ImageZoom({
			shell: shell,
			basePath: '',
			levelASize: [60, 60],
			levelBSize: [360, 360],
			gallerySize: minGallerySize,
			onBeforeZoom: function(index, level){
				if(!zoomController){
					zoomController = shell.find('div.controller');
				}

				var 
				self = this,
				duration = 320,
				width = minGallerySize[0], 
				height = minGallerySize[1],
				zoomFx = function(){
					self.ops.gallerySize = [width, height];
					self.galleryPanel.stop().animate({width:width, height:height}, duration);
					shellPanel.stop().animate({height:height + heightOffset}, duration);
					zoomController.animate({width:width-22}, duration);
					shell.stop().animate({width:width}, duration);
				};
				if(level !== this.level && this.level !== 0){
					if(this.level === 1 && level > 1){
						height = Math.max(520, shellPanel.height());
						width = shellPanel.width();
						zoomFx();
					}
					else if(level === 1){
						zoomFx();
					}
				}
			},
			onZoom: function(index, level, prevIndex){
				if(index !== prevIndex){
					if(!zoomControllerUl){
						zoomControllerUl = zoomController.find('ul').eq(0);
					}
					var 
					width = 76, 
					ops = this.ops,
					count = ops.items.length,
					panelVol = ~~((zoomController.width() + 10)/width),
					minLeft = width * (panelVol - count),
					left = Math.min(0, Math.max(minLeft, -width * ~~(index-panelVol/2)));

					if(zoomControllerUlLeft !== left){
						zoomControllerUl.stop().animate({left: left}, 320);
						zoomControllerUlLeft = left;
					}
				}
				shell.find('a.prev,a.next')[level<3 ? 'removeClass' : 'addClass']('hide');
				shell.find('a.close').css('display', [level>1 ? 'block' : 'none']);
			},
			items: [
                            <?php $_from = $this->_var['goods']['_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_image');$this->_foreach['fe_goods_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods_image']['total'] > 0):
    foreach ($_from AS $this->_var['goods_image']):
        $this->_foreach['fe_goods_image']['iteration']++;
?>
                            { title : '', levelA : '<?php echo $this->_var['goods_image']['thumbnail']; ?>', levelB : '<?php echo $this->_var['goods_image']['thumbnail']; ?>', levelC : '<?php echo $this->_var['goods_image']['image_url']; ?>', levelD : '<?php echo $this->_var['goods_image']['image_url']; ?>'}<?php if (($this->_foreach['fe_goods_image']['iteration'] == $this->_foreach['fe_goods_image']['total'])): ?><?php else: ?>,<?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            ]
		});
		shell.data('imageZoom', imageZoom);

		shellPanel.show();
	});

});
</script> 

<script>
var specs = new Array();
<?php $_from = $this->_var['goods']['_specs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec']):
?>
specs.push(new spec(<?php echo $this->_var['spec']['spec_id']; ?>, '<?php echo htmlspecialchars($this->_var['spec']['spec_1']); ?>', '<?php echo htmlspecialchars($this->_var['spec']['spec_2']); ?>', <?php echo $this->_var['spec']['price']; ?>, <?php echo $this->_var['spec']['stock']; ?>));
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var specQty = <?php echo $this->_var['goods']['spec_qty']; ?>;
var defSpec = <?php echo htmlspecialchars($this->_var['goods']['default_spec']); ?>;
var goodsspec = new goodsspec(specs, specQty, defSpec);
$(function(){
    /* 商品购买数量增减js */
    // 增加
    $('.increase').click(function(){
        num = parseInt($('#quantity').val());
        max = parseInt($('[nctype="goods_stock"]').text());
        if(num < max){
            $('#quantity').val(num+1);
        }
    });
    //减少
    $('.decrease').click(function(){
        num = parseInt($('#quantity').val());
        if(num > 1){
                $('#quantity').val(num-1);
        }
    });
    // 加入购物车
    $('a[nctype="addcart_submit"]').click(function(){
        var spec_id = get_spec_id();
        addcart(spec_id, checkQuantity());
    });
    // 立即购买
    $('a[nctype="buynow_submit"]').click(function(){
        var spec_id = get_spec_id();
        buynow(spec_id,checkQuantity());
    });
    
    // 商品内容部分折叠收起侧边栏控制
    $('#fold').click(function(){
        $('.ncs-goods-layout').toggleClass('expanded');
    });
    // 商品内容介绍Tab样式切换控制
    $('#categorymenu').find("li").click(function(){
        $('#categorymenu').find("li").removeClass('current');
        $(this).addClass('current');
    });
    // 商品详情默认情况下显示全部
    $('#tabGoodsIntro').click(function(){
        $('.bd').css('display','');
        $('.hd').css('display','');	
    });
    // 点击评价隐藏其他以及其标题栏
    $('#tabGoodsRate').click(function(){
        $('.bd').css('display','none');
        $('#ncGoodsRate').css('display','');
        $('.hd').css('display','none');
    });
    // 点击成交隐藏其他以及其标题
    $('#tabGoodsTraded').click(function(){
        $('.bd').css('display','none');
        $('#ncGoodsTraded').css('display','');
        $('.hd').css('display','none');
    });
    // 点击咨询隐藏其他以及其标题
    $('#tabGuestbook').click(function(){
        $('.bd').css('display','none');
        $('#ncGuestbook').css('display','');
        $('.hd').css('display','none');
    });
    //商品排行Tab切换
    $(".ncs-top-tab > li > a").mouseover(function(e) {
        if (e.target == this) {
            var tabs = $(this).parent().parent().children("li");
            var panels = $(this).parent().parent().parent().children(".ncs-top-panel");
            var index = $.inArray(this, $(this).parent().parent().find("a"));
            if (panels.eq(index)[0]) {
                tabs.removeClass("current ").eq(index).addClass("current ");
                panels.addClass("hide").eq(index).removeClass("hide");
            }
        }
    });
    //信用评价动态评分打分人次Tab切换
    $(".ncs-rate-tab > li > a").mouseover(function(e) {
        if (e.target == this) {
            var tabs = $(this).parent().parent().children("li");
            var panels = $(this).parent().parent().parent().children(".ncs-rate-panel");
            var index = $.inArray(this, $(this).parent().parent().find("a"));
            if (panels.eq(index)[0]) {
                tabs.removeClass("current ").eq(index).addClass("current ");
                panels.addClass("hide").eq(index).removeClass("hide");
            }
        }
    });
    //加载销量
    $("#salelog_demo").load('index.php?app=goods&act=ajax_saleslog&id=<?php echo $this->_var['goods']['goods_id']; ?>');
    //加载咨询
    $("#cosulting_demo").load('index.php?app=goods&act=ajax_cosulting&id=<?php echo $this->_var['goods']['goods_id']; ?>&store_id=<?php echo $this->_var['store']['store_id']; ?>');
    
    //浮动导航  waypoints.js
    $('#main-nav').waypoint(function(event, direction) {
        $(this).parent().parent().parent().toggleClass('sticky', direction === "down");
        event.stopPropagation();
    });
});

/* 获取规格ID */
function get_spec_id()
{
    if (goodsspec.getSpec() == null)
    {
        alert(lang.select_specs);
        return;
    }
    var spec_id = goodsspec.getSpec().id;
    return spec_id;
}

// 验证购买数量
function checkQuantity(){
    var quantity = parseInt($("#quantity").val());
    if (quantity < 1) {
        alert("请填写购买数量");
        $("#quantity").val('1');
        return false;
    }
    max = parseInt($('[nctype="goods_stock"]').text());
    if(quantity > max){
        alert("库存不足");
        return false;
    }
    return quantity;
}

// 立即购买js
function buynow(spec_id,quantity){
    if (!quantity) {
        return;
    }
    <?php if ($_SESSION['user_info']['store_id'] == $this->_var['store']['store_id']): ?>
    alert('不能购买自己店铺的商品');return;
    <?php endif; ?>
    var url = SITE_URL + '/index.php?app=cart&act=add';
    $.getJSON(url, {'spec_id':spec_id, 'quantity':quantity}, function(data){
        if(data != null){
            if (data.done){
                window.location.href= SITE_URL + '/index.php?app=order&goods=cart&store_id=<?php echo $this->_var['goods']['store_id']; ?>';
            }else{
                alert(data.msg);
            }
        }
    });
}

/* 加入购物车 */
function addcart(spec_id, quantity)
{
    if (!quantity) return false;
    <?php if ($_SESSION['user_info']['store_id'] == $this->_var['store']['store_id']): ?>
    alert('不能购买自己店铺的商品');return;
    <?php endif; ?>
    var url = SITE_URL + '/index.php?app=cart&act=add';
    $.getJSON(url, {'spec_id':spec_id, 'quantity':quantity}, function(data){
    	if(data != null){
    		if (data.done)
            {
                $('#bold_num').html(data.retval.cart.kinds);
                $('#bold_mly').html(price_format(data.retval.cart.amount));
                $('.ncs-cart-popup').fadeIn('fast');
//                 setTimeout(slideUp_fn, 5000);
                // 头部加载购物车信息
                load_cart_information();
            }
            else
            {
                alert(data.msg);
            }
    	}
    });
}

//评价列表
$(document).ready(function(){
    $('#comment_tab').on('click', 'li', function() {
        $('#comment_tab li').removeClass('current');
        $(this).addClass('current');
        load_goodseval($(this).attr('data-type'));
    });

    load_goodseval('all');

    function load_goodseval(type) {
        var url = 'index.php?app=goods&act=ajax_comments&id=<?php echo $this->_var['goods']['goods_id']; ?>';
        url += '&type=' + type;
        $("#goodseval").load(url);
    }
});
</script>
<?php echo $this->fetch('footer.html'); ?>
