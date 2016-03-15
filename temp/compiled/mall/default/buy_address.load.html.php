<ul>
    <?php $_from = $this->_var['address_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'address');$this->_foreach['address_key'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['address_key']['total'] > 0):
    foreach ($_from AS $this->_var['address']):
        $this->_foreach['address_key']['iteration']++;
?>
    <li class="receive_add address_item <?php if (($this->_foreach['address_key']['iteration'] - 1) == 0): ?>ncc-selected-item<?php endif; ?>">
        <input address="<?php echo $this->_var['address']['region_name']; ?>&nbsp;<?php echo $this->_var['address']['address']; ?>" consignee="<?php echo $this->_var['address']['consignee']; ?>" id="addr_<?php echo $this->_var['address']['addr_id']; ?>" nc_type="addr" type="radio" class="radio" region_id="<?php echo $this->_var['address']['region_id']; ?>" name="addr" value="<?php echo $this->_var['address']['addr_id']; ?>" phone="<?php if ($this->_var['address']['phone_tel']): ?><?php echo $this->_var['address']['phone_tel']; ?><?php else: ?><?php echo $this->_var['address']['phone_mob']; ?><?php endif; ?>" <?php if (($this->_foreach['address_key']['iteration'] <= 1)): ?>checked<?php endif; ?>/>
        <label for="addr_<?php echo $this->_var['address']['addr_id']; ?>"><span class="true-name"><?php echo $this->_var['address']['consignee']; ?></span><span class="address"><?php echo $this->_var['address']['region_name']; ?>&nbsp;<?php echo $this->_var['address']['address']; ?></span><span class="phone"><i class="icon-mobile-phone"></i><?php if ($this->_var['address']['phone_tel']): ?><?php echo $this->_var['address']['phone_tel']; ?><?php else: ?><?php echo $this->_var['address']['phone_mob']; ?><?php endif; ?></span></label>
        <a href="javascript:void(0);" onclick="delAddr(<?php echo $this->_var['address']['addr_id']; ?>);" class="del">[ 删除 ]</a> </li>
    </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <li class="receive_add addr_item">
        <input value="0" nc_type="addr" id="add_addr" type="radio" name="addr">
        <label for="add_addr">使用新地址</label>
    </li>
    <div id="add_addr_box"></div>
</ul>
<div class="hr16"> <a id="hide_addr_list" class="ncc-btn ncc-btn-red" href="javascript:void(0);">保存收
货人信息</a></div>
<script type="text/javascript">
function delAddr(id){
    $('#addr_list').load(SITE_URL+'/index.php?app=buy&act=load_addr&id='+id);
}
$(function(){
    function addAddr() {
        $('#add_addr_box').load(SITE_URL+'/index.php?app=buy&act=add_addr');
    }
    $('input[nc_type="addr"]').on('click',function(){
        if ($(this).val() == '0') {
            $('.address_item').removeClass('ncc-selected-item');
            $('#add_addr_box').load(SITE_URL+'/index.php?app=buy&act=add_addr');
        } else {
            $('.address_item').removeClass('ncc-selected-item');
            $(this).parent().addClass('ncc-selected-item');
            $('#add_addr_box').html('');
        }
    });
    $('#hide_addr_list').on('click',function(){
        if ($('input[nc_type="addr"]:checked').val() == '0'){
            submitAddAddr();
        } else {
//            var region_name = $('input[name="addr"]:checked').attr('region_name');
            var region_id = $('input[name="addr"]:checked').attr('region_id');
            var addr_id = $('input[name="addr"]:checked').val();
            var consignee = $('input[name="addr"]:checked').attr('consignee');
            var address = $('input[name="addr"]:checked').attr('address');
            var phone = $('input[name="addr"]:checked').attr('phone');
//            showShippingPrice(city_id,area_id);
            calcOrder();
            hideAddrList(addr_id,consignee,address,phone);
        }
    });
    if ($('input[nc_type="addr"]').size() == 1){
        $('#add_addr').attr('checked',true);
        addAddr();
    }
});
</script>