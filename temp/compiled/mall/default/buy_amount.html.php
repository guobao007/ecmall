<div class="ncc-bottom">
    <a href="javascript:void(0)" id='submitOrder' class="ncc-btn ncc-btn-acidblue fr">提交订单</a>
</div>
<script>
function submitNext(){
    if ($('#address_id').val() == ''){
        alert('请先设置收货地址');
        return;
    }
//    if ($('#buy_city_id').val() == '') {
//        showDialog('正在计算运费,请稍后', 'error','','','','','','','','',2);
//        return;
//    }
//    if ($('input[name="pd_pay"]').attr('checked') && $('#password_callback').val() != '1') {
//        showDialog('使用预存款支付，需输入登录密码并使用  ', 'error','','','','','','','','',2);
//        return;
//    }
    $('#order_form').submit();
}
$(function(){
	$('#submitOrder').on('click',function(){submitNext()});
	calcOrder();
});
</script>