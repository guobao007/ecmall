<?php

class DefaultApp extends MallbaseApp
{
    function index()
    {
//        header("Location: index.php?app=jztc");
        $this->assign('index', 1); // 标识当前页面是首页，用于设置导航状态
        $this->assign('icp_number', Conf::get('icp_number'));

        /* 热门搜素 */
        $this->assign('hot_keywords', $this->_get_hot_keywords());

        $this->_config_seo(array(
            'title' => Lang::get('mall_index') . ' - ' . Conf::get('site_title'),
        ));
        $this->assign('page_description', Conf::get('site_description'));
        $this->assign('page_keywords', Conf::get('site_keywords'));
        $this->display('index.html');
    }

    function _get_hot_keywords()
    {
        $keywords = explode(',', conf::get('hot_search'));
        return $keywords;
    }
    
    /**
     * 修改数据库数据
     */
//    public function xg(){
//        $db = &db();
//        $goods_list = $db->getall('select goods_id,description from  ecm_goods');
//        foreach ($goods_list as $k=>$v) {
//            $description = str_replace('192.168.3.239:8010', 'mall.jzncds.com', $v['description']);
//            $db->query("update ecm_goods set description='".$description."' where goods_id=".$v['goods_id']);
//        }
//    }
    
    /**
     * 批量修改二维码
     */
//    public function wm(){
//        $db = &db();
//        $page = $_GET['page'] ? $_GET['page'] : 1;
//        $size = 20;
//        $pageSize = $page*$size;
//        $goods_count = $db->getOne('select count(*) from ecm_goods');
//        if($pageSize <=$goods_count){
//            $goods_list = $db->getall('select goods_id,store_id from ecm_goods limit '.$pageSize.','.$size);
//            // 生成商品二维码
//            include_once(ROOT_PATH . '/includes/phpqrcode/index.php');
//            $PhpQRCode = new PhpQRCode();
//            foreach ($goods_list as $k=>$v) {
//                $dirname = 'data/files/store_' . $v['store_id'] . '/qrcode/';
//                $PhpQRCode->set('pngTempDir',$dirname);
//                $PhpQRCode->set('date',SITE_URL. '/index.php?app=goods&id='.$v['goods_id']);
//                $PhpQRCode->set('pngTempName', $v['goods_id'] . '.png');
//                $PhpQRCode->init();
//            }
//            $page++;
//            echo "<script type=\"text/javascript\">setInterval(window.location.href='index.php?app=default&act=wm&page=".$page."',3000);</script>";
//        }
//    }
}

?>
