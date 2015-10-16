<?php

/**
 * 商品楼层挂件
 *
 * @return  array   $image_list
 */
class bdsh_floorWidget extends BaseWidget {

    var $_name = 'bdsh_floor';
    var $_ttl = 1800;

    function _get_data() {
        $cache_server = & cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if ($data === false) {
            $data = array(
                'model_id' => mt_rand(),
                'model_name' => $this->options['model_name'],
                'bd_images_list' => $this->options['bd_images_list'],
                'ad1_image_url' => $this->options['ad1_image_url'],
                'ad2_image_url' => $this->options['ad2_image_url'],
                'ad2_link_url' => $this->options['ad2_link_url'],
            );
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }

    function parse_config($input) {
        for ($i = 0; $i < 8; $i++) {
            if (!empty($input['bd_image_url'][$i])) {
                $result[] = array(
                    'bd_image_url' => $input['bd_image_url'][$i],
                    'bd_link_url' => $input['bd_link_url'][$i],
                    'bd_title' => $input['bd_title'][$i],
                    'bd_price' => $input['bd_price'][$i],
                    'bd_priceold' => $input['bd_priceold'][$i]
                );
            }
        }
        $input['bd_images_list'] = $result;
        unset($input['bd_image_url']);
        unset($input['bd_link_url']);
        unset($input['bd_title']);
        unset($input['bd_price']);
        unset($input['bd_priceold']);
        
        return $input;
    }

    function _upload_image() {
        import('uploader.lib');
        $images = array();
        for ($i = 0; $i < 8; $i++) {
            $file = array();
            foreach ($_FILES['bd_image_file'] as $key => $value) {
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
    
    function _upload_image_one()
    {
        import('uploader.lib');
        $images_ad = array();
        for ($i = 1; $i <= 2; $i++)
        {
            $file_ad = $_FILES['ad' . $i . '_image_file'];
            if ($file_ad['error'] == UPLOAD_ERR_OK)
            {
                $uploader = new Uploader();
                $uploader->allowed_type(IMAGE_FILE_TYPE);
                $uploader->addFile($file_ad);
                $uploader->root_dir(ROOT_PATH);
                $images_ad[$i] = $uploader->save('data/files/mall/template', $uploader->random_filename());
            }
        }

        return $images_ad;
    }

}

?>