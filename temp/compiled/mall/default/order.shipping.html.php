                <h4 class="add_title"><b class="ico">收货人地址</b><p><a href="<?php echo url('app=my_address'); ?>" target="_blank">管理收货地址</a></p></h4>
                <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'mlselection.js'; ?>" charset="utf-8"></script>
                <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.validate.js'; ?>" charset="utf-8"></script>
                <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'dialog/dialog.js'; ?>" id="dialog_js" charset="utf-8"></script>
                <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.ui/jquery.ui.js'; ?>" id="dialog_js" charset="utf-8"></script>
                <script type="text/javascript">
                var shippings = <?php echo $this->_var['shippings']; ?>;
                var addresses = <?php echo $this->_var['addresses']; ?>;
                var goods_amount = <?php echo $this->_var['goods_info']['amount']; ?>;
                var goods_quantity = <?php echo $this->_var['goods_info']['quantity']; ?>;
                $(function(){
                    regionInit("region");
                    $('#order_form').validate({
                        invalidHandler:function(e, validator){
                         var err_count = validator.numberOfInvalids();
                         var msg_tpl = '很抱歉，您填写的订单信息中有&nbsp;<strong>{0}</strong>&nbsp;个错误(如红色斜体部分所示)，请检查并修正后再提交！:)';
                         var d = DialogManager.create('show_error');
                         d.setWidth(400);
                         d.setTitle(lang.error);
                         d.setContents('message', {type:'warning', text:$.format(msg_tpl, err_count)});
                         d.show('center');
                        },
                        errorPlacement: function(error, element){
                            var _message_box = $(element).parent().find('.field_message');
                            _message_box.find('.field_notice').hide();
                            _message_box.append(error);
                        },
                        success       : function(label){
                            label.addClass('validate_right').text('OK!');
                        },
                        rules : {
                            consignee : {
                                required : true
                            },
                            region_id : {
                                required : true,
                                min   : 1
                            },
                            address   : {
                                required : true
                            },
                            phone_tel : {
                                required : check_phone,
                                minlength:6,
                                checkTel : true
                            },
                            phone_mob : {
                                required : check_phone,
                                minlength:6,
                                digits : true
                            }
                        },
                        messages : {
                            consignee : {
                                required : '请如实填写您的收货人姓名'
                            },
                            region_id : {
                                required : '请选择所在地区',
                                min  : '请选择所在地区'
                            },
                            address   : {
                                required : '请如实填写收货人详细地址'
                            },
                            phone_tel : {
                                required : '固定电话和手机号码至少填一个',
                                minlength: '电话号码由数字、加号、减号、空格、括号组成,并不能少于6位',
                                checkTel : '电话号码由数字、加号、减号、空格、括号组成,并不能少于6位'
                            },
                            phone_mob : {
                                required : '固定电话和手机号码至少填一个',
                                minlength: '错误的手机号码,只能是数字,并且不能少于6位',
                                digits : '错误的手机号码,只能是数字,并且不能少于6位'
                            }
                        }
                    });

                    $('ul[shipping_id]').each(function(){
                        var _shipping_fee = get_shipping_fee($(this).attr('shipping_id'));
                        $(this).find('[ectype="shipping_fee"]').html(price_format(_shipping_fee));
                    }).click(function(){
                        $(this).find('input[name="shipping_id"]').attr('checked', true);
                        set_order_amount($(this).attr('shipping_id'));
                    });

                    //select first
                    $($('ul[shipping_id]')[0]).click();
                });
                function set_order_amount(shipping_id){
                    var _shipping_fee = get_shipping_fee(shipping_id);
                    var _amount  = goods_amount + _shipping_fee;
                    $('#order_amount').html(price_format(_amount));
                }
                function get_shipping_fee(shipping_id){
                    var shipping_data = shippings[shipping_id];
                    var first_price   = Number(shipping_data['first_price']);
                    var step_price   = Number(shipping_data['step_price']);
                    return first_price + (goods_quantity - 1) * step_price;
                }
                function check_phone(){
                    return ($('#phone_tel').val() == '' && $('#phone_mob').val() == '');
                }
                function hide_error(){
                    $('#region').find('.error').hide();
                }
                </script>
                <?php if ($this->_var['my_address']): ?>
                <script type="text/javascript">
                //<![CDATA[
                $(function(){
                    //$("input[name='address_options']").click(set_address);
                    $('.address_item').click(function(){
                        $(this).find("input[name='address_options']").attr('checked', true);
                        $('.address_item').removeClass('selected_address');
                        $(this).addClass('selected_address');
                        set_address();
                    });
                    //init
                    set_address();
                });
                function set_address(){
                    var addr_id = $("input[name='address_options']:checked").val();
                    if(addr_id == 0)
                    {
                        $('#consignee').val("");
                        $('#region_name').val("");
                        $('#region_id').val("");
                        $('#region select').show();
                        $("#edit_region_button").hide();
                        $('#region_name_span').hide();

                        $('#address').val("");
                        $('#zipcode').val("");
                        $('#phone_tel').val("");
                        $('#phone_mob').val("");

                        $('#address_form').show();
                    }
                    else
                    {
                        $('#address_form').hide();
                        fill_address_form(addr_id);
                    }
                }
                function fill_address_form(addr_id){
                    var addr_data = addresses[addr_id];
                    for(k in addr_data){
                        switch(k){
                            case 'consignee':
                            case 'address':
                            case 'zipcode':
                            case 'email':
                            case 'phone_tel':
                            case 'phone_mob':
                            case 'region_id':
                                $("input[name='" + k + "']").val(addr_data[k]);
                            break;
                            case 'region_name':
                                $("input[name='" + k + "']").val(addr_data[k]);
                                $('#region select').hide();
                                $('#region_name_span').text(addr_data[k]).show();
                                $("#edit_region_button").show();
                            break;
                        }
                    }
                }
                //]]>
                </script>
                <?php $_from = $this->_var['my_address']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'address');$this->_foreach['address_select'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['address_select']['total'] > 0):
    foreach ($_from AS $this->_var['address']):
        $this->_foreach['address_select']['iteration']++;
