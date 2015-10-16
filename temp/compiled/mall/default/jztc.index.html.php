<?php echo $this->fetch('header.html'); ?>
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/index.css'; ?>" rel="stylesheet" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/ie6.js'; ?>" charset="utf-8"></script>
<![endif]-->
<style type="text/css">
.jfocus-trigeminy{display:none}
</style>

<div class="home-focus-layout" area="cycle_image" widget_type="area">
   <?php $this->display_widgets(array('page'=>'jztc','area'=>'cycle_image')); ?>
</div>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/home_index.js'; ?>" charset="utf-8"></script>

<div class="clear"></div>
<div class="home-sale-layout wrapper" area="tc_floor_1" widget_type="area">
    <?php $this->display_widgets(array('page'=>'jztc','area'=>'tc_floor_1')); ?>
</div>

<div class="datu_1" area="tc_datu_1" widget_type="area">
    <?php $this->display_widgets(array('page'=>'jztc','area'=>'tc_datu_1')); ?>
</div>

<div class="cuxiao" area="tc_floor_2" widget_type="area">
    <?php $this->display_widgets(array('page'=>'jztc','area'=>'tc_floor_2')); ?>
</div>
<div class="clear"></div>

<div class="hots_list" area="tc_floor_3" widget_type="area">
    <?php $this->display_widgets(array('page'=>'jztc','area'=>'tc_floor_3')); ?>
</div>
<div class="clear"></div>

<div class="datu_1" area="tc_datu_2" widget_type="area">
    <?php $this->display_widgets(array('page'=>'jztc','area'=>'tc_datu_2')); ?>
</div>
<div class="hots" area="tc_floor_4" widget_type="area">
    <?php $this->display_widgets(array('page'=>'jztc','area'=>'tc_floor_4')); ?>
</div>
<div class="clear"></div>

<div class="datu_1" area="tc_datu_3" widget_type="area">
    <?php $this->display_widgets(array('page'=>'jztc','area'=>'tc_datu_3')); ?>
</div>

<div class="cuxiao_goods" area="tc_floor_5" widget_type="area">
    <?php $this->display_widgets(array('page'=>'jztc','area'=>'tc_floor_5')); ?>
</div>
<div class="clear"></div>
<?php echo $this->fetch('footer.html'); ?>