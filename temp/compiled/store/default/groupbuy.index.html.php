<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('top.html'); ?>
<style>
.inverse_proportion { float: left; width: 100px; height: 16px; overflow: hidden; background: url(<?php echo $this->res_base . "/" . 'images/inverse_proportion.gif'; ?>) no-repeat -<?php echo $this->_var['group']['left_per']; ?>px center; }
.error {display: block;}
</style>

<script type="text/javascript">
//<!CDATA[
$(function(){
    $('#join').click(function(){
        var qty = 0;
        var error = false;
        var max_per_user = <?php echo $this->_var['group']['max_per_user']; ?>;
        $('input[ectype="quantity"]').each(function(){
            if(parseInt($(this).val()) > 0 ){
                qty += parseInt($(this).val());
            }
            if($(this).val() !='' && (parseInt($(this).val()) < 0 || isNaN(parseInt($(this).val()))))
            {
                error = true;
            }
        });
        if('<?php echo $this->_var['group']['ican']['login']; ?>'){
           alert('您需要登陆才能参加团购活动');
           window.location.href = SITE_URL + '/index.php?app=member&act=login&ret_url=' + encodeURIComponent('index.php?app=groupbuy&id=<?php echo $this->_var['group']['group_id']; ?>');
        }else if(error == true){
           alert('您输入的数量不正确');
        }else if(qty == 0){
           alert('请填写购买数量');
        }else if(max_per_user > 0 && qty > max_per_user){
           alert('<?php echo sprintf('该团购商品每人最多购买%s件', $this->_var['group']['max_per_user']); ?>');
        }else{
            $('#info').show();
            $('input[name="link_man"]').focus();
            $('input[ectype="quantity"]').attr('disabled',true);
        }
    });
    $('#close').click(function(){
        $('#info').hide();
        $('input[ectype="quantity"]').attr('disabled',false);
    });
    $('#join_group_form').submit(function(){
        $('input[ectype="quantity"]').attr('disabled',false);
    });

    $('input[name="exit"]').click(function(){
        if(!confirm('您确定要退出该团购活动吗？')){
            return false;
        }
    });

    $('#join_group_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        onkeyup : false,
        rules : {
            link_man : {
                required   : true
            },
            tel :{
                checkTel : true
            }
        },
        messages : {
            link_man  : {
                required   : '请正确填写联系人姓名和联系电话'
            },
            tel: {
                checkTel   : '请正确填写联系人姓名和联系电话'
            }
        }
    });
});

//]]>
</script>
<div id="content2">
    <div id="left">
        <?php echo $this->fetch('left.html'); ?>
    </div>

    <div id="right">

        <h2 class="ware_title">
            <span class="main"><?php echo htmlspecialchars($this->_var['group']['group_name']); ?></span><br />
            <span class="time"><?php echo $this->_var['group']['state_desc']; ?></span></h2>

        <div class="ware_info">
            <div class="ware_pic"><a target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['group']['goods_id']. ''); ?>"><img src="<?php echo $this->_var['goods']['default_image']; ?>" /></a></div>
            <form method="post" id="join_group_form" action="index.php?app=groupbuy&amp;id=<?php echo $this->_var['group']['group_id']; ?>">
            <div class="ware_text">
                <div class="info_particular">
                    <ul>
                        <li>
                            <p class="title">起始时间: </p>
                            <p class="con"><?php echo local_date("Y-m-d",$this->_var['group']['start_time']); ?> 至 <?php echo local_date("Y-m-d",$this->_var['group']['end_time']); ?></p>
                        </li>
                        <li>
                            <p class="title">成团件数: </p>
                            <p class="con">
                                <span class="quantity"><?php echo $this->_var['group']['min_quantity']; ?> <span class="ascertain">
                                <?php if ($this->_var['group']['min_quantity'] > $this->_var['group']['quantity']): ?>
                                (还差<?php echo $this->_var['group']['left_quantity']; ?>)
                                <?php else: ?>
                                (已订<?php echo $this->_var['group']['quantity']; ?>)
                                <?php endif; ?>
                                </span></span>
                                <span class="inverse_proportion"></span>
                            </p>
                        </li>
                        <?php if ($this->_var['group']['max_per_user'] > 0): ?>
                        <li>
                            <p class="title">每人限购: </p>
                            <p class="con">
                            <?php echo $this->_var['group']['max_per_user']; ?>
                            </p>
                        </li>
                        <?php endif; ?>
                        <li>
                            <p class="title">团购说明: </p>
                            <p class="con">
                            <?php if ($this->_var['group']['group_desc']): ?>
                            <?php echo $this->_var['group']['group_desc']; ?>
                            <?php else: ?>
                            暂无
                            <?php endif; ?>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="info_explain">商品名称: <a target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></div>
                <div class="info_table">
                    <table>
                        <tr>
                            <th><?php echo htmlspecialchars($this->_var['goods']['spec_name']); ?></th>
                            <th>原价</th>
                            <th>团购价</th>
                            <?php if ($this->_var['group']['ican']['join'] || $this->_var['group']['ican']['join_info']): ?>
                            <th>购买数量</th>
                            <?php endif; ?>
                        </tr>
                        <?php $_from = $this->_var['goods']['_specs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec']):
?>
                        <tr>
                            <td><?php echo $this->_var['spec']['spec']; ?><input ectype="spec" name="spec[]" type="hidden" class="text" value="<?php echo $this->_var['spec']['spec']; ?>" /><input ectype="spec_id" name="spec_id[]" type="hidden" class="text" value="<?php echo $this->_var['spec']['spec_id']; ?>" /></td>
                            <td><?php echo price_format($this->_var['spec']['price']); ?></td>
                            <td><?php echo price_format($this->_var['spec']['group_price']); ?></td>
                            <?php if ($this->_var['group']['ican']['join'] || $this->_var['group']['ican']['join_info']): ?>
                            <td>
                            <?php if ($this->_var['group']['ican']['join']): ?><input ectype='quantity' name="quantity[]" type="text" class="text" /><?php endif; ?>
                            <?php if ($this->_var['group']['ican']['join_info']): ?><?php echo $this->_var['spec']['my_qty']; ?><?php endif; ?>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </table>
                </div>
                <div class="info_fun">


                <div class="align">
                        <?php if ($this->_var['group']['ican']['join_info']): ?>
                        <span class="txt">我参加了该团购活动</span>
                        <?php endif; ?>
                        <?php if ($this->_var['group']['ican']['exit']): ?>
                        <input name="exit" class="btn" type="submit" value="退出团购" />
                        <?php endif; ?>
                        <?php if ($this->_var['group']['ican']['buy']): ?>
                        <input name="buy" class="btn" onclick="window.location.href='index.php?app=order&goods=groupbuy&group_id=<?php echo $_GET['id']; ?>'" type="button" value="购买" />
                        <?php endif; ?>
                </div>
                <?php if ($this->_var['group']['ican']['join']): ?>
                    <div class="align">
                        <input id="join" class="big_btn" type="button" value="" />
                    </div>
                    <div id="info" class="ware_cen_info_fun" style="display:none">
                        <div class="ware_center_info_fun">
                            <h1>
                                <span class="dialog_title">参团人信息</span>
                                <span class="close_link" title="关闭" id="close" onmouseover="this.className = 'close_hover'" onmouseout="this.className = 'close_link'"></span>                            </h1>
                            <div class="ware_cen_btn">

                                <p class="float_layer_text">请认真填写以下信息，以便店主与您联系</p>
                                <ul class="fill_in_fun">
                                    <li>
                                        <p class="title">真实姓名: </p>
                                        <p><input name="link_man" type="text" class="text" /></p>
                                    </li>
                                    <li>
                                        <p class="title">联系电话: </p>
                                        <p><input name="tel" type="text" class="text" /></p>
                                    </li>
                                    <li class="btn_fun"><input name="join" type="submit" value="参加团购" /></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ware_cen_bottom_info_fun"></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            </form>
            <div class="clear"></div>

        </div>

        <div class="module_special">
            <h2 class="common_title veins2">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">参团记录</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="buy_name">
                        <?php $_from = $this->_var['join_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user');if (count($_from)):
    foreach ($_from AS $this->_var['user']):
?>
                        <li><?php echo $this->_var['user']['user_name']; ?></li>
                        <?php endforeach; else: ?>
                        <li>暂无参团记录</li>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="module_currency">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">团购咨询</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <?php echo $this->fetch('qa.html'); ?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>



    </div>

    <div class="clear"></div>
</div>

<?php echo $this->fetch('footer.html'); ?>
