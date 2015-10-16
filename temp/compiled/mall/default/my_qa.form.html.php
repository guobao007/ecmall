<script type="text/javascript">
$(function(){
     $('#message').validate({
        errorLabelContainer: $('#warning'),
        invalidHandler: function(form, validator) {
           var errors = validator.numberOfInvalids();
           if(errors)
           {
               $('#warning').show();
           }
           else
           {
               $('#warning').hide();
           }
        },
        rules : {
                     content : {
                         required : true,
                         byteRange : [0,255,'<?php echo $this->_var['charset']; ?>']
                     }
                  },
        messages : {
                     content : {
                         required : '回复内容不能为空',
                         byteRange: '回复字数不得超过255字符'
                        }
                     }
         })
})
</script>
<style type="text/css">
.height26 {line-height:26px;}
.eject_con .add_float {width:340px;}
</style>
<ul class="tab">
    <li class="active">回复咨询</li>
</ul>
<div class="eject_con">
    <div class="add_float">
        <form id="message" target="pop_warning" method="post" action="index.php?app=my_qa&act=<?php echo $_GET['act']; ?>&ques_id=<?php echo $this->_var['ques_id']; ?>">
        <div id="warning"></div>
        <ul>
            <li>
                <h3>咨询内容:</h3>
                 <p><label class="height26"><?php echo nl2br(htmlspecialchars($this->_var['my_qa_data']['question_content'])); ?></label></p>
            </li>
            <li>
                <h3>回复咨询:</h3>
                <input type="hidden" id="act" name="act" value="<?php echo $_GET['act']; ?>" />
                <input type="hidden" id="ques_id" name="ques_id" value="<?php echo $_GET['ques_id']; ?>"/>
                <p><textarea class="text width11" name="content"><?php echo $this->_var['my_qa_data']['reply_content']; ?></textarea><br /></p>
            </li>
        </ul>
        <div class="submit"><input type="submit" class="btn" value="确认" /></div>
        </form>
    </div>
</div>