<?php

/**
 * 神买专柜
 *
 * @author QT
 */
class shoppeApp extends MallbaseApp {
    public function index(){
        $this->_config_seo(array('title'=>'神买专柜 - '.Conf::get('site_title')));
        $this->display('shoppe.index.html');
    }
}
