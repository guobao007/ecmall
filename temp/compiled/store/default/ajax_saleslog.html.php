<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mt10">
    <thead>
        <tr>
            <th class="w200">买家</th>
            <th class="w100">购买价</th>
            <th class="">购买数量</th>
            <th class="w200">购买时间</th>
        </tr>
    </thead>
    <?php if ($this->_var['sales_list']): ?>
    <tbody>
    <?php $_from = $this->_var['sales_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sales');if (count($_from)):
    foreach ($_from AS $this->_var['sales']):
?>
    <tr>
        <td><a><?php echo $this->_var['sales']['buyer_name']; ?></a></td>
        <td><em class="price"><?php echo $this->_var['sales']['price']; ?></em> <i style="color:red;"></i></td>
        <td><?php echo $this->_var['sales']['quantity']; ?> <span><?php if ($this->_var['sales']['specification']): ?>（<?php echo htmlspecialchars($this->_var['sales']['specification']); ?>）<?php endif; ?></span></td>
        <td><time><?php echo local_date("Y-m-d",$this->_var['sales']['add_time']); ?></time></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="10" class="tr" >
                <div class="pagination"><?php echo $this->fetch('page.bottom.html'); ?></div>
            </td>
        </tr>
    </tfoot>
    <?php else: ?>
    <div class="ncs-norecord">暂无符合条件的数据记录</div>
    <?php endif; ?>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $('#salelog_demo').find('.demo').ajaxContent({
            event:'click', //mouseover
            target:'#salelog_demo'
    });
});
</script>