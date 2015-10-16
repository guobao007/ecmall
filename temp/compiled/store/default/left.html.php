<style type="text/css">
    .ncs-goods-code{
        border: 4px solid #d7d7d7;
        height: 150px;
        margin: 20px auto;
        position: relative;
        width: 150px;
        z-index: 1;
    }
    .ncs-goods-code p{
        display: table-cell;
        height: 150px;
        overflow: hidden;
        padding: 0;
        text-align: center;
        vertical-align: middle;
        width: 150px;
    }
    .ncs-goods-code img{
        max-height: 150px;
        max-width: 150px;
    }
</style>        
<div class="user">
            <div class="user_photo">
                <h2><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></h2>
                <div class="photo"><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><img src="<?php echo $this->_var['store']['store_logo']; ?>" width="100" height="100" /></a></div>
                <p><a href="javascript:collect_store(<?php echo $this->_var['store']['store_id']; ?>)">收藏该店铺</a></p>
            </div>
            
            <div class="user_data">
                <p>
                    <span>店主: </span><?php echo htmlspecialchars($this->_var['store']['store_owner']['user_name']); ?>
                    <a target="_blank" href="<?php echo url('app=message&act=send&to_id=' . htmlspecialchars($this->_var['store']['store_owner']['user_id']). ''); ?>"><img src="<?php echo $this->res_base . "/" . 'images/web_mail.gif'; ?>" alt="发站内信" /></a>
                </p>
                <p>
                    <span>信用度: </span><span class="fontColor1"><?php echo $this->_var['store']['credit_value']; ?></span>
                    <?php if ($this->_var['store']['credit_value'] >= 0): ?><img src="<?php echo $this->_var['store']['credit_image']; ?>" alt="" /><?php endif; ?>
                </p>
                <p>店铺等级: <?php echo $this->_var['store']['sgrade']; ?></p>
                <p>商品数量: <?php echo $this->_var['store']['goods_count']; ?></p>
                <p>所在地区: <?php echo htmlspecialchars($this->_var['store']['region_name']); ?></p>
                <p>创店时间: <?php echo local_date("Y-m-d",$this->_var['store']['add_time']); ?></p>
                <?php if ($this->_var['store']['certifications']): ?>
                <p>
                    <span>认证: </span>
                    <span>
                        <?php $_from = $this->_var['store']['certifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cert');if (count($_from)):
    foreach ($_from AS $this->_var['cert']):
?>
                        <?php if ($this->_var['cert'] == "autonym"): ?>
                        <a href="<?php echo url('app=article&act=system&code=cert_autonym'); ?>" target="_blank" title="实名认证"><img src="<?php echo $this->res_base . "/" . 'images/cert_autonym.gif'; ?>" /></a>
                        <?php elseif ($this->_var['cert'] == "material"): ?>
                        <a href="<?php echo url('app=article&act=system&code=cert_material'); ?>" target="_blank" title="实体店铺"><img src="<?php echo $this->res_base . "/" . 'images/cert_material.gif'; ?>" /></a>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </span>
                </p>
                <?php endif; ?>
                <?php if ($this->_var['store']['address']): ?>
                <p>详细地址: <?php echo htmlspecialchars($this->_var['store']['address']); ?></p>
                <?php endif; ?>
                <?php if ($this->_var['store']['tel']): ?>
                <p>联系电话: <?php echo htmlspecialchars($this->_var['store']['tel']); ?></p>
                <?php endif; ?>
                <p>
                    <?php if ($this->_var['store']['im_qq']): ?>
                    <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo htmlspecialchars($this->_var['store']['im_qq']); ?>&amp;Site=<?php echo htmlspecialchars($this->_var['store']['store_name']); ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo htmlspecialchars($this->_var['store']['im_qq']); ?>:4" alt="QQ"></a>
                    <?php endif; ?>
                    <?php if ($this->_var['store']['im_ww']): ?>
                    <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo urlencode($this->_var['store']['im_ww']); ?>&site=cntaobao&s=2&charset=<?php echo $this->_var['charset']; ?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo urlencode($this->_var['store']['im_ww']); ?>&site=cntaobao&s=2&charset=<?php echo $this->_var['charset']; ?>" alt="Wang Wang" /></a>
                    <?php endif; ?>
                    <?php if ($this->_var['store']['im_msn']): ?>
                    <a target="_blank" href="http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee=<?php echo htmlspecialchars($this->_var['store']['im_msn']); ?>"><img src="http://messenger.services.live.com/users/<?php echo htmlspecialchars($this->_var['store']['im_msn']); ?>/presenceimage/" alt="status" /></a>
                    <?php endif; ?>
                </p>
            </div>
        
            <div class="clear"></div>
        </div>
        <?php if ($_GET['app'] == 'goods'): ?>
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">商品二维码</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="ncs-goods-code">
                        <p><img src="<?php echo $this->_var['goods_qrcode']; ?>"></p>
                        <span class="ncs-goods-code-note"><i></i>扫描二维码，手机查看分享</span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">店内搜索</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="web_search">
                        <form id="" name="" method="get" action="index.php">
                            <input type="hidden" name="app" value="store" />
                            <input type="hidden" name="act" value="search" />
                            <input type="hidden" name="id" value="<?php echo $this->_var['store']['store_id']; ?>" />
                            <input class="text width4" type="text" name="keyword" />
                            <input class="btn" type="submit" value="" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">全部商品分类</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="submenu">
                        <li><a class="none_ico" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search'); ?>">全部商品</a></li>
                        <?php $_from = $this->_var['store']['store_gcates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
                        <?php if ($this->_var['gcategory']['children']): ?>
                        <li>
                            <a class="block_ico" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a>
                            <ul>
                                <?php $_from = $this->_var['gcategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['child_gcategory']):
?>
                                <li><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['child_gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child_gcategory']['value']); ?></a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li><a class="none_ico" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <?php if ($_GET['app'] == "store" && $_GET['act'] == "index"): ?>
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">友情链接</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="submenu">
                        <?php $_from = $this->_var['partners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'partner');if (count($_from)):
    foreach ($_from AS $this->_var['partner']):
?>
                        <li><a class="link_ico" href="<?php echo $this->_var['partner']['link']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['partner']['title']); ?></a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if ($_GET['app'] == "goods"): ?>
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">浏览历史</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="annals">
                        <?php $_from = $this->_var['goods_history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gh_goods');if (count($_from)):
    foreach ($_from AS $this->_var['gh_goods']):
?>
                        <li><a href="<?php echo url('app=goods&id=' . $this->_var['gh_goods']['goods_id']. ''); ?>"><img src="<?php echo $this->_var['gh_goods']['default_image']; ?>" width="50" height="50" alt="<?php echo htmlspecialchars(sub_str($this->_var['gh_goods']['goods_name'],20)); ?>" title="<?php echo htmlspecialchars($this->_var['gh_goods']['goods_name']); ?>" /></a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>