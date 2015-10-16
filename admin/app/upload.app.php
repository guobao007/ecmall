<?php
/**
 * 文件/图片上传处理
 *
 * @author GUOBAO
 */
class uploadApp extends BackendApp {
    /**
     * AJAX图片上传
     */
    public function add_img(){
        import('uploader.lib');
        $file = $_FILES['file'];
        if ($file['error'] == UPLOAD_ERR_OK)
        {
            $uploader = new Uploader();
            $uploader->allowed_type(IMAGE_FILE_TYPE);
            $uploader->addFile($file);
            $uploader->root_dir(ROOT_PATH);
            $filePath = $uploader->save('data/files/mall/template', $uploader->random_filename());
            die('{"jsonrpc" : "2.0", "error" : "0", "result" : {"filePath": "'.$filePath.'"}, "id" : "id"}');
        }else{
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }
    }
}
