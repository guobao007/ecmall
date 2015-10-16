<?php echo $this->fetch('header.html'); ?>
<div  id="main" class="w-full">
	<div id="page-home" class="w-full mb20">
    	<div class="col-1 w clearfix">
        	<div class="left" area="col-1-left" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-1-left')); ?>
            </div>
            <div class="middle mt10" area="col-1-middle" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-1-middle')); ?>
            </div>
            <div class="right mt10" area="col-1-right" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-1-right')); ?>
            </div>
        </div>
        <div class="col-2 w" area="col-2" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-2')); ?>
        </div>
        <div class="col-3 w clearfix" >
           <div class="left" area="col-3-left" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-3-left')); ?>
           </div> 
           <div class="right" area="col-3-right" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-3-right')); ?>
           </div> 
        </div>
        <div class="col-4 w" area="col-4" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'col-4')); ?>
        </div>
    </div>
</div>
<?php echo $this->fetch('server.html'); ?>
<?php echo $this->fetch('footer.html'); ?>