<header class="ncc-head-layout">
            <div class="site-logo">
                <a href="index.php">
                    <img src="<?php echo $this->_var['site_logo']; ?>" class="pngFix">
                </a>
            </div>
            <ul class="ncc-flow">
                <li class="<?php if ($this->_var['buy_step'] == 'step1'): ?>'current'<?php endif; ?>"><i class="step1"></i>
                    <p>我的购物车</p>
                    <sub></sub>
                    <div class="hr"></div>
                </li>
                <li class="<?php if ($this->_var['buy_step'] == 'step2'): ?>'current'<?php endif; ?>"><i class="step2"></i>
                    <p>填写核对购物信息</p>
                    <sub></sub>
                    <div class="hr"></div>
                </li>
                <li class="<?php if ($this->_var['buy_step'] == 'step3'): ?>'current'<?php endif; ?>"><i class="step3"></i>
                    <p>支付提交</p>
                    <sub></sub>
                    <div class="hr"></div>
                </li>
                <li class="<?php if ($this->_var['buy_step'] == 'step4'): ?>'current'<?php endif; ?>"><i class="step4"></i>
                    <p>订单完成</p>
                    <sub></sub>
                    <div class="hr"></div>
                </li>
            </ul>
        </header>