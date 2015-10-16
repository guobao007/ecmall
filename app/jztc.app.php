<?php
/**
 * 金寨特产
 *
 * @author QT
 */
class jztcAPP  extends MallbaseApp {
    
    public function index() {
        $this->_config_seo(array('title'=>'金寨特产 - '.Conf::get('site_title')));
        $this->display('jztc.index.html');
    }
}
