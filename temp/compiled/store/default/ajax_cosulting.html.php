<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.validate.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.charCount.js'; ?>" charset="utf-8"></script>
<?php if ($this->_var['qa_info']): ?>
<?php $_from = $this->_var['qa_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'qainfo');if (count($_from)):
    foreach ($_from AS $this->_var['qainfo']):
?>
<div class="ncs-cosult-list">
    <dl class="asker">
        <dt>咨询网友：</dt>
        <dd>
            <?php if ($this->_var['qainfo']['user_name']): ?><?php echo $this->_var['qainfo']['user_name']; ?><?php else: ?>游客<?php endif; ?>
            <time datetime="<?php echo local_date("Y-m-d H:i:s",$this->_var['qainfo']['time_post']); ?>" pubdate="pubdate" class="ml20"><?php echo local_date("Y-m-d H:i:s",$this->_var['qainfo']['time_post']); ?></time>
        </dd>
    </dl>
    <dl class="ask-con">
        <dt>咨询内容：</dt>
        <dd><p><?php echo nl2br(htmlspecialchars($this->_var['qainfo']['question_content'])); ?></p></dd>
    </dl>
    <?php if ($this->_var['qainfo']['reply_content']): ?>
    <dl class="reply">
      <dt>商家回复：</dt>
      <dd>
        <p><?php echo nl2br(htmlspecialchars($this->_var['qainfo']['reply_content'])); ?></p>
        <time datetime="<?php echo local_date("Y-m-d H:i:s",$this->_var['qainfo']['time_reply']); ?>" pubdate="pubdate">[<?php echo local_date("Y-m-d H:i:s",$this->_var['qainfo']['time_reply']); ?>]</time>
      </dd>
    </dl>
    <?php endif; ?>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div class="tr pr5 pb5"><div class="pagination"> <?php echo $this->fetch('page.bottom.html'); ?> </div></div>
<?php else: ?>
<div class="ncs-norecord">暂无符合条件的数据记录</div>
<?php endif; ?>
<?php if (! $this->_var['consult_able']): ?>
<form method="post" id="message" action="index.php?app=<?php echo $_GET['app']; ?><?php if ($_GET['act']): ?>&amp;act=<?php echo $_GET['act']; ?><?php elseif ($_GET['app'] == 'goods'): ?>&amp;act=qa<?php endif; ?>&amp;id=<?php echo $_GET['id']; ?>">
    <div class="ncs-consult-form">
        <div class="asker-info">
            <?php if ($_SESSION['user_info']['user_id']): ?>
            <label><strong>用户名：</strong><?php echo $_SESSION['user_info']['user_name']; ?>
            <input type="hidden" name="email" id="gbTextfield" value="<?php echo $this->_var['email']; ?>" /></label>
            <label for="gbCheckbox">
                <input type="checkbox" class="checkbox" name="hide_name" value="hide" id="gbCheckbox">匿名发布
            </label>
            <?php else: ?>
            <label for="gbTextfield"><strong>电子邮箱：</strong>
                <input type="text" name="email" id="gbTextfield" class="text w300" placeholder="非会员可输入邮件进行咨询，以便客服人员给您回执。" value="" />
                <span></span>
            </label>
            <?php endif; ?>
            <?php if ($this->_var['captcha']): ?>
            <label for="captcha"><strong>验证码：</strong>
                <input name="captcha" id="captcha" class="text w60" type="text" size="4" autocomplete="off" maxlength="4"/>
            <span></span>
            <a href="javascript:change_captcha($('#codeimage'));"><img id="codeimage" class="codeimage" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a><span>看不清验证码？点击图片换一张。</span></label>
            </label>
            <?php endif; ?>
        </div>
        <div class="ask-content"> <strong>咨询内容：</strong>
            <textarea name="content" id="textfield3" class="textarea w700 h60"></textarea><span></span>
        </div>
        <div class="bottom">
            <a href="JavaScript:void(0);" nc_type="consult_submit" title="发布咨询" class="ncs-btn ncs-btn-red">发布咨询</a>
            <span id="consultcharcount"></span>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(function(){
            $('a[nc_type="consult_submit"]').click(function(){
                if($("#message").valid()){
                    $.post('index.php?app=goods&act=ajax_cosulting&id=<?php echo $_GET['id']; ?>',{
                        'id':'<?php echo $_GET['id']; ?>',
                        'email':$("#gbTextfield").val()
                        <?php if ($_SESSION['user_info']['user_id']): ?>
                        ,'hide_name':$("#message input:checked").val()
                        <?php endif; ?>
                        <?php if ($this->_var['captcha']): ?>
                        ,'captcha':$("#captcha").val()
                        <?php endif; ?>
                        ,'content':$("#textfield3").val()
                        }, function(data){
                            var data=eval("("+data+")");
                            if(data.done == 'true'){
                                $("#cosulting_demo").load('index.php?app=goods&act=ajax_cosulting&id=<?php echo $_GET['id']; ?>');
                            }else{
                                change_captcha($('#captcha'));
                                alert(data.msg);
                            }
                    });
                }else{
                    change_captcha($('#captcha'));
                }
            });
        
        $('#message').validate({
            errorPlacement: function(error, element){
                var error_td = element.next('span');
                error_td.next('.field_notice').hide();
                error_td.append(error);
	    },
            rules : {
	    	content : {
	            required : true,
	            maxlength : 120
	        },
	        email : {
	            email : true          
	        }
                <?php if ($this->_var['captcha']): ?>
                    ,captcha: {
                        required : true,
                        minlength : 4,
                        remote   : {
                            url : 'index.php?app=captcha&act=check_captcha',
                            type:'get',
                            data:{
                                captcha : function(){
                                    return $('#captcha').val();
                                }
                            }
                        }
                    }
                <?php endif; ?>
	    },
            messages : {
	    	content : {
	            required : '咨询内容不能为空',
	            maxlength: '咨询内容不能超过120个字符'
	        },
	        email : {
	            email : '邮箱地址不正确'
	        }
	        <?php if ($this->_var['captcha']): ?>
                ,captcha: {
                    required : '请填写验证码',
                    minlength : '验证码错误',
                    remote   : '验证码错误'
                }
	        <?php endif; ?>
	    }
        });
        
        // textarea 字符个数动态计算
	$("#textfield3").charCount({
		allowed: 120,
		warning: 10,
		counterContainerID:'consultcharcount',
		firstCounterText:'还可以输入',
		endCounterText:'字',
		errorCounterText:'已经超出'
	});
    });
</script>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#cosulting_demo').find('.demo').ajaxContent({
        event:'click', //mouseover
        target:'#cosulting_demo'
    });
});
</script>