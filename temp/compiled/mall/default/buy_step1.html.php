<?php echo $this->fetch('buy_header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'mlselection.js'; ?>" charset="utf-8"></script>
<div class="ncc-wrapper">
    <div class="ncc-main">
        <div class="ncc-title">
            <h3>填写核对购物信息</h3>
            <h5>请仔细核对填写收货、发票等信息，以确保物流快递及时准确投递。</h5>
        </div>
        <?php echo $this->fetch('buy_address.html'); ?>
        <form method="post" id="order_form" name="order_form" action="index.php">
            <?php echo $this->fetch('buy_goods_list.html'); ?>
            <?php echo $this->fetch('buy_amount.html'); ?>
            <input value="buy" type="hidden" name="app">
            <input value="buy_step2" type="hidden" name="act">
            
            <input value="<?php echo $this->_var['ifcart']; ?>" type="hidden" name="ifcart">
            
            <input value="<?php echo $this->_var['address_info']['addr_id']; ?>" name="address_id" id="address_id" type="hidden">
            
        </form>
    </div>
</div>
<script type="text/javascript">
    //计算部运费和每个店铺小计
    function calcOrder() {
        var allTotal = 0;
        $('em[nc_type="eachStoreTotal"]').each(function(){
            store_id = $(this).attr('store_id');
            var eachTotal = 0;
            if ($('#eachStoreFreight_'+store_id).length > 0) {
                    eachTotal += parseFloat($('#eachStoreFreight_'+store_id).html());
                }
            if ($('#eachStoreGoodsTotal_'+store_id).length > 0) {
                    eachTotal += parseFloat($('#eachStoreGoodsTotal_'+store_id).html());
                }
            if ($('#eachStoreManSong_'+store_id).length > 0) {
                    eachTotal += parseFloat($('#eachStoreManSong_'+store_id).html());
                }
            if ($('#eachStoreVoucher_'+store_id).length > 0) {
                    eachTotal += parseFloat($('#eachStoreVoucher_'+store_id).html());
            }
            $(this).html(number_format(eachTotal,2));
            allTotal += eachTotal;
        });
        $('#orderTotal').html(number_format(allTotal,2));
    }
    $(function(){
        $.ajaxSetup({
            async : false
        });
        //优惠券
        $('select[nctype="voucher"]').on('change',function(){
            if ($(this).val() == '') {
                    $('#eachStoreVoucher_'+items[1]).html('-0.00');
            } else {
                var items = $(this).val().split('|');
                $('#eachStoreVoucher_'+items[1]).html('-'+number_format(items[2],2));
            }
            calcOrder();
        });
        //运费初始化
        $('select[nctype="shipping"]').each(function(){
            var items = $(this).val().split('|');
            $('#eachStoreFreight_'+items[1]).html(number_format(items[2],2));
            calcOrder();
        });
        //运费更改
        $('select[nctype="shipping"]').on('change',function(){
            if ($(this).val() == '') {
                $('#eachStoreFreight_'+items[1]).html('0.00');
            } else {
                var items = $(this).val().split('|');
                $('#eachStoreFreight_'+items[1]).html(number_format(items[2],2));
            }
            calcOrder();
        });
    });
    function disableOtherEdit(showText){
        $('a[nc_type="buy_edit"]').each(function(){
            if ($(this).css('display') != 'none'){
                        $(this).after('<font color="#B0B0B0">' + showText + '</font>');
                    $(this).hide();		    
            }
        });
        disableSubmitOrder();
    }
    function ableOtherEdit() {
        $('a[nc_type="buy_edit"]').show().next('font').remove();
        ableSubmitOrder();

    }
    function ableSubmitOrder() {
        $('#submitOrder').on('click', function () {
            submitNext()
        }).css('cursor', '').addClass('ncc-btn-acidblue');
    }
    function disableSubmitOrder() {
        $('#submitOrder').unbind('click').css('cursor', 'not-allowed').removeClass('ncc-btn-acidblue');
    }
</script>
<?php echo $this->fetch('footer.html'); ?>