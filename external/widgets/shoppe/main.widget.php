<?php

/**
 * 神买专柜挂件
 *
 * @return  array   $image_list
 */
class ShoppeWidget extends BaseWidget {

    var $_name = 'shoppe';
    var $_ttl = 1800;

    function _get_data() {
        $cache_server = & cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if ($data === false) {
            $data = array(
                'goods_list' => $this->options['goods_list'],
            );
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }

    function parse_config($input) {
        for ($i = 0; $i < 40; $i++) {
            if (!empty($input['zg_image_url'][$i])) {
                $result[] = array(
                    'zg_image_url' => $input['zg_image_url'][$i],
                    'zg_link_url' => $input['zg_link_url'][$i],
                    'zg_title' => $input['zg_title'][$i],
                    'zg_price' => $input['zg_price'][$i],
                    'zg_priceold' => $input['zg_priceold'][$i]
                );
            }
        }
        $input['goods_list'] = $result;
        unset($input['zg_image_url']);
        unset($input['zg_link_url']);
        unset($input['zg_title']);
        unset($input['zg_price']);
        unset($input['zg_priceold']);
        
        return $input;
    }
}

?>