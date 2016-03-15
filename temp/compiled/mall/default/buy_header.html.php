<!DOCTYPE html>
<html lang="zh">
    <head>
        <base href="<?php echo $this->_var['site_url']; ?>/" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo $this->_var['page_seo']; ?>
        <link type="text/css" href="<?php echo $this->res_base . "/" . 'css/base.css'; ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo $this->res_base . "/" . 'css/home_login.css'; ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo $this->res_base . "/" . 'css/home_cart.css'; ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo $this->res_base . "/" . 'css/head.css'; ?>" rel="stylesheet" />
        <link href="<?php echo $this->res_base . "/" . 'font/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" />
        
        <!--[if lt IE 9]>
              <script src="<?php echo $this->res_base . "/" . 'js/html5shiv.js'; ?>"></script>
        <![endif]-->
        <script type="text/javascript" src="index.php?act=jslang"></script>
        <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/common.js'; ?>" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery.masonry.js'; ?>" charset="utf-8"></script>
        <script type="text/javascript">
        //<!CDATA[
        var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
        var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
        var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
        //]]>
        </script>
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
        <header class="ncc-head-layout">
            <div class="site-logo">
                <a href="index.php">
                    <img src="<?php echo $this->_var['site_logo']; ?>" class="pngFix">
                </a>
            </div>
            <ul class="ncc-flow">
                <li class="<?php if ($this->_var['buy_step'] == 'step1'): ?>current<?php endif; ?>"><i class="step1"></i>
                    <p>我的购物车</p>
                    <sub></sub>
                    <div class="hr"></div>
                </li>
                <li class="<?php if ($this->_var['buy_step'] == 'step2'): ?>current<?php endif; ?>"><i class="step2"></i>
                    <p>填写核对购物信息</p>
                    <sub></sub>
                    <div class="hr"></div>
                </li>
                <li class="<?php if ($this->_var['buy_step'] == 'step3'): ?>current<?php endif; ?>"><i class="step3"></i>
                    <p>支付提交</p>
                    <sub></sub>
                    <div class="hr"></div>
                </li>
                <li class="<?php if ($this->_var['buy_step'] == 'step4'): ?>current<?php endif; ?>"><i class="step4"></i>
                    <p>订单完成</p>
                    <sub></sub>
                    <div class="hr"></div>
                </li>
            </ul>
        </header>