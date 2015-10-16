<ul class="tab">
    <li class="active">订购情况</li>
</ul>
<div class="eject_con">
    <div id="warning"></div>
    <div class="edit_table">
        <p>活动名称: <?php echo htmlspecialchars($this->_var['group']['group_name']); ?></p>
        <form action="index.php?app=my_goods&amp;act=spec_edit&amp;id=<?php echo $this->_var['goods']['goods_id']; ?>" method="POST" target="iframe_post">
        <div class="edit_table_box">
            <table>
                <tr>
                    <th class="width2">用户名</th>
                    <th class="width2">联系人</th>
                    <th class="width2">联系电话</th>
                    <th><?php echo $this->_var['goods']['spec_name']; ?>: 订购数</th>
                </tr>
                <?php $_from = $this->_var['join_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user');if (count($_from)):
    foreach ($_from AS $this->_var['user']):
?>
                <tr>
                    <th class="width2"><?php echo htmlspecialchars($this->_var['user']['user_name']); ?></th>
                    <th class="width2"><?php echo htmlspecialchars($this->_var['user']['linkman']); ?></th>
                    <th class="width2"><?php echo $this->_var['user']['tel']; ?></th>
                    <td class="align2">
                    <?php $_from = $this->_var['user']['spec_quantity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec']):
?>
                    <?php if ($this->_var['spec']['spec']): ?><?php echo htmlspecialchars($this->_var['spec']['spec']); ?><?php else: ?>默认规格<?php endif; ?>: <?php echo $this->_var['spec']['qty']; ?><br />
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <th colspan="4">暂无订购记录</th>
                </tr>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>
        </div>
        </form>
    </div>
</div>