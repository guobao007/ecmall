<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<title>您需要登录后才能使用本功能- Powered by ECMall</title>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<link href="templates/style/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
if (self != top)
{
    /* 在框架内，则跳出框架 */
    top.location = self.location;
}
$(function(){
    $('#user_name').focus();
});
</script>
</head>
<body>
<div id="enter">
    <h1><img alt="商城后台" src="templates/style/images/enter_logo.gif" /></h1>
    <table>
    <form method="post">
        <tr>
            <td>用户名:</td>
            <td colspan="3"><input class="text" type="text" id="user_name" name="user_name" /></td>
        </tr>
        <tr>
            <td>密&nbsp;&nbsp;&nbsp;码:</td>
            <td class="width160"><input class="text" type="password" name="password" /></td>
            <?php if ($this->_var['captcha']): ?>
            <td>验证码:</td>
            <td><input class="text2" type="text" name="captcha" /> <div class="validates"><img onclick="this.src='index.php?app=captcha&' + Math.round(Math.random()*10000)" style="cursor:pointer;" class="validate" src="index.php?app=captcha&<?php echo $this->_var['random_number']; ?>" /></div></td>
            <?php else: ?>
            <td colspan="2">&nbsp;</td>
            <?php endif; ?>
        </tr>
        <tr>
            <th  colspan="4">
            <input class="btnEnter" type="submit" name="" value="" />
            <input class="btnBack" type="button" name="" value="" onclick="go('<?php echo $this->_var['site_url']; ?>')"/>
            <input class="btnBorget" type="button" name="" value="" onclick="go('<?php echo $this->_var['site_url']; ?>/index.php?app=find_password')"/>
            <p>&copy; 2003-2012 ShopEx inc. Powered by ECMall</p>
            </th>
        </tr>
    </form>
    </table>
</div>

</body>
</html>
