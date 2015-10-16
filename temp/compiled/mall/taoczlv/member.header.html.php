<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="author" content="ecmall.shopex.cn" />
<meta name="copyright" content="ShopEx Inc. All Rights Reserved" />
<link href="<?php echo $this->res_base . "/" . 'css/global.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/user.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/footer.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
//]]>
</script>
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'member.js'; ?>" charset="utf-8"></script>
<!--[if lte IE 6]>
<script type="text/javascript" language="Javascript" src="<?php echo $this->res_base . "/" . 'js/hoverForIE6.js'; ?>"></script>
<![endif]-->
<script type="text/javascript">
$(function(){
    $('#left h1 span,h2.title a.fold').click(function(){
        if($(this).hasClass('span_close')){
            $(this).removeClass('span_close');
            $(this).addClass('span_open');
            this.title = 'open';
            closeSubmenu($(this).parent());
        }
        else{
            $(this).removeClass('span_open');
            $(this).addClass('span_close');
            this.title = 'close';
            openSubmenu($(this).parent());
        }
    });

    var span = $("#child_nav");
    span.hover(function(){
        $("#float_layer:not(:animated)").show();
    }, function(){
        $("#float_layer").hide();
    });
	
	// tyioocom
	$('.tsearch-tabs li').click(function(){
		$(this).parent().find('li').each(function(){
			$(this).attr('class','');
		});
		$(this).attr('class','tsearch-tabs-active');
		$('.tsearch-panel input[name="act"]').val($(this).attr('ectype'));
	});
	$('.tsearch-panel #keyword').focus(function(){
		$('.tsearch-panel label').hide();
	}).blur(function(){
		if($(this).val()==''){
			$('.tsearch-panel label').show();
		}
	});
	
});
function closeSubmenu(h1){
    h1.next('ul').css('display', 'none');
}
function openSubmenu(h1){
    h1.next('ul').css('display', '');
}
</script>
<?php echo $this->_var['_head_tags']; ?>
</head>
<style type="text/css">
#footer_links dl {width: 170px !important;margin-left:15px;_margin-left:0px;}
#footer_links {width: 1000px !important;_width:930px  !important;padding: 20px 0px 15px 0px !important;}
#footer #footer_links2 {width: 1000px !important;padding: 20px 0px 15px 0px;}
#footer #footer_links2  dl{width:95px !important;}
#footer #footer_links2  dl.last{width:130px !important;}
</style>
<body>
<div id="site-nav" class="w-full">
   <div class="shoptop w clearfix">
      <div class="login_info">
         您好,
         <?php if (! $this->_var['visitor']['user_id']): ?>
         <?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?>
         <a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">登录</a>
         <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册</a>
         <?php else: ?>
         <a href="<?php echo url('app=member'); ?>"><span><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></span></a>
         <a href="<?php echo url('app=member&act=logout'); ?>">退出</a>
         <a href="<?php echo url('app=message&act=newpm'); ?>">站内消息<?php if ($this->_var['new_message']): ?>(<span><?php echo $this->_var['new_message']; ?></span>)<?php endif; ?></a>
         <?php endif; ?>
      </div>
      <ul class="quick-menu">
        <?php if (! $this->_var['index']): ?><li class="home"><a href="<?php echo $this->_var['site_url']; ?>">回到首页</a></li><?php endif; ?>
        <li class="item">
           <div class="menu iwantbuy">
              <a class="menu-hd" href="<?php echo url('app=category'); ?>">我要买<b></b></a>
              <div class="menu-bd">
                 <div class="menu-bd-panel">
                    <div>
                       <p><a href="<?php echo url('app=category'); ?>">商品分类</a></p>
                       <p><a href="#">大家正在买</a></p>
					   <p><a href="#">品味连连看</a></p>
                    </div>
                 </div>
              </div>
           </div>
         </li>
         <li class="item">
            <div class="menu mytb">
               <a class="menu-hd" href="<?php echo url('app=buyer_admin'); ?>">我是买家<b></b></a>
               <div class="menu-bd">
                  <div class="menu-bd-panel">
                     <div>
                        <p><a href="<?php echo url('app=buyer_order'); ?>">已买到的宝贝</a></p>
                        <p><a href="<?php echo url('app=friend'); ?>">我的好友</a></p>
                        <p><a href="<?php echo url('app=my_question'); ?>">我的咨询</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <li class="item">
            <div class="menu seller-center">
               <a class="menu-hd" href="<?php echo url('app=seller_admin'); ?>">卖家中心<b></b></a>
               <div class="menu-bd">
                  <div class="menu-bd-panel">
                     <div>
                        <p><a href="<?php echo url('app=seller_order'); ?>">已卖出的宝贝</a></p>
                        <p><a href="<?php echo url('app=my_goods'); ?>">出售中的宝贝</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <li class="service">
            <a href="<?php echo url('app=article&code=help'); ?>">帮助中心</a>
         </li>
         <li class="item">
            <div class="menu mini-cart">
               <a class="ac" href="<?php echo url('app=cart'); ?>">
                  <s></s>购物车<strong><?php echo $this->_var['cart_goods_kinds']; ?></strong>件<b></b>
               </a>
               <div class="mini-cart-content menu-bd">
                  <dl class="mini-cart-bd">
                     <?php if ($this->_var['cart_goods_kinds']): ?>
                     <dt class="mini-cart-hd">最近加入的宝贝：</dt>
                     <?php $_from = $this->_var['carts_top']['cart_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cart');if (count($_from)):
    foreach ($_from AS $this->_var['cart']):
