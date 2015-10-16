//加载最近浏览的商品
function load_history_information(){
    $.getJSON(SITE_URL+'/index.php?act=index&op=viewed_info', function(result){
        var obj = $('.head-user-menu .my-mall');
        if(result['m_id'] >0){
            if (typeof result['consult'] !== 'undefined') obj.find('#member_consult').html(result['consult']);
            if (typeof result['consult'] !== 'undefined') obj.find('#member_voucher').html(result['voucher']);
        }
        var goods_id = 0;
        var text_append = '';
        var n = 0;
        if (typeof result['viewed_goods'] !== 'undefined') {
            for (goods_id in result['viewed_goods']) {
                var goods = result['viewed_goods'][goods_id];
                text_append += '<li class="goods-thumb"><a href="'+goods['url']+'" title="'+goods['goods_name']+
                '" target="_blank"><img src="'+goods['goods_image']+'" alt="'+goods['goods_name']+'"></a>';
                text_append += '</li>';
                n++;
                if (n > 4) break;
            }
        }
        if (text_append == '') text_append = '<li class="no-goods">暂无商品</li>';;
        obj.find('.browse-history ul').html(text_append);
    });
}

//加载购物车信息
function load_cart_information(){
	$.getJSON(SITE_URL+'/index.php?app=cart&act=ajax_load&callback=?', function(result){
	    var obj = $('.head-user-menu .my-cart');
	    if(result){
	       	var html = '';
	       	if(result.cart_goods_num >0){
	            for (var i = 0; i < result['list'].length; i++){
	                var goods = result['list'][i];
	            	html+='<dl id="cart_item_'+goods['goods_id']+'"><dt class="goods-name"><a href="'+goods['goods_url']+'">'+goods['goods_name']+'</a></dt>';
	            	html+='<dd class="goods-thumb"><a href="'+goods['goods_url']+'" title="'+goods['goods_name']+'"><img src="'+goods['goods_image']+'"></a></dd>';
		          	html+='<dd class="goods-sales"></dd>';
		          	html+='<dd class="goods-price"><em>&yen;'+goods['goods_price']+'×'+goods['goods_num']+'</dd>';
		          	html+='<dd class="handle"><a href="javascript:void(0);" onClick="drop_topcart_item('+goods['rec_id']+','+goods['goods_id']+');">删除</a></dd>';
		          	html+="</dl>";
		        }
		        obj.find('.incart-goods').html(html);
    	        obj.find('.incart-goods-box').perfectScrollbar('destroy');
    	        obj.find('.incart-goods-box').perfectScrollbar();
	         	html = "共<i>"+result.cart_goods_num+"</i>种商品&nbsp;&nbsp;总计金额：<em>&yen;"+result.cart_all_price+"</em>";
		        obj.find('.total-price').html(html);
		        if (obj.find('.addcart-goods-num').size()==0) {
		            obj.append('<div class="addcart-goods-num">0</div>');
		        }
		        obj.find('.addcart-goods-num').html(result.cart_goods_num);
	      } else {
	      	html="<div class='no-order'><span>您的购物车中暂无商品，赶快选择心爱的商品吧！</span></div>";
	      	obj.find('.incart-goods').html(html);
	      	obj.find('.total-price').html('');
	      }
	   }
	});
}

//头部删除购物车信息，登录前使用goods_id,登录后使用cart_id
function drop_topcart_item(rec_id,goods_id){
    $.getJSON(SITE_URL+'/index.php?app=cart&act=del&rec_id='+rec_id+'&goods_id='+goods_id, function(result){
        if(result.state){
            var obj = $('.head-user-menu .my-cart');
            //删除成功
            if(result.quantity == 0){
    	      	html="<div class='no-order'><span>您的购物车中暂无商品，赶快选择心爱的商品吧！</span></div>";
    	      	obj.find('.incart-goods').html(html);
    	      	obj.find('.total-price').html('');
		        obj.find('.addcart-goods-num').remove();
            }else{
                $('#cart_item_' + goods_id).remove();        //移除
	         	html="共<i>"+result.quantity+"</i>种商品&nbsp;&nbsp;总计金额：<em>&yen;"+result.amount+"</em>";
	         	obj.find('.total-price').html(html);
		        obj.find('.addcart-goods-num').html(result.quantity);
    	        obj.find('.incart-goods-box').perfectScrollbar('destroy');
    	        obj.find('.incart-goods-box').perfectScrollbar();
            }
        }else{
            alert(result.msg);
        }
    });
}

//图片比例缩放控制
function DrawImage(ImgD, FitWidth, FitHeight) {
    var image = new Image();
    image.src = ImgD.src;
    if (image.width > 0 && image.height > 0) {
        if (image.width / image.height >= FitWidth / FitHeight) {
            if (image.width > FitWidth) {
                ImgD.width = FitWidth;
                ImgD.height = (image.height * FitWidth) / image.width;
            } else {
                ImgD.width = image.width;
                ImgD.height = image.height;
            }
        } else {
            if (image.height > FitHeight) {
                ImgD.height = FitHeight;
                ImgD.width = (image.width * FitHeight) / image.height;
            } else {
                ImgD.width = image.width;
                ImgD.height = image.height;
            }
        }
    }
} 
