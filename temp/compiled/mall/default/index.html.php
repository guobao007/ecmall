<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/jquery.SuperSlide.js'; ?>" charset="utf-8"></script>
<link href="<?php echo $this->res_base . "/" . 'css/index2.css'; ?>" rel="stylesheet" type="text/css">

<div class="home-focus-layout" area="cycle_image" widget_type="area">
   <?php $this->display_widgets(array('page'=>'index','area'=>'cycle_image')); ?>
</div>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/home_index.js'; ?>" charset="utf-8"></script>

<div class="clear"></div>
<div id="maincont">
    
    <div class="content1 padtop40" area="re_image" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'re_image')); ?>
    </div>
    
    <div class="adv1" area="image_ad" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'image_ad')); ?>
    </div>
    <div class="floor">
        <div class="floor_one" area="qt_floor_2" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'qt_floor_2')); ?>
        </div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>