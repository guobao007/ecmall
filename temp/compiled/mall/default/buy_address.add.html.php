<div class="ncc-form-default">
  <form method="POST" id="addr_form" action="index.php">
    <input type="hidden" value="buy" name="app">
    <input type="hidden" value="add_addr" name="act">
    <dl>
      <dt><i class="required">*</i>收货人姓名：</dt>
      <dd>
        <input type="text" class="text w100" name="consignee" maxlength="20" id="consignee" value=""/>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>*所在地区：</dt>
      <dd>
        <div id="region">
            <select class="w110">
                <option value="0">请选择...</option>
                <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
            </select>
            <input type="hidden" class="mls_id" name="region_id" id="region_id"/>
            <input type="hidden" name="region_name" class="mls_names" id="region_name"/>
        </div>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>*详细地址：</dt>
      <dd>
        <input type="text" class="text w500" name="address" id="address" maxlength="80" value=""/>
        <p class="hint">请填写真实地址，不需要重复填写所在地区</p>
      </dd>
    </dl>
    <dl>
      <dt> <i class="required">*</i>手机号码：</dt>
      <dd>
        <input type="text" class="text w200" name="phone_mob" id="phone_mob" maxlength="15" value=""/>
        &nbsp;&nbsp;(或)&nbsp;固定电话： 
        <input type="text" class="text w200" id="phone_tel" name="phone_tel" maxlength="20" value=""/>
      </dd>
    </dl>
  </form>
</div>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.validate.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
    regionInit("region");
    $('#addr_form').validate({
        rules : {
            consignee : {
                required : true
            },
            region_id : {
                required : true,
                min   : 1
            },
            address : {
                required : true
            },
            phone_mob : {
                required : checkPhone,
                minlength : 11,
                maxlength : 11,
                digits : true
            },
            phone_tel : {
                required : checkPhone,
                minlength : 6,
                maxlength : 20
            }
        },
        messages : {
            consignee : {
                required : '<i class="icon-exclamation-sign"></i>请填写收货人姓名'
            },
            region_id : {
                required : '<i class="icon-exclamation-sign"></i>请选择所在地区',
                min  : '<i class="icon-exclamation-sign"></i>请选择所在地区'
            },
            address : {
                required : '<i class="icon-exclamation-sign"></i>请填写收货人详细地址'
            },
            phone_mob : {
                required : '<i class="icon-exclamation-sign"></i>手机号码或固定电话请至少填写一个',
                minlength: '<i class="icon-exclamation-sign"></i>手机号码只能是11位',
                maxlength: '<i class="icon-exclamation-sign"></i>手机号码只能是11位',
                digits : '<i class="icon-exclamation-sign"></i>手机号码只能是11位'
            },
            phone_tel : {
                required : '<i class="icon-exclamation-sign"></i>手机号码或固定电话请至少填写一个',
                minlength: '<i class="icon-exclamation-sign"></i>电话号码由数字、加号、减号、空格、括号组成,并不能少于6位.',
                maxlength: '<i class="icon-exclamation-sign"></i>电话号码由数字、加号、减号、空格、括号组成,并不能少于6位.'
            }
        },
        groups : {
            phone:'phone_mob phone_tel'
        }
    });
});
function checkPhone(){
    return ($('input[name="phone_mob"]').val() == '' && $('input[name="phone_tel"]').val() == '');
}
function submitAddAddr(){
    if ($('#addr_form').valid()){
        var datas=$('#addr_form').serialize();
        $.post('index.php',datas,function(data){
            if (data.done){
                var consignee = $.trim($("#consignee").val());
                var phone_tel = $.trim($("#phone_tel").val());
                var phone_mob = $.trim($("#phone_mob").val());
                var region_name = $.trim($("#region_name").val());
                var region_id = $.trim($("#region_id").val());
                var address = $.trim($("#address").val());
    //            	showShippingPrice($('#city_id').val(),$('#area_id').val());
                calcOrder();
                hideAddrList(data.retval.addr_id,consignee,region_name+'&nbsp;&nbsp;'+address,(phone_mob != '' ? phone_mob : phone_tel));
            }else{
                alert(data.msg);
            }
        },'json');
    }else{
        return false;
    }
}
</script>