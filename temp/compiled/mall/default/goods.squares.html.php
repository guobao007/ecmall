<style type="text/css">
#box {background: #FFF; width: 238px; height: 410px; margin: -390px 0 0 0; display: block; border: solid 4px #D93600; position: absolute; z-index: 999; opacity: .5}
.shopMenu {position: fixed; z-index:1; right:25%; top: 0;}

</style>
<div class="squares" nc_type="current_display_mode">
    <?php if ($this->_var['goods_list']): ?>
    <ul class="list_pic">
        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <li class="item">
            <div class="goods-content" nctype_goods="<?php echo $this->_var['goods']['goods_id']; ?>" nctype_store="<?php echo $this->_var['goods']['store_id']; ?>">
                <div class="goods-pic">
                    <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><img src="<?php echo $this->_var['goods']['default_image']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></a>
                </div>
                <div class="goods-info">
                    <div class="goods-pic-scroll-show">
                        
                    </div>
                    <div class="goods-name">
                        <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?><em></em></a>
                    </div>
                    <div class="goods-price">
                        <em class="sale-price" title="商城价：<?php echo price_format($this->_var['goods']['price']); ?>"><?php echo price_format($this->_var['goods']['price']); ?></em>
                        <em class="market-price" title="市场价：<?php echo price_format($this->_var['goods']['price']); ?>"><?php echo price_format($this->_var['goods']['price']); ?></em>
                        <!--<span class="raty" data-score=""></span>-->
                    </div>
                    <div class="sell-stat">
                        <ul>
                            <li><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank" class="status"><?php echo ($this->_var['goods']['sales'] == '') ? '0' : $this->_var['goods']['sales']; ?></a><p>商品销量</p></li>
                            <li><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo ($this->_var['goods']['comments'] == '') ? '0' : $this->_var['goods']['comments']; ?></a><p>用户评论</p></li>
                            <li><em member_id="<?php echo $value['member_id'];?>">&nbsp;</em></li>
                        </ul>
                    </div>
                    <div class="store"><a href="<?php echo url('app=store&id=' . $this->_var['goods']['store_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['store_name']); ?>" class="name"><?php echo htmlspecialchars($this->_var['goods']['store_name']); ?></a></div>
                    <div class="add-cart">
                        <a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" nctype="buy_now"><i class="icon-shopping-cart"></i>立即购买</a>
<!--                        <a href="javascript:void(0);" nctype="add_cart" data-param=""><i class="icon-shopping-cart"></i>加入购物车</a>-->
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <div class="clear"></div>
    </ul>
    <?php else: ?>
    <div class="module_common">
        <p class="no_info">很抱歉! 没有找到相关商品</p>
    </div>
    <?php endif; ?>
</div>