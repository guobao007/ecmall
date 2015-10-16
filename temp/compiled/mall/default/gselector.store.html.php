<script type="text/javascript">
//<!CDATA[
$(function(){

    $('#query_goods').click(function(){
        $('#gs_goods_id').html('<option>正在加载商品列表...</option>');
        $.getJSON('index.php?app=gselector&act=store_goods&ajax=1',{
            'goods_name':$('#gs_goods_name').val(),
            'sgcate_id':$('#gs_sgcate_id').val(),
            'store_id':<?php echo $_GET['store_id']; ?>
            },
            function(data){
                if(data.done){
                    if(data.retval.length != 0){
                       $('#gs_goods_id').html('');
                            $.each(data.retval,function(i,item){
                                $('#gs_goods_id').append('<option value="' + item.goods_id + '">' + item.goods_name + '</option>');
                            });
                        }else{
                            $('#gs_goods_id').html('<option>没有符合条件的记录</option>');
                        }
                    }
            });
    });
    $('#gs_goods_id').dblclick(select);
    $('#gs_submit').click(select);
});

function msg(msg){
    $('#warning').show();
    $('#warning').text(msg);
    window.setTimeout(function(){
        $('#warning').hide();
    },4000)
}

function select(){
    var id = '<?php echo $_GET['id']; ?>';
    var name = '<?php echo $_GET['name']; ?>';
    var callback = '<?php echo $_GET['callback']; ?>';
    if(id.length == 0){
        msg('id_mission');
    }
    if($('#gs_goods_id').val()>0){
        $('#'+id).val($('#gs_goods_id').val());
        if(name.length>0){
            $('#'+name).val($('#gs_goods_id option:selected').text());
        }if(callback.length>0){
            eval(callback+'()');
        }
        DialogManager.close(id);
    }else{
        msg('请选择商品');
    }
}
//]]>
</script>
<ul class="tab">
    <li class="active"><?php echo $this->_var['title']; ?></li>
</ul>
<div class="eject_con gselector">
    <div class="adds">
        <div id="warning"></div>
        <form method="post" action="index.php?app=coupon&act=<?php echo $_GET['act']; ?>&id=<?php echo $_GET['id']; ?>" target="coupon" id="gselector_form">
        <ul>
            <li>
                <h3>商品名称: </h3>
                <p><input type="text" class="text width14" id="gs_goods_name" id="gs_goods_name" /></p>
            </li>
            <li>
                <h3>本店分类: </h3>
                <p><select id="gs_sgcate_id" name="gs_sgcate_id" class="sgcategory">
                        <option value="0">请选择...</option>
                        <?php echo $this->html_options(array('options'=>$this->_var['sgcategories'],'selected'=>$this->_var['sgcate']['cate_id'])); ?>
                   </select>
                </p>
            </li>
            <li>
                <h3>&nbsp;&nbsp;</h3>
                <p>
                    <a class="search_btn" id="query_goods" href="javascript:;">搜索</a>
                </p>
            </li>
            <li>
                <h3>请选择商品: </h3>
                <p>
                    <select id="gs_goods_id" name="gs_goods_id" class="text" style="width:310px;" size="7">
                        <option value="0">请先从上面搜索</option>
                    </select>
                </p>
            </li>
        </ul>
        <div class="submit"><input type="button" id="gs_submit" class="btn" value="提交" /></div>
        </form>
    </div>
</div>