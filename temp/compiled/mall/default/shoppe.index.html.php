<?php echo $this->fetch('header.html'); ?>
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/index.css'; ?>" rel="stylesheet" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/ie6.js'; ?>" charset="utf-8"></script>
<![endif]-->
<style type="text/css">
.bg_shoppe{
    background: #f6f6f6 none repeat scroll 0 0;
    overflow: hidden;
}

.localife {
    clear: both;
    margin:0 auto;
    width: 1200px;
}
</style>
<div class="clear"></div>
<div class="bg_shoppe" area="shoppe" widget_type="area">
    <div class="localife">
    <?php $this->display_widgets(array('page'=>'shoppe','area'=>'shoppe')); ?>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>