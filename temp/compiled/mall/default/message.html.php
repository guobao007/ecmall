<!DOCTYPE html>
<html lang="zh">
    <head>
        <base href="<?php echo $this->_var['site_url']; ?>/" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo $this->_var['page_seo']; ?>
        <link href="<?php echo $this->res_base . "/" . 'css/ecmall.css'; ?>" rel="stylesheet" type="text/css" />
        <link type="text/css" href="<?php echo $this->res_base . "/" . 'css/base.css'; ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo $this->res_base . "/" . 'css/home_header.css'; ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo $this->res_base . "/" . 'css/head.css'; ?>" rel="stylesheet" />
        <link href="<?php echo $this->res_base . "/" . 'font/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/common.js'; ?>" charset="utf-8"></script>
        <script type="text/javascript">
        //<!CDATA[
        var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
        var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
        var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
        //]]>
        </script>
        <style type="text/css">
        body  {background-color: #FAFAFA;}
        .header-wrap{background-color: #FFF;}
        .wrapper {width: 1000px;}
        #faq {display: none;}
        .msg {font: 100 36px/48px arial,"microsoft yahei"; color: #555; background-color: #FFF; text-align: center; width: 100%; border: solid 1px #E6E6E6; margin-bottom: 10px; padding: 120px 0;}
        .msg i {font-size: 48px; vertical-align: middle; margin-right: 10px;}
        </style>
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
                                    <input type="text" name="user_name" autocomplete="off" class="input1 wid100"> 
                                    密码 
                                    <input type="password" autocomplete="off" name="password" class="input1 wid100"> 
                                    <input type="submit" value="登录" id="submit" name="submit" class="but1">
                                    <a href="<?php echo url('app=find_password'); ?>">忘记密码？</a><a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册新用户&gt;&gt;</a>
                                </div> 
                            </form> 
                        </div>
                    <?php else: ?>
                        <div style="float:left;padding-top:10px;width:650px;">
                        <span>您好<a href=""><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></a></span>
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
            </header>
        </div>
        <div class="msg">
            <?php if ($this->_var['icon'] == "notice"): ?>
            <i class="icon-ok-sign" style=" color:  #093684;"></i>
            <?php else: ?>
            <i class="icon-info-sign" style="color:  #093684;"></i>
            <?php endif; ?>
            <?php echo $this->_var['message']; ?>
        </div>
        <script type="text/javascript">
        //<!CDATA[
        <?php if ($this->_var['redirect']): ?>
        window.setTimeout("<?php echo $this->_var['redirect']; ?>", 2000);
        <?php else: ?>
        window.setTimeout("javascript:history.back()", 2000);
        <?php endif; ?>
        //]]>
        </script>
        <?php echo $this->fetch('footer.html'); ?>