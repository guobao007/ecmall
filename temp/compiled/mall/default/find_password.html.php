<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#find_password_form').validate({
        errorPlacement: function(error, element){
          $(element).parent('td').append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        rules : {
            username : {
                required : true
            },
            email : {
                required : true,
                email : true
            },
            captcha : {
                required : true,
                remote   : {
                    url : 'index.php?app=captcha&act=check_captcha',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha1').val();
                        }
                    }
                }
            } 
        },
        messages : {
            username : {
                required : '用户名不能为空'
            },
            email  : {
                required : '电子邮箱不能为空',
                email : '电子邮箱填写错误'
            },
            captcha : {
                required : '验证码不能为空',
                remote   : '验证码错误'
            }
        }
    });
});
</script>     
<div class="content">
    <div class="module_common">
        <h2><b>请输入你的登录帐号和电子邮箱, 系统检查之后会发邮件到你的邮箱, 请按照邮件的提示操作</b></h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="login_con" style="background:#FFF;">
                    <div class="login_left">
                      <form action="" method="POST" id="find_password_form">
                           <table> 
                                <tr>
                                     <td>您的登录账号:</td><td><input type="text" class="text width5" name="username"/></td>
                                </tr>
                                <tr>
                                     <td>您的电子邮箱:</td><td><input type="text" class="text width5" name="email"/></td>
                                </tr>
                                <tr>
                                     <td>验证码:</td>
                                     <td><input type="text" class="text" name="captcha" id="captcha1"><span><a class="renewedly" href="javascript:change_captcha($('#captcha'));"><img id="captcha" src="index.php?app=captcha"></a></span></td>
                                </tr>
                                <tr class="distance">
                                     <td></td>
                                     <td><input type="submit" value="提交" name="Submit" class="btn" id="captcha1"></td>
                                </tr>
                           </table>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>