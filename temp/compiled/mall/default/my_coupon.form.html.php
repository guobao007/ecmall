<script type="text/javascript">
$(function(){
    $('#coupon_form').validate({
        errorLabelContainer: $('#warning'),
        invalidHandler: function(form, validator) {
               $('#warning').show();
        },
        onfocusout : false,
        onkeyup    : false,
        rules : {
            coupon_sn : {
                required   : true
            }
        },
        messages : {
            coupon_sn  : {
                required   : '优惠券号码不能为空'
            }
        }
    });
});
</script>
<ul class="tab">
    <li class="active">优惠券登记</li>
</ul>
<div class="eject_con">
 <div class="adds">
        <div id="warning"></div>
        <form id="coupon_form" method="post" target="my_coupon" action="index.php?app=my_coupon&act=bind">
        <ul>
            <li>
                <h3>优惠券号码:</h3>
                <p><input class="text width14" type="text width_normal" name="coupon_sn" /></p>
            </li>      
        </ul>
        <div class="submit"><input type="submit" class="btn" value="提交" /></div>
        </form>
    </div>
</div>