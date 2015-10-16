<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <div class="wrap_line margin1">
            <div class="public">
                <div class="information_index">
                    <div class="photo">
                        <p><img src="<?php echo $this->_var['user']['portrait']; ?>" width="120" height="120" alt="" /></p>
                    </div>

                    <div class="info">
                        <h3 class="margin2">
                            <span>欢迎您，<?php echo htmlspecialchars($this->_var['user']['user_name']); ?></span>
                            <a href="<?php echo url('app=member&act=profile'); ?>">编辑个人资料>></a>
                        </h3>
                        <table class="width6">
                            <tr>
                                <td>上次登录时间: <?php echo local_date("Y-m-d H:i:s",$this->_var['user']['last_login']); ?></td>
                                <td>
                                <?php if ($this->_var['store']): ?>
                                卖家信用: <a href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. ''); ?>" target="_blank"><?php echo $this->_var['store']['credit_value']; ?></a><?php if ($this->_var['store']['credit_value'] >= 0): ?> <img src="<?php echo $this->_var['store']['credit_image']; ?>" /> <?php endif; ?>
                                <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>上次登录 IP: <?php echo $this->_var['user']['last_ip']; ?></td>
                                <td>
                                <?php if ($this->_var['store']): ?>
                                卖家好评率: <?php echo $this->_var['store']['praise_rate']; ?>%
                                <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                        <p><?php echo sprintf('您有 <span class="red">%s</span> 条短消息，<a href="index.php?app=message&act=newpm">点击查看</a>', $this->_var['new_message']); ?></p>
                    </div>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
        <div class="wrap_line margin1">
            <div class="public_index">
                <div class="information_index">
                    <h3 class="title">买家提醒</h3>
                    <?php if ($this->_var['buyer_stat'] && $this->_var['buyer_stat']['sum']): ?>
                    <div class="remind">
                        <dl>
                            <dt>订单提醒</dt>
                            <dd><?php echo sprintf('您有 <span class="red">%s</span> 个待付款的订单，请尽快到“<a href="index.php?app=buyer_order&type=pending">待付款订单</a>”中付款', $this->_var['buyer_stat']['pending']); ?></dd>
                            <dd><?php echo sprintf('您有 <span class="red">%s</span> 个订单卖家已发货，等待您的确认，请尽快到“<a href="index.php?app=buyer_order&type=shipped">已发货订单</a>”中确认', $this->_var['buyer_stat']['shipped']); ?></dd>
                            <dd><?php echo sprintf('您有 <span class="red">%s</span> 个订单还没有评价，请尽快到“<a href="index.php?app=buyer_order&type=finished">已完成订单</a>”中确认', $this->_var['buyer_stat']['finished']); ?></dd>
                        </dl>
                        <dl>
                            <dt>团购提醒</dt>
                            <dd><?php echo sprintf('您有 <span class="red">%s</span> 个参加的团购活动已完成，请尽快到“<a href="index.php?app=buyer_groupbuy&state=finished">已完成的团购</a>”中购买', $this->_var['buyer_stat']['groupbuy_finished']); ?></dd>
                            <dd><?php echo sprintf('您有 <span class="red">%s</span> 个参加的团购活动已被取消，查看“<a href="index.php?app=buyer_groupbuy&state=canceled">已取消的团购</a>”', $this->_var['buyer_stat']['groupbuy_canceled']); ?></dd>
                        </dl>
                        <a href="<?php echo url('app=buyer_order'); ?>" class="btn pos1" title="查看我的订单"><span class="pic1">查看我的订单</span></a>
                    </div>
                    <?php else: ?>
                    <div class="awoke">
                        您目前还没有已生成的订单<br />去<a href="index.php">商城首页</a>，挑选喜爱的商品，体验购物乐趣吧。
                    </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
<?php if ($this->_var['store']): ?>
        <div class="wrap_line">
            <div class="public_index">
                <div class="information_index">
                    <h3 class="title">卖家提醒
                        <p>
                        <span>店铺等级: <?php echo $this->_var['sgrade']['grade_name']; ?></span>
                        <span>有效期: <?php if ($this->_var['sgrade']['add_time']): ?><?php echo sprintf('剩余 %s 天', $this->_var['sgrade']['add_time']); ?><?php else: ?>不限制<?php endif; ?></span>
                        <span>商品发布: <?php echo $this->_var['sgrade']['goods']['used']; ?>/<?php if ($this->_var['sgrade']['goods']['total']): ?><?php echo $this->_var['sgrade']['goods']['total']; ?><?php else: ?>不限制<?php endif; ?></span>
                        <span>空间使用: <?php echo $this->_var['sgrade']['space']['used']; ?>M/<?php if ($this->_var['sgrade']['space']['total']): ?><?php echo $this->_var['sgrade']['space']['total']; ?>M<?php else: ?>不限制<?php endif; ?></span>
                        </p>
                    </h3>
                    <div class="remind">
                        <dl>
                            <dt>订单提醒</dt>
                            <dd><?php echo sprintf('您有 <span class="red">%s</span> 个待处理的订单，请尽快到“<a href="index.php?app=seller_order&type=submitted">已提交订单</a>”中处理', $this->_var['seller_stat']['submitted']); ?></dd>
                            <dd><?php echo sprintf('您有 <span class="red">%s</span> 个待发货的订单，请尽快到“<a href="index.php?app=seller_order&type=accepted">待发货订单</a>”中处理', $this->_var['seller_stat']['accepted']); ?></dd>
                        </dl>
                        <dl>
                            <dt>团购提醒</dt>
                            <dd><?php echo sprintf('您有 <span class="red">%s</span> 个发起的团购活动已结束，请尽快到“<a href="index.php?app=seller_groupbuy&state=end">已结束的团购</a>”中确认完成', $this->_var['seller_stat']['groupbuy_end']); ?></dd>
                        </dl>
                        <a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>" title="查看我的店铺" target="_blank" class="btn1 pos2"><span class="pic2">查看我的店铺</span></a>
                        <a href="<?php echo url('app=seller_order'); ?>" class="btn pos3" title="管理我的订单"><span class="pic1">管理我的订单</span></a>
                    </div>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
<?php endif; ?>
<?php if ($this->_var['applying']): ?>
        <div class="wrap_line">
            <div class="public_index">
                <div class="information_index">
                    <h3 class="title">开店提醒</h3>
                    <div class="remind">
                        <dl>
                            <dt>审核状态</dt>
                            <dd><?php echo sprintf('您的店铺正在审核中。你可以<a href="index.php?app=apply&step=2&id=%s">查看或修改店铺信息</a>', $this->_var['user']['sgrade']); ?></dd>
                        </dl>
                        <a href="index.php?app=apply&step=2&id=<?php echo $this->_var['user']['sgrade']; ?>" title="编辑店铺信息" class="btn1 pos2"><span class="pic2">编辑店铺信息</span></a>
                    </div>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
<?php endif; ?>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
