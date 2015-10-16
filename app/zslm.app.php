<?php
/**
 * 招商联盟
 *
 * @author QT
 */
class ZslmApp extends MallbaseApp {
    
    public function index(){
        $article_mod =& m('article');
        $cate_id = 2; //商城公告
        //获取商城公共文章
        $articles=$article_mod->find(array(
            'conditions'=>'if_show=1 AND store_id=0 AND cate_id='.$cate_id,
            'fields'=>'article_id, title',
            'limit'=> 4,
            'order'=>'sort_order ASC, article_id DESC'
        ));
        $this->assign('articles', array_values($articles));
        $this->assign('zslm',1);
        $this->_config_seo(array('title'=>'招商联盟 - '.Conf::get('site_title')));
        $this->display('zslm.html');
    }
}