?>
                <ul class="receive_add address_item<?php if ($this->_foreach['address_select']['iteration'] == 1): ?> selected_address<?php endif; ?>">
                    <li class="radio"><input id="address_<?php echo $this->_var['address']['addr_id']; ?>" type="radio"<?php if ($this->_foreach['address_select']['iteration'] == 1): ?> checked="true"<?php endif; ?> name="address_options" value="<?php echo $this->_var['address']['addr_id']; ?>" /></li>
                    <li class="particular"><?php echo htmlspecialchars($this->_var['address']['region_name']); ?>&nbsp;&nbsp;<?php echo htmlspecialchars($this->_var['address']['address']); ?></li>
                    <li class="name">收货人姓名: <?php echo htmlspecialchars($this->_var['address']['consignee']); ?></li>
                    <li class="mobile"><?php if ($this->_var['address']['phone_mob']): ?><?php echo $this->_var['address']['phone_mob']; ?><?php else: ?><?php echo $this->_var['address']['phone_tel']; ?><?php endif; ?></li>
                </ul>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <ul class="new_receive_add address_item">
                    <li class="radio"><input type="radio" name="address_options" id="use_new_address" value="0" /</li>
                    <li class="particular">使用新的收货地址</li>
                </ul>
                <?php endif; ?>

                <ul class="fill_in_content" id="address_form">
                    <li>
                        <p class="title">收货人姓名</p>
                        <p class="fill_in"><input type="text" name="consignee" id="consignee" class="text1" /><span class="field_message explain"><span class="field_notice">请填写真实姓名</span></span></p>
                    </li>
                    <li>
                        <p class="title">所在地区</p>
                        <p class="fill_in">
                            <div id="region">
                                <span style="display:none;" id="region_name_span"></span>
                                <input id="edit_region_button" type="button" class="edit_region" value="编辑" style="display:none;" />
                                <select onchange="hide_error();">
                                    <option value="0">请选择...</option>
                                    <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                </select>
                                <input type="hidden" class="mls_id" name="region_id" id="region_id"/><input type="hidden" name="region_name" class="mls_names" id="region_name"/>
                                <b style="font-weight:normal;" class="field_message explain"><span class="field_notice">请选择地区</span></b>
                            </div>
                        </p>
                    </li>
                    <li>
                        <p class="title">详细地址</p>
                        <p class="fill_in"><input type="text" name="address" id="address" class="text1 width1" /><span class="field_message explain"><span class="field_notice">请填写真实地址，不需要重复填写所在地区</span></span></p>
                    </li>
                    <li>
                        <p class="title">邮政编码</p>
                        <p class="fill_in"><input type="text" name="zipcode" id="zipcode" class="text1" /><span class="field_message explain"><span class="field_notice">邮政编码</span></span></p>
                    </li>
                    <li>
                        <p class="title">电话号码</p>
                        <p class="fill_in"><input type="text" name="phone_tel" id="phone_tel" class="text1" /><span class="field_message explain"><span class="field_notice">固定电话和手机至少填一项</span></span></p>
                    </li>
                    <li>
                        <p class="title">手机号码</p>
                        <p class="fill_in"><input type="text" id="phone_mob" name="phone_mob" class="text1" /><span class="field_message explain"><span class="field_notice">手机和固定电话至少填一项</span></span></p>
                    </li>
                    <li>
                        <p class="title">&nbsp;</p>
                        <p class="fill_in">
                            <label>
                                <input type="checkbox" value="1" id="save_address" name="save_address">&nbsp;自动保存收货地址
                                <span class="explain">&nbsp;(&nbsp;选择后该地址将会保存到您的收货地址列表&nbsp;)&nbsp;</span>
                            </label>
                        </p>
                    </li>
                </ul>

                <h4 class="add_title"><b class="ico">选择配送方式</b></h4>
                <div class="fashion_list">
                    <?php $_from = $this->_var['shipping_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping_method');$this->_foreach['shipping_select'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping_select']['total'] > 0):
    foreach ($_from AS $this->_var['shipping_method']):
        $this->_foreach['shipping_select']['iteration']++;
?>
                    <ul class="receive_add" shipping_id="<?php echo $this->_var['shipping_method']['shipping_id']; ?>">
                        <li class="radio"><input type="radio" name="shipping_id" value="<?php echo $this->_var['shipping_method']['shipping_id']; ?>" /></li>
                        <li class="fashion"><?php echo htmlspecialchars($this->_var['shipping_method']['shipping_name']); ?></li>
                        <li class="pay">配送费用:&nbsp;<span class="money" ectype="shipping_fee">&yen; 0.00</span></li>
                        <li class="explain"><?php echo htmlspecialchars($this->_var['shipping_method']['shipping_desc']); ?></li>
                    </ul>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>