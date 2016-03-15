<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<link href="<?php echo $this->res_base . "/" . 'shop.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_var['mallStyle']; ?>/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_var['mallStyle']; ?>/css/home_header.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_var['mallStyle']; ?>/css/head.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_var['mallStyle']; ?>/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

<!--[if lt IE 9]>
      <script src="<?php echo $this->_var['mallStyle']; ?>/js/html5shiv.js"></script>
<![endif]-->
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->_var['mallStyle']; ?>/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->_var['mallStyle']; ?>/js/jquery.masonry.js" charset="utf-8"></script>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';

$(function(){
    var span = $("#child_nav");
    span.hover(function(){
        $("#float_layer:not(:animated)").show();
    }, function(){
        $("#float_layer").hide();
    });
    
    //首页左侧分类菜单
    $(".category ul.menu").find("li").each(
        function() {
            $(this).hover(
                function() {
                    var cat_id = $(this).attr("cat_id");
                        var menu = $(this).find("div[cat_menu_id='"+cat_id+"']");
                        menu.show();
                        $(this).addClass("hover");
                        if(menu.attr("hover")>0) return;
                        menu.masonry({itemSelector: 'dl'});
                        var menu_height = menu.height();
                        if (menu_height < 60) menu.height(80);
                        menu_height = menu.height();
                        var li_top = $(this).position().top;
                        if ((li_top > 60) && (menu_height >= li_top))
                            $(menu).css("top", -li_top + 50);
                        if ((li_top > 150) && (menu_height >= li_top))
                            $(menu).css("top", -li_top + 90);
                        if ((li_top > 240) && (li_top > menu_height))
                            $(menu).css("top", menu_height - li_top + 90);
                        if (li_top > 300 && (li_top > menu_height))
                            $(menu).css("top", 60 - menu_height);
                        if ((li_top > 40) && (menu_height <= 120))
                            $(menu).css("top", -5);
                        menu.attr("hover", 1);
                    },
                    function () {
                        $(this).removeClass("hover");
                        var cat_id = $(this).attr("cat_id");
                        $(this).find("div[cat_menu_id='" + cat_id + "']").hide();
                    }
                );
            }
        );
    $(".head-user-menu dl").hover(function() {
            $(this).addClass("hover");
    },
    function() {
            $(this).removeClass("hover");
    });
    $('.head-user-menu .my-mall').mouseover(function(){// 最近浏览的商品
            load_history_information();
            $(this).unbind('mouseover');
    });
    $('.head-user-menu .my-cart').mouseover(function(){// 运行加载购物车
            load_cart_information();
            $(this).unbind('mouseover');
    });
    $('#button').click(function(){
        if ($('#keyword').val() == '') {
                return false;
        }
    });
});
//]]>
</script>
<?php echo $this->_var['_head_tags']; ?>
</head>

