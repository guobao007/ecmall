<?php echo $this->fetch('header.html'); ?>

<script type="text/javascript">
//<!CDATA[
$(function(){
    $(".show_image").mouseover(function(){
        $(this).next("div").show();
    });
    $(".show_image").mouseout(function(){
        $(this).next("div").hide();
    });
});
//]]>
</script>

<div id="rightTop">
  <p>支付方式管理</p>
  <ul class="subnav">
    <li><span>支付配置</span></li>
  </ul>
</div>
<div class="info">
  <form method="post" enctype="multipart/form-data">
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> <label for="payment_name">名称:</label></th>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['payment']['name']; ?></td>
      </tr>
      <tr>
        <th class="paddingT15"> <label for="ctrl_alipay_account">支付宝账号:</label></th>
        <td class="paddingT15 wordSpacing5">
            <input id="ctrl_alipay_account" type="text" name="config[alipay_account]" value="<?php echo $this->_var['config']['alipay_account']; ?>" class="infoTableInput"/>
            <label for="field_notice">输入您在支付宝的账号</label>
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <label for="ctrl_alipay_key">交易安全校验码（key）:</label></th>
        <td class="paddingT15 wordSpacing5"><input id="ctrl_alipay_key" type="text" name="config[alipay_key]" value="<?php echo $this->_var['config']['alipay_key']; ?>" class="infoTableInput"/>        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <label for="ctrl_alipay_partner">合作者身份（partner ID）:</label></th>
        <td class="paddingT15 wordSpacing5"><input id="ctrl_alipay_partner" type="text" name="config[alipay_partner]" value="<?php echo $this->_var['config']['alipay_partner']; ?>" class="infoTableInput"/>        </td>
      </tr>
      <tr>
        <th class="paddingT15"><label for="ctrl_alipay_service">接口类型:</label></th>
        <td class="paddingT15 wordSpacing5">
            <select name="config[alipay_service]" id="ctrl_alipay_service">
                <?php $_from = $this->_var['payment']['config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('conf', 'info');if (count($_from)):
    foreach ($_from AS $this->_var['conf'] => $this->_var['info']):
?>
                <?php if ($this->_var['info']['type'] == 'select'): ?>
                <?php echo $this->html_options(array('options'=>$this->_var['info']['items'],'selected'=>$this->_var['config'][$this->_var['conf']])); ?>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
          <label for="field_notice">1.5%费率用户请选“担保交易接口”</label>
        </td>
      </tr>
      <tr>
        <th class="paddingT15" valign="top"> <label for="payment_desc">简介:</label></th>
        <td class="paddingT15 wordSpacing5"><textarea name="payment_desc" id="payment_desc"><?php echo $this->_var['payment']['payment_desc']; ?></textarea>
            <label class="field_notice">该信息将在用户下单时被看到</label></td>
        </td>
      </tr>
      <tr>
        <th class="paddingT15">启用:</th>
        <td class="paddingT15"><input id="enabled0" type="radio" name="enabled" <?php if ($this->_var['payment']['enabled'] == 0): ?>checked<?php endif; ?> value="0" />
          <label for="site_status0">否</label>
          <input id="enabled1" type="radio" name="enabled" <?php if ($this->_var['payment']['enabled'] == 1): ?>checked<?php endif; ?> value="1" />
          <label for="site_status1">是</label>        </td>
      </tr>
      <tr>
        <th class="paddingT15">排序:</th>
        <td class="paddingT15 wordSpacing5"><input id="sort_order" type="text" name="sort_order" value="<?php echo $this->_var['payment']['sort_order']; ?>" class="infoTableInput"/></td>
      </tr>
      
      <tr>
        <th></th>
        <td class="ptb20"><input class="formbtn" type="submit" name="Submit" value="提交" />
          <input class="formbtn" type="reset" name="Submit2" value="重置" />        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?>