<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_groupbuy.js'; ?>" charset="utf-8"></script>
<div class="content">
    <?php if ($this->_var['groupbuy_list']): ?>
    <div class="left">

        <div class="module_sidebar">
            <h2><b>推荐团购</b></h2>
            <div class="wrap">
                <div class="wrap_child">

                    <ul class="fellowship">
                        <?php $_from = $this->_var['recommended_groupbuy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group');if (count($_from)):
    foreach ($_from AS $this->_var['group']):
?>
                        <li>
                            <div class="pic"><a target="_blank" href="<?php echo url('app=groupbuy&id=' . $this->_var['group']['group_id']. ''); ?>"><img src="<?php echo $this->_var['group']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['group']['group_name']); ?>" width="65" height="65" /></a></div>
                            <dl>
                                <dt><a title="<?php echo htmlspecialchars($this->_var['group']['group_name']); ?>" target="_blank" href="<?php echo url('app=groupbuy&id=' . $this->_var['group']['group_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['group']['group_name']); ?></a></dt>
                                <dd class="distance"><span title="<?php echo price_format($this->_var['group']['price']); ?>"><?php echo price_format($this->_var['group']['price']); ?></span></dd>
                                <dd class="time"><?php echo $this->_var['group']['lefttime']; ?></dd>
                            </dl>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>

                </div>
            </div>
            <h2><b>最新参与的团购</b></h2>
            <div class="wrap">
                <div class="wrap_child">

                    <ul class="fellowship">
                        <?php $_from = $this->_var['last_join_groupbuy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group');if (count($_from)):
    foreach ($_from AS $this->_var['group']):
?>
                        <li>
                            <div class="pic"><a target="_blank" href="<?php echo url('app=groupbuy&id=' . $this->_var['group']['group_id']. ''); ?>" ><img src="<?php echo $this->_var['group']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['group']['group_name']); ?>" width="65" height="65" /></a></div>
                            <dl>
                                <dt><a target="_blank" href="<?php echo url('app=groupbuy&id=' . $this->_var['group']['group_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['group']['group_name']); ?>"><?php echo htmlspecialchars($this->_var['group']['group_name']); ?></a></dt>
                                <dd class="distance"><span title="<?php echo price_format($this->_var['group']['price']); ?>"><?php echo price_format($this->_var['group']['price']); ?></span></dd>
                                <dd class="time"><?php echo local_date("Y-m-d H:i",$this->_var['group']['add_time']); ?></dd>
                            </dl>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>

                </div>
            </div>
        </div>

    </div>

    <div class="right">

        <div class="shop_con_list">
            <h2>
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <div class="h2_wrap">
                    <div class="table_title">
                    <form method="get" action="index.php">
                        <input type="hidden" name="app" value="search" />
                        <input type="hidden" name="act" value="groupbuy" />
                        <span class="display_span">活动名称</span>
                        <input class="table_text" name="keyword" type="text" value="<?php echo htmlspecialchars($_GET['keyword']); ?>" />
                        <span class="display_span">状态</span>
                        <select class="display_select" ectype="state">
                            <?php echo $this->html_options(array('options'=>$this->_var['state'],'selected'=>$_GET['state'])); ?>
                        </select>
                        <input class="table_btn" type="submit" name="Submit" value="搜索" />
                        <span class="display_span">排序</span>
                        <span class="popularity" ectype="order_by_views">人气</span>
                        <span class="remainder" ectype="order_by_lefttime">剩余时间</span>
                    </form>                    
                    </div>
                    <div class="top_page">
                        <?php echo $this->fetch('page.top.html'); ?>
                    </div>
                </div>
            </h2>
        </div>

        <div class="group_shop">
            <table>
                <?php if ($this->_var['groupbuy_list']): ?>
                <tr>
                    <th colspan="2">活动名称</th>
                    <th>团购价</th>
                    <th>订购 / 成团</th>
                    <th>店铺</th>
                    <?php if ($_GET['state'] == 'on'): ?><th>剩余时间</th><?php endif; ?>
                </tr>
                <?php endif; ?>
                <?php $_from = $this->_var['groupbuy_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group');if (count($_from)):
    foreach ($_from AS $this->_var['group']):
?>
                <tr>
                    <td class="group_pic"><a target="_blank" href="<?php echo url('app=groupbuy&id=' . $this->_var['group']['group_id']. ''); ?>"><img src="<?php echo $this->_var['group']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['group']['group_name']); ?>" width="70" height="70" /></a></td>
                    <td class="apellation"><a target="_blank" href="<?php echo url('app=groupbuy&id=' . $this->_var['group']['group_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['group']['group_name']); ?></a></td>
                    <td class="price"><?php echo price_format($this->_var['group']['group_price']); ?></td>
                    <td class="member"><?php echo $this->_var['group']['quantity']; ?> / <?php echo $this->_var['group']['min_quantity']; ?></td>
                    <td class="usershop"><a target="_blank" href="<?php echo url('app=store&id=' . $this->_var['group']['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['group']['store_name']); ?></a><br /><a target="_blank" class="email" target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=message&amp;act=send&amp;to_id=<?php echo $this->_var['group']['store_id']; ?>"><img src="<?php echo $this->res_base . "/" . 'images/web_mail.gif'; ?>" alt="发站内信" /></a></td>
                    <?php if ($_GET['state'] == 'on'): ?>
                    <td class="time"><?php echo $this->_var['group']['lefttime']; ?></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="6">
                    <div id="no_results">没有找到相关团购活动</div>
                    </td>
                </tr>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>
        </div>

        <div class="shop_list_page">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>

    </div>
    <?php else: ?>
    <div class="module_common">
        <p class="no_info">没有找到相关团购活动</p>
    </div>
    <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>