/**
 * 图片上传
 */
function uploadImg(id,picker,inputId,width,height){
    var $ = jQuery,
        $list = $('#'+id),
        // 优化retina, 在retina下这个值是2
        ratio = window.devicePixelRatio || 1,

        // 缩略图大小
        thumbnailWidth = width * ratio,
        thumbnailHeight = height * ratio,

        // Web Uploader实例
        uploader;
        
        // 初始化Web Uploader
    uploader = WebUploader.create({
        // 自动上传。
        auto: true,
        // swf文件路径
        swf: SITE_URL + '/includes/webuploader/Uploader.swf',
        // 文件接收服务端。
        server: SITE_URL + '/admin/index.php?app=upload&act=add_img',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#'+picker,
        // 只允许选择文件，可选。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });
    
    // 当有文件添加进来的时候
    uploader.on( 'fileQueued', function( file ) {
        $('#'+id).html("");
        var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                    '<img>' +
                '</div>'
                ),
            $img = $li.find('img');

        $list.append( $li );

        // 创建缩略图
        uploader.makeThumb( file, function( error, src ) {
            if ( error ) {
                $img.replaceWith('<span>不能预览</span>');
                return;
            }

            $img.attr( 'src', src );
        }, thumbnailWidth, thumbnailHeight );
    });
    
    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on( 'uploadSuccess', function( file,response) {
        if(response.error.code){
            alert('上传失败');
//            var $li = $( '#'+file.id ),
//            $error = $li.find('div.error');
//            // 避免重复创建
//            if ( !$error.length ) {
//                $error = $('<div class="error"></div>').appendTo( $li );
//            }
//            $error.text('上传失败');
        }else{
            $('#'+inputId).val(response.result.filePath);
            $( '#'+file.id ).addClass('upload-state-done');
        }
    });
}