                <script type="text/javascript">
                $(function(){
                   $('#check_coupon').click(function(){
                       var coupon_sn = $('#coupon_sn').val();
                       if(coupon_sn == '')
                       {
                           return;
                       }
                       $.getJSON("index.php?app=order&act=check_coupon", {coupon_sn: coupon_sn, store_id: '<?php echo $_GET['store_id']; ?>'}, function(data){
                           if(data['retval'])
                           {
                               $('.unusable').hide();
                               var msg = '有效 该优惠券的优惠价格为';
                               var str = price_format(data['retval']['price']);
                               $('.usable').show().html(msg + str).css("display","block");
                           }
                           else
                           {
                               $('.usable').hide();
                               $('.unusable').show().css("display","block");
                               $('#coupon_sn').val('');
                           }
                       });
                   });
               });
                </script>
                <div class="make_sure">
                    <p>订单总价:&nbsp;<strong class="fontsize3" id="order_amount"><?php echo price_format($this->_var['goods_info']['amount']); ?></strong><?php if ($this->_var['goods_info']['allow_coupon']): ?>&nbsp;&nbsp;<input type="button" class="btn1" onclick="$(this).parent('p').next().toggle();$('#coupon_sn').val('');" /><?php endif; ?></p>
                    <?php if ($this->_var['goods_info']['allow_coupon']): ?>
                    <p style="display:none;">优惠券编号:&nbsp;
                    <input type="text" name="coupon_sn" id="coupon_sn" class="text" />  
                    <input type="button" value="检查" class="check" id="check_coupon" />
                    <span class="usable">有效 该优惠券的优惠价格为</span> <span class="unusable">无效的优惠券.您可以到 <a href='index.php?app=my_coupon'>我的优惠券</a> 登记或者查询具体的优惠券信息</span>
                    </p>
                    <?php endif; ?>
                    <p>
                        <a href="javascript:void($('#order_form').submit());" class="btn">下单完成并支付</a>
                        <a href="<?php echo url('app=cart&store_id=' . $this->_var['goods_info']['store_id']. ''); ?>" class="back">返回购物车</a>
                    </p>
                </div>