<body>

    <div id="topbox">
        <div class="content1">
            <div class="user-entry">
                <?php if (! $this->_var['visitor']['user_id']): ?>
                    <div class="topl">
                        <form action="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>" method="post" name="form1" id="form1">    
                            <div class="welcome">您好！欢迎光临<?php echo $this->_var['site_title']; ?>！</div>
                            <div class="login">用户名 
                                <input type="text" name="user_name" autocomplete="off" class="input0 wid100"> 
                                密码 
                                <input type="password" autocomplete="off" name="password" class="input0 wid100"> 
                                <input type="submit" value="登录" id="submit" name="submit" class="but1">
                                <a href="<?php echo url('app=find_password'); ?>">忘记密码？</a><a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册新用户&gt;&gt;</a>
                            </div> 
                        </form> 
                    </div>
                <?php else: ?>
                    <div style="float:left;padding-top:10px;width:650px;">
                    <span>您好<a href="<?php echo url('app=member'); ?>"><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></a></span>
                    <span>欢迎来到<a href="/"  title="<?php echo $this->_var['site_title']; ?>" alt="<?php echo $this->_var['site_title']; ?>"><?php echo $this->_var['site_title']; ?></a></span>
  <span>[<a href="<?php echo url('app=member&act=logout'); ?>">退出</a>]</span>
                    </div>
                <?php endif; ?>

            </div>
            <div class="public-top-layout w">
                <div class="quick-menu">
                    <dl class="">
                        <dt>
                        <a href="<?php echo url('app=buyer_order'); ?>">我的订单</a><i></i></dt>
                        <dd>
                            <ul>
                                <li><a href="<?php echo url('app=buyer_order&type=pending'); ?>">待付款订单</a></li>
                                <li><a href="<?php echo url('app=buyer_order&type=shipped'); ?>">待确认收货</a></li>
                                <li><a href="<?php echo url('app=buyer_order&type=finished'); ?>">待评价交易</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl>
                        <dt><a href="<?php echo url('app=my_favorite'); ?>">我的收藏</a><i></i></dt>
                        <dd>
                            <ul>
                                <li><a href="<?php echo url('app=my_favorite'); ?>">商品收藏</a></li>
                                <li><a href="<?php echo url('app=my_favorite&type=store'); ?>">店铺收藏</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="">
                        <dt>客户服务<i></i></dt>
                        <dd>
                            <ul>
                                <li><a href="<?php echo url('app=my_question'); ?>">我的咨询</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl>
                        <dt>关注我们<i></i></dt>
                        <dd>
                            <ul>
                                <!--
                                  <li><img src="" width="100" height="100"></li>
                                  <li><img src="" width="100" height="100"></li>
                                -->
                            </ul>
                        </dd>
                    </dl>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(function(){
      $(".quick-menu dl").hover(function() {
        $(this).addClass("hover");
      },
      function() {
        $(this).removeClass("hover");
      });

    });
    </script>
    
    <div class="header-wrap">
        <header class="public-head-layout wrapper">
            <h1 class="site-logo"><a href="index.php"><img class="pngFix" src="<?php echo $this->_var['site_logo']; ?>"></a></h1>
            <?php if (! $this->_var['is_view']): ?>
            <div class="head-search-bar">
                <form class="search-form" method="get" action="<?php echo url('app=search'); ?>">
                    <input type="hidden" value="search" id="search_act" name="app">
                    <input type="text" lang="zh-CN" x-webkit-grammar="builtin:search" placeholder="请输入您要搜索的商品关键字" onwebkitspeechchange="foo()" x-webkit-speech="" maxlength="60" value="" class="input-text" id="keyword" name="keyword">
                    <input type="submit" class="input-submit" value="搜索" id="button">
                </form>
                <div class="keywords">热门搜索:<ul>
                    <?php $_from = $this->_var['hot_keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'keyword');if (count($_from)):
    foreach ($_from AS $this->_var['keyword']):
?>
                    <li><a href="<?php echo url('app=search&keyword=' . $this->_var['keyword']. ''); ?>"><?php echo $this->_var['keyword']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
            <div class="head-user-menu">
                <dl class="my-mall">
                    <dt><span class="ico"></span>我的商城<i class="arrow"></i></dt>
                    <dd>
                       <div class="sub-title">
                          <h4><?php if ($this->_var['visitor']['user_id']): ?><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?><?php endif; ?></h4>
                          <a href="<?php echo url('app=member'); ?>" class="arrow">我的用户中心<i></i></a></div>
                        <div class="user-centent-menu">
                            <ul>
                                <li><a href="<?php echo url('app=message&act=newpm'); ?>">站内消息</a></li>
                                <li><a href="<?php echo url('app=buyer_order'); ?>" class="arrow">我的订单<i></i></a></li>
                                <li><a href="<?php echo url('app=my_question'); ?>">咨询回复</a></li>
                                <li><a href="<?php echo url('app=my_favorite'); ?>" class="arrow">我的收藏<i></i></a></li>
<!--                                    <li><a class="arrow" href="http://fesh.chinammt.com/shop/index.php?act=member_points">我的积分<i></i></a></li>-->
                            </ul>
                        </div>
                        <!--<div class="browse-history">
                          <div class="part-title">
                            <h4>最近浏览的商品</h4>
                          </div
                          <ul>
                            <li class="no-goods"><img class="loading" src="http://fesh.chinammt.com/shop/templates/default/images/loading.gif" /></li>
                          </ul>
                        </div>>-->
                    </dd>
                </dl>
                <!--- <dl class="my-cart">



                    <dt><span class="my_xb"></span><a href="http://fesh.chinammt.com/shop/index.php?act=member_snsindex&op=index"></a><i class="arrow"></i></dt>

                    </dd>
                  </dl>-->
                <dl>
                <dl class="my-cart">
                    <dt><span class="ico"></span>购物车结算<i class="arrow"></i></dt>
                    <dd>
                        <div class="sub-title">
                            <h4>最新加入的商品</h4>
                        </div>
                        <div class="incart-goods-box">
                            <div class="incart-goods"><div class="no-order"><span>您的购物车中暂无商品，赶快选择心爱的商品吧！</span></div></div>
                        </div>
                        <div class="checkout"> <span class="total-price"></span><a class="btn-cart" href="<?php echo url('app=cart'); ?>">结算购物车中的商品</a> </div>
                    </dd>
                    <?php if ($this->_var['cart_goods_kinds'] > 0): ?>
                    <div class="addcart-goods-num"><?php echo $this->_var['cart_goods_kinds']; ?></div>
                    <?php endif; ?>
                </dl>
                </dl>
            </div>
            <?php endif; ?>
        </header>
    </div>
    <?php echo $this->fetch('nav.html'); ?>
    
    <div class="nch-breadcrumb-layout">
        <div class="nch-breadcrumb wrapper"><i class="icon-home"></i>
            <?php $_from = $this->_var['_curlocal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'lnk');if (count($_from)):
    foreach ($_from AS $this->_var['lnk']):
?>
            <?php if ($this->_var['lnk']['url']): ?>
            <span><a href="<?php echo $this->_var['lnk']['url']; ?>"><?php echo htmlspecialchars($this->_var['lnk']['text']); ?></a></span><span class="arrow">&#8250;</span>
            <?php else: ?>
            <span><?php echo htmlspecialchars($this->_var['lnk']['text']); ?></span>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
  </div>