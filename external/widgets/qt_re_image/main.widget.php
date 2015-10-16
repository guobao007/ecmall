<?php

/**
 * 图片推荐挂件
 *
 * @return  array   $image_list
 */
class Qt_re_imageWidget extends BaseWidget {

    var $_name = 'qt_re_image';
    var $_ttl = 1800;

    function _get_data() {
        $cache_server = & cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if ($data === false) {
            $data = array(
                're_images' => $this->options['re_images'],
                'model_name' => $this->options['model_name']
            );
            $cache_server->set($key, $data, $this->_ttl);
        }

        return $data;
    }

    function parse_config($input) {
        $result = array();
        $num = 8;
        if ($num > 0) {
//            $images = $this->_upload_image($num);
            for ($i = 0; $i < $num; $i++) {
//                if (!empty($images[$i])) {
//                    $input['re_image_url'][$i] = $images[$i];
//                }

                if (!empty($input['re_image_url'][$i])) {
                    $result[] = array(
                        're_image_url' => $input['re_image_url'][$i],
                        're_link_url' => $input['re_link_url'][$i],
                        're_title_url' => $input['re_title_url'][$i]
                    );
                }
            }
        }
        $input['re_images'] = $result;
        unset($input['re_image_url']);
        unset($input['re_link_url']);
        unset($input['re_title_url']);
        return $input;
    }

    function _upload_image($num) {
        import('uploader.lib');

        $images = array();
        for ($i = 0; $i < $num; $i++) {
            $file = array();
            foreach ($_FILES['re_image_file'] as $key => $value) {
                $file[$key] = $value[$i];
            }
            
            if ($file['error'] == UPLOAD_ERR_OK) {
                $uploader = new Uploader();
                $uploader->allowed_type(IMAGE_FILE_TYPE);
                $uploader->addFile($file);
                $uploader->root_dir(ROOT_PATH);
                $images[$i] = $uploader->save('data/files/mall/template', $uploader->random_filename());
            }
        }
        return $images;
    }

}

?>