<?php echo $this->fetch('header.html'); ?>
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/live.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/index.css'; ?>" rel="stylesheet" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/ie6.js'; ?>" charset="utf-8"></script>
<![endif]-->
<style type="text/css">
.jfocus-trigeminy{display:none}
</style>

<div class="home-focus-layout" area="cycle_image" widget_type="area">
   <?php $this->display_widgets(array('page'=>'local_life','area'=>'cycle_image')); ?>
</div>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/home_index.js'; ?>" charset="utf-8"></script>


<div class="main_content">
    <div class="live_nav"></div>
    <div class="floor" area="bdsh_floor" widget_type="area">
        <?php $this->display_widgets(array('page'=>'local_life','area'=>'bdsh_floor')); ?>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>