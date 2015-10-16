<?php if ($this->_var['payform']['online']): ?>
  <h3>正在连接支付网关, 请稍等...</h3>
  <form action="<?php echo $this->_var['payform']['gateway']; ?>" id="payform" method="<?php echo $this->_var['payform']['method']; ?>" style="display:none">
  <?php $_from = $this->_var['payform']['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('_k', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['_k'] => $this->_var['value']):
?>
    <input type="hidden" name="<?php echo $this->_var['_k']; ?>" value="<?php echo $this->_var['value']; ?>" />
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </form>
  <script type="text/javascript">
      document.getElementById('payform').submit();
  </script>
<?php else: ?>
<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<style type="text/css">
.payment_desc {margin:10px 10px 20px 10px; background:#eee; padding:5px;}
.payment_desc h3 {margin:5px; border-bottom:#ddd 1px dotted; padding-bottom:5px;}
.payment_desc .detail {text-indent:2em;}
.table_form {margin:0px 10px;}
.table_form td {padding:5px;}
.table_form .desc {color:#888; font-style:italic;}
</style>
<div class="content">
    <div class="module_common">
        <div class="payment_desc">
        <h3>支付方式简介</h3>
        <div class="detail">
            <?php echo $this->_var['payform']['desc']; ?>
        </div>
        </div>
        <form id="pay_message_form" action="index.php?app=cashier&act=offline_pay&order_id=<?php echo $this->_var['order']['order_id']; ?>" method="POST">
            <table class="table_form" width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td valign="top" style="padding:5px; width:90px;">
                                            请输入支付信息
                    <span class="desc">(如:转账的账号,时间等)</span></td>
                    <td>
                    <textarea name="pay_message" cols="60" rows="5"><?php echo htmlspecialchars($this->_var['order']['pay_message']); ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" style="float:left;margin-left:100px;" value="提交&nbsp;&raquo;" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
<?php endif; ?>
