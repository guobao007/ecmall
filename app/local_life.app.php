<?php
/**
 * 本地生活
 *
 * @author QT
 */
class local_lifeAPP extends MallbaseApp {
    public function index() {
        $this->_config_seo(array('title'=>'本地生活 - '.Conf::get('site_title')));
        $this->display('local_life.index.html');
    }
}
