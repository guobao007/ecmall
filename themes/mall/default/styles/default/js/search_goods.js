$(function(){
    /* 筛选事件 */
    $('span[nctype="span_filter"]').click(function(){
    	_i = $(this).find('i');
    	location.assign($(this).find('i').attr('data-uri'));
        return false;
    });
    $("#search_by_price").click(function(){
        replaceParam('price', $(this).siblings("input:first").val() + '-' + $(this).siblings("input:last").val());
        return false;
    });

	// 筛选的下拉展开
	$(".select").hover(function(){
		$(this).addClass("over").next().css("display","block");
	},function(){
		$(this).removeClass("over").next().css("display","none");
	});
	$(".option").hover(function(){
		$(this).css("display","block");
	},function(){
		$(this).css("display","none");
	});
	$('.list_pic').find('dl').live('mouseout',function(){
		$(this).find('.slide-show').hide();
	});
	/*  */
	$('.slide_tiny').live('mouseover',function(){
		small_image = $(this).attr('nctype');
		$(this).parents('.slide-show').find('img:first').attr('src',small_image);
	});

    //鼠标经过弹出图片信息
    $(".item").hover(
        function() {
            $(this).find(".goods-info").animate({"top": "180px"}, 400, "swing");
        },function() {
            $(this).find(".goods-info").stop(true,false).animate({"top": "230px"}, 400, "swing");
        }
    );
    // 加入购物车
    $('a[nctype="add_cart"]').click(function() {
        var _parent = $(this).parent(), thisTop = _parent.offset().top, thisLeft = _parent.offset().left;
        animatenTop(thisTop, thisLeft), !1;
        eval('var data_str = ' + $(this).attr('data-param'));
        addcart(data_str.goods_id);
    });
    // 立即购买
    $('a[nctype="buy_now"]').click(function(){
        eval('var data_str = ' + $(this).attr('data-param'));
        $("#goods_id").val(data_str.goods_id+'|1');
        $("#buynow_form").submit();
    })
    // 图片切换效果
    $('.goods-pic-scroll-show').find('a').mouseover(function(){
        $(this).parents('li:first').addClass('selected').siblings().removeClass('selected');
        var _src = $(this).find('img').attr('src');
        _src = _src.replace('_60.', '_240.');
        $(this).parents('.goods-content').find('.goods-pic').find('img').attr('src', _src);
    });
});
function animatenTop(thisTop, thisLeft) {
    var CopyDiv = '<div id="box" style="top:' + thisTop + "px;left:" + thisLeft + 'px" ></div>', topLength = $(".my-cart").offset().top, leftLength = $(".my-cart").offset().left;
    $("body").append(CopyDiv), $("body").children("#box").animate({
        "width": "0",
        "height": "0",
        "margin-top":"0",
        "top": topLength,
        "left": leftLength,
        "opacity": 0
    }, 1000, function() {
        $(this).remove();
    });
}
/* 加入购物车 */
function addcart(goods_id) {
    var url = 'index.php?act=cart&op=add';
    $.getJSON(url, {'goods_id':goods_id, 'quantity':1}, function(data) {
        if (data != null) {
            if (data.state) {
                // 头部加载购物车信息
                load_cart_information();
            } else {
                alert(data.msg);
            }
        }
    });
}
function setcookie(name,value){
    var Days = 30;   
    var exp  = new Date();   
    exp.setTime(exp.getTime() + Days*24*60*60*1000);   
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();   
}

/* 替换参数 */
function replaceParam(key, value)
{
    var params = location.search.substr(1).split('&');
    var found  = false;
    for (var i = 0; i < params.length; i++)
    {
        param = params[i];
        arr   = param.split('=');
        pKey  = arr[0];
        if (pKey == 'page')
        {
            params[i] = 'page=1';
        }
        if (pKey == key)
        {
            params[i] = key + '=' + value;
            found = true;
        }
    }
    if (!found)
    {
        value = transform_char(value);
        params.push(key + '=' + value);
    }
    location.assign(SITE_URL + '/index.php?' + params.join('&'));
}

/* 删除参数 */
function dropParam(key)
{
    var params = location.search.substr(1).split('&');
    for (var i = 0; i < params.length; i++)
    {
        param = params[i];
        arr   = param.split('=');
        pKey  = arr[0];
        if (pKey == 'page')
        {
            params[i] = 'page=1';
        }
		<!-- sku tyioocom -->
		if (pKey == 'props' || pKey == 'brand')
		{
			//alert(arr[1].indexOf(key));
			//params[i] = '6:5;20:41;';
			//alert(key);
			arr1 = arr[1];
			arr1 = arr1.replace(key,'');
			arr1 = arr1.replace(";;",';');
			if(arr1.substr(0,1)==";") {
				arr1 = arr1.substr(1,arr1.length-1);
				//alert('ddd');
			}
			//alert(arr1);
			if(arr1.substr(arr1.length-1,1) == ";") {
				arr1 = arr1.substr(0,arr1.length-1);
			}
			params[i]=pKey + "=" + arr1;
			
			//alert(params[i]);
		}
        if (pKey == key || params[i]=='props=' || params[i]=='brand=')
        {
            params.splice(i, 1);
        }
		<!-- end sku -->
    }
    location.assign(SITE_URL + '/index.php?' + params.join('&'));
}