?>
                     <dd class="mini-cart-each clearfix" id="cart_goods<?php echo $this->_var['cart']['rec_id']; ?>">
                        <div class="mini-cart-img">
                           <a href="<?php echo url('app=goods&id=' . $this->_var['cart']['goods_id']. ''); ?>" target="_top">
                              <img alt="<?php echo $this->_var['cart']['goods_name']; ?>" src="<?php echo $this->_var['cart']['goods_image']; ?>" width="40" height="40">
                           </a>
                        </div>
                        <div class="mini-cart-title">
                           <a title="<?php echo $this->_var['cart']['goods_name']; ?>" href="<?php echo url('app=goods&id=' . $this->_var['cart']['goods_id']. ''); ?>" target="_top"><?php echo $this->_var['cart']['goods_name']; ?></a>
                        </div>
                        <div class="price-admin">
                           <div class="mini-cart-count"><strong class="mini-cart-price"><?php echo price_format($this->_var['cart']['price']); ?></strong></div>
                           <div class="mini-cart-del"><a href="javascript:;" onclick="drop_cart_item(<?php echo $this->_var['cart']['store_id']; ?>, <?php echo $this->_var['cart']['rec_id']; ?>);">删除</a></div>
                        </div>
                     </dd>
                     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                     <?php else: ?>
                     <dt class="mt10 fleft mini-cart-empty">您购物车里还没有任何宝贝</dt>
                     <?php endif; ?>
                     <dd class="mini-cart-bt">
                        <a href="<?php echo url('app=cart'); ?>">查看我的购物车</a>
                     </dd>                          
                  </dl>
               </div>
            </div>
         </li>
         <li class="service">
            <a href="<?php echo url('app=article&code=help'); ?>">在线客服</a>
         </li>
         <li class="item">
            <div class="menu favorite">
               <a class="menu-hd" href="<?php echo url('app=my_favorite'); ?>">收藏夹<b></b></a>
               <div class="menu-bd">
                  <div class="menu-bd-panel">
                     <div>
                       <p><a href="<?php echo url('app=my_favorite'); ?>">收藏的宝贝</a></p>
                       <p><a href="<?php echo url('app=my_favorite&type=store'); ?>">收藏的店铺</a></p>
                    </div>
                 </div>
               </div>
           </div>
         </li>
         <li class="item" style="background:none">
            <div class="menu sites">
               <a class="menu-hd" href="javascript:;">网站导航<b></b></a>
               <div class="menu-bd padding10">
                  <?php $_from = $this->_var['navs']['header']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
                  <a href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
               </div>
            </div>
        </li>
     </ul>
   </div>
  <div class="fixed">
      <a id="gotop" href="javascript:window.scroll(0,0)" class="gotop"></a>
      <a href="javascript:;" class="feedbacklink"></a>
      <a href="javascript:;" class="zhaoping"></a>
   </div>
</div>
<div id="header">
	<div class="w clearfix">
    	<div class="logo" title="<?php echo $this->_var['site_title']; ?>"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>" alt="<?php echo $this->_var['site_title']; ?>" /></a></div>
        <div class="search">
            <div class="tsearch tsearch-lite">
				<div class="tsearch-tabs">
					<ul>
						<li class="tsearch-tabs-active" ectype="index"><a href="javascript:;">goods</a><s class="rc-tp-l"></s><s class="rc-tp-r"></s></li>
						<li ectype="store"><a href="javascript:;">店铺</a><s class="rc-tp-l"></s><s class="rc-tp-r"></s></li>
                        <li ectype="groupbuy"><a href="javascript:;">团购</a><s class="rc-tp-l"></s><s class="rc-tp-r"></s></li>
					</ul>
				</div>
				<div class="tsearch-panel clearfix">
					<form  name="search" target="_top">
                    	<input type="hidden" name="app" value="search" />
                        <input type="hidden" name="act" value="index" />
						<div class="tsearch-panel-fields">
							<label for="keyword">请输入关键词</label>
							<input name="keyword" id="keyword" class="keyword"/>
							<s class="rc-tp-l"></s>
							<s class="rc-bt-l"></s>
							<s class="tsearch-panel-fields-shadow"></s>
						</div>
						<button type="submit" hidefocus="true">搜索</button>
					</form>
					<s class="rc-tp-l"></s>
					<s class="rc-tp-r"></s>
					<s class="rc-bt-l"></s>
					<s class="rc-bt-r"></s>
				</div>
			</div>
        </div>
    </div>
    <div class="w shopnav">
    	<ul class="clearfix">
        	<li class="first <?php if ($this->_var['member_role'] == 'buyer_admin' || ! $this->_var['member_role']): ?>current<?php endif; ?>"><a href="<?php echo url('app=buyer_admin'); ?>"><strong>我是买家</strong></a></li>
            <li class="last <?php if ($this->_var['member_role'] == 'seller_admin'): ?>current<?php endif; ?>"><a href="<?php echo url('app=seller_admin'); ?>"><strong>我是卖家</strong></a></li>
        </ul>
    </div>
</div>
