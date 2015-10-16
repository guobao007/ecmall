<?php echo $this->fetch('member.header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#email_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        rules : {
            orig_password : {
                required : true
            },
           email : {
                required   : true,
                email      : true
            }
        },
        messages : {
            orig_password : {
                required : '原始密码不能为空'
            },
            email : {
                required   : '您必须提供您的电子邮箱',
                email    : '这不是一个有效的电子邮箱'
            }
        }
    });
});
</script>
<style>
.borline td {padding:10px 0px;}
.ware_list th {text-align:left;}
.bgwhite {background: #FFFFFF;}
</style>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="eject_con bgwhite">
            <div class="add">
                <form method="post" id="email_form">
                    <ul>
                        <li><h3>您的密码:</h3>
                        <p><input class="text width_normal" type="password" name="orig_password" /></p>
                        </li>
                        <li><h3>电子邮箱:</h3>
                        <p><input class="text width_normal" type="text" name="email" /></p>
                        </li>
                    </ul>
                    <div class="submit">
                                    <input class="btn" type="submit" value="提交" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
