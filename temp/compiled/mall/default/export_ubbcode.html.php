<script type="text/javascript">
$(function(){
    $('#copyubb').click(function(){
        if(copyToClipboard("<?php echo $this->_var['alert_code']; ?>") == false){
            alert(lang.get('copy_fail'));
        }else
        {
            $('#ubbcode').select();
            alert(lang.get('copy_ok'));
        }
    });
    $('#ubbcode').click(function(){
        this.select();
    });
});
</script>
<ul class="tab">
    <li class="active">导出UBB</li>
</ul>
<div class="eject_con">
<div class="add" style="width: 320px;">
    <div id="warning"></div>
    <ul>
        <li style="width: 320px;">
            <p>
            <textarea class="text" style="width: 300px; height: 160px; " id="ubbcode" name="ubbcode"><?php echo htmlspecialchars($this->_var['code']); ?></textarea></p>
        </li>
    </ul>
    <div class="submit"><input id="copyubb" type="submit" class="btn" value="复制" /></div>
</div>
</div>
