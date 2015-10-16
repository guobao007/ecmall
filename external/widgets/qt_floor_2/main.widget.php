<?php

/**
 * 商品楼层挂件
 *
 * @return  array   $image_list
 */
class Qt_floor_2Widget extends BaseWidget {

    var $_name = 'qt_floor_2';
    var $_ttl = 1800;

    function _get_data() {
        $cache_server = & cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if ($data === false) {
            $recom_mod =& m('recommend');
            $img_goods_list = $recom_mod->get_recommended_goods($this->options['img_recom_id'], 11, true, $this->options['img_cate_id']);
            $data = array(
                'model_id' => mt_rand(),
                'model_name' => $this->options['model_name'],
                'keywords' => explode(' ', $this->options['keyword']),
                'link' => $this->options['link'],
                'goods_list' => $img_goods_list,
                'ad_images_f1' => $this->options['ad_images_f1'],
                'ad_text_list' => $this->options['ad_text_list'],
                'bg_image_file' => $this->options['bg_image_file'],
            );
            
            $cache_server->set($key, $data, $this->_ttl);
        }

        return $data;
    }

    function parse_config($input) {
        if ($input['img_recom_id'] >= 0) {
            $input['img_cate_id'] = 0;
        }
        for ($i = 0; $i < 5; $i++) {
            if (!empty($input['f1_image_url'][$i])) {
                $result[] = array(
                    'f1_image_url' => $input['f1_image_url'][$i],
                    'f1_link_url' => $input['f1_link_url'][$i],
                    'f1_title_url' => $input['f1_title_url'][$i]
                );
            }
        }
        $input['ad_images_f1'] = $result;
        unset($input['f1_image_url']);
        unset($input['f1_link_url']);
        unset($input['f1_title_url']);
        
        for ($j = 0; $j < 6; $j++){
            if (!empty($input['ad_link_text'][$j])) {
                $result2[] = array(
                    'ad_link_text' => $input['ad_link_text'][$j],
                    'ad_link_url' => $input['ad_link_url'][$j],
                );
            }
        }
        $input['ad_text_list'] = $result2;
        unset($input['ad_link_text']);
        unset($input['ad_link_url']);
        
        return $input;
    }

    function _upload_image() {
        import('uploader.lib');
        $images = array();
        for ($i = 0; $i < 5; $i++) {
            $file = array();
            foreach ($_FILES['f1_image_file'] as $key => $value) {
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
        $fileOne = $_FILES['bg_image_file'];
        if ($fileOne['error'] == UPLOAD_ERR_OK)
        {
            $uploader = new Uploader();
            $uploader->allowed_type(IMAGE_FILE_TYPE);
            $uploader->addFile($fileOne);
            $uploader->root_dir(ROOT_PATH);
            return $uploader->save('data/files/mall/template', $uploader->random_filename());
        }

        return '';
    }

    function get_config_datasrc() {
        // 取得推荐类型
        $this->assign('recommends', $this->_get_recommends());

        // 取得一级商品分类
        $this->assign('gcategories', $this->_get_gcategory_options(2));
    }

}

?>