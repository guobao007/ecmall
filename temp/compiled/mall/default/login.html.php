<?php echo $this->fetch('header.html'); ?>

<script type="text/javascript">
$(function(){
    $('#login_form').validate({
        errorPlacement: function(error, element){
            $(element).parent('td').append(error); 
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup : false,
        rules : {
            user_name : {
                required : true
            },
            password : {
                required : true
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
            user_name : {
                required : '您必须提供一个用户名'
            },
            password  : {
                required : '您必须提供一个密码'
            },
            captcha : {
                required : '请输入右侧图片中的文字',
                remote   : '验证码错误'
            }
        }
    });
});
</script>

<div class="content">
    <div class="module_common">
        <h2><b class="login" title="LOGIN用户登录"></b></h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="login_con">
                    <div class="login_left">
                        <form method="post" id="login_form">
                        <table>
                            <tr>
                                <td>用户名: </td>
                                <td><input type="text" name="user_name" class="text width5" /></td>
                            </tr>
                            <tr>
                                <td>密&nbsp;&nbsp;&nbsp;码: </td>
                                <td><input type="password" name="password" class="text width5" /></td>
                            </tr>
                            <?php if ($this->_var['captcha']): ?>
                            <tr>
                                <td>验证码:</td>
                                <td>
                                    <input type="text" name="captcha" class="text" id="captcha1" />
                                    <span><a href="javascript:change_captcha($('#captcha'));" class="renewedly"><img id="captcha" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a></span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr class="distance">
                                <td></td>
                                <td>
                                  <input type="submit" name="Submit" value="" class="enter" />                                  
                                  <a href="<?php echo url('app=find_password'); ?>" class="clew">忘记密码？</a>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="ret_url" value="<?php echo $this->_var['ret_url']; ?>" />
                        </form>
                    </div>

                    <div class="login_right">
                        <h4>友情提示:<br />如果您还不是会员，请注册</h4>
                        <p>注册之后你就可以</p>
                        <ol>
                            <li><strong>1.</strong> 保存您的个人资料</li>
                            <li><strong>2.</strong> 收藏您关注的商品</li>
                           <!-- <li><strong>3.</strong> 享受会员积分制度</li>-->
                            <li><strong>3.</strong> 订阅本店商品信息</li>
                        </ol>
                        <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>" class="login_btn" title="立即注册"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->fetch('footer.html'); ?>