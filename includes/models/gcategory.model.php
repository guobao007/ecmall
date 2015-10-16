<?php

/* 商品分类 gcategory */
class GcategoryModel extends BaseModel
{
    var $table  = 'gcategory';
    var $prikey = 'cate_id';
    var $_name  = 'gcategory';
    var $_relation  = array(
        // 一个分类只能属于一个店铺
        'belongs_to_store' => array(
            'model'         => 'model',
            'type'          => BELONGS_TO,
            'foreign_key'   => 'store_id',
            'reverse'       => 'has_gcategory',
        ),
        // 一个分类有多个子分类
        'has_gcategory' => array(
            'model'         => 'gcategory',
            'type'          => HAS_MANY,
            'foreign_key'   => 'parent_id',
            'dependent'     => true
        ),
        // 分类和商品是多对多的关系
        'has_goods' => array(
            'model'         => 'goods',
            'type'          => HAS_AND_BELONGS_TO_MANY,
            'middle_table'  => 'category_goods',
            'foreign_key'   => 'cate_id',
            'reverse'       => 'belongs_to_gcategory',
        ),
    );

    var $_autov = array(
        'cate_name' => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
        'parent_id' => array(
        ),
        'sort_order' => array(
            'filter'    => 'intval',
        ),
        'if_show' => array(
        ),
    );

    /**
     * 取得分类列表
     *
     * @param int $parent_id 大于等于0表示取某分类的下级分类，小于0表示取所有分类
     * @param bool $shown 只取要显示的分类
     * @return array
     */
    function get_list($parent_id = -1, $shown = false)
    {
        $conditions = "1 = 1";
        $parent_id >= 0 && $conditions .= " AND parent_id = '$parent_id'";
        $shown && $conditions .= " AND if_show = 1";

        return $this->find(array(
            'conditions' => $conditions,
            'order' => 'sort_order, cate_id',
        ));
    }

    function get_options($parent_id = -1, $shown = false)
    {
        $options = array();
        $rows = $this->get_list($parent_id, $shown);
        foreach ($rows as $row)
        {
            $options[$row['cate_id']] = $row['cate_name'];
        }

        return $options;
    }

    /**
     * 取得某分类的所有子孙分类id（不推荐使用，但是因为调用模块和专题模块中用到了，所以暂时保留，推荐使用业务模型中的相关函数）
     */
    function get_descendant($id)
    {
        $ids = array($id);
        $ids_total = array();
        $this->_get_descendant($ids, $ids_total);
        return array_unique($ids_total);
    }
    function _get_descendant($ids, &$ids_total)
    {
        $childs = $this->find(array(
            'fields' => 'cate_id',
            'conditions' => "parent_id " . db_create_in($ids)
        ));
        $ids_total = array_merge($ids_total, $ids);
        $ids = array();
        foreach ($childs as $child)
        {
            $ids[] = $child['cate_id'];
        }
        if (empty($ids))
        {
            return ;
        }
        $this->_get_descendant($ids, $ids_total);
    }
}

/* 商品分类业务模型 */
class GcategoryBModel extends GcategoryModel
{
    var $_store_id = 0;

    /*
     * 判断名称是否唯一
     */
    function unique($cate_name, $parent_id, $cate_id = 0)
    {
        $conditions = "parent_id = '$parent_id' AND cate_name = '$cate_name'";
        $cate_id && $conditions .= " AND cate_id <> '" . $cate_id . "'";
        return count($this->find(array('conditions' => $conditions))) == 0;
    }

    /* 覆盖基类方法 */
    function add($data, $compatible = false)
    {
        $this->clear_cache();

        $data['store_id'] = $this->_store_id;
        return parent::add($data, $compatible);
    }

    function edit($conditions, $edit_data)
    {
        $this->clear_cache();

        return parent::edit($conditions, $edit_data);
    }

    function drop($conditions, $fields = '')
    {
        $this->clear_cache();

        return parent::drop($conditions, $fields);
    }

    /* 覆盖基类方法 */
    function _getConditions($conditions, $if_add_alias = false)
    {
        $alias = '';
        if ($if_add_alias)
        {
            $alias = $this->alias . '.';
        }
        $res = parent::_getConditions($conditions, $if_add_alias);
        return $res ? $res . " AND {$alias}store_id = '{$this->_store_id}'" : " WHERE {$alias}store_id = '{$this->_store_id}'";
    }
    
    function is_leaf($id)
    {
        $sql = "SELECT COUNT(*) FROM {$this->table} " . $this->_getConditions("parent_id = '$id'");

        return $this->getOne($sql) == 0;
    }

    /**
     * 取得某分类的深度（没有子节点深度为1）
     * 
     * @param   int     $id     分类id（需保证是存在的）
     * @return  int     深度
     */
    function get_depth($id)
    {
        $depth = 0;

        $pids = array($id);
        while ($pids)
        {
            $depth++;
            $sql  = "SELECT cate_id FROM {$this->table} " . $this->_getConditions("parent_id " . db_create_in($pids));
            $pids = $this->getCol($sql);
        }

        return $depth;
    }

    /**
     * 取得某分类的子分类
     *
     * @param   int     $id     分类id
     * @param   bool    $cached 是否缓存（缓存数据不包括不显示的分类，一般用于前台；非缓存数据包括不显示的分类，一般用于后台）
     * @return  array(
     *              array('cate_id' => 1, 'cate_name' => '数码产品'),
     *              array('cate_id' => 2, 'cate_name' => '手机'),
     *              ...
     *          )
     */
    function get_children($id, $cached = false)
    {
        $res = array();

        if ($cached)
        {
            $data = $this->_get_structured_data();
            if (isset($data[$id]))
            {
                $cids = $data[$id]['cids'];
                foreach ($cids as $id)
                {
                    $res[$id] = array(
                        'cate_id'   => $id, 
                        'cate_name' => $data[$id]['name'],
                    );
                }
            }
        }
        else
        {
            $sql = "SELECT cate_id, cate_name FROM {$this->table} WHERE parent_id = '$id' AND store_id = '{$this->_store_id}'";
            $res = $this->getAll($sql);
        }

        return $res;
    }

    /**
     * 取得某分类的祖先分类（包括自身，按层级排序）
     *
     * @param   int     $id     分类id
     * @param   bool    $cached 是否缓存（缓存数据不包括不显示的分类，一般用于前台；非缓存数据包括不显示的分类，一般用于后台）
     * @return  array(
     *              array('cate_id' => 1, 'cate_name' => '数码产品'),
     *              array('cate_id' => 2, 'cate_name' => '手机'),
     *              ...
     *          )
     */
    function get_ancestor($id, $cached = false)
    {
        $res = array();
        if ($cached)
        {
            $data = $this->_get_structured_data();
            if ($id > 0 && isset($data[$id]))
            {
                while ($id > 0)
                {
                    $res[] = array('cate_id' => $id, 'cate_name' => $data[$id]['name']);
                    $id    = $data[$id]['pid'];
                }
            }
        }
        else
        {
            while ($id > 0)
            {
                $sql = "SELECT cate_id, cate_name, parent_id FROM {$this->table} WHERE cate_id = '$id' AND store_id = '{$this->_store_id}'";
                $row = $this->getRow($sql);
                if ($row)
                {
                    $res[] = array('cate_id' => $row['cate_id'], 'cate_name' => $row['cate_name']);
                    $id    = $row['parent_id'];
                }
            }
        }

        return array_reverse($res);
    }

    /**
     * 取得某分类的层级（从1开始算起）
     * 
     * @param   int     $id     分类id
     * @param   bool    $cached 是否缓存（缓存数据不包括不显示的分类，一般用于前台；非缓存数据包括不显示的分类，一般用于后台）
     * @return  int     层级     当分类不存在或不显示时返回false
     */
    function get_layer($id, $cached = false)
    {
        $ancestor = $this->get_ancestor($id, $cached);
        if (empty($ancestor))
        {
            return false; //分类不存在或不显示
        }
        else
        {
            return count($ancestor);
        }        
    }
    
    /**
     * 取得某分类的子孙分类id（包括自身id）
     *
     * @param   int     $id     分类id
     * @param   bool    $cached 是否缓存（缓存数据不包括不显示的分类，一般用于前台；非缓存数据包括不显示的分类，一般用于后台）
     * @return  array(1, 2, 3, ...)
     */
    function get_descendant_ids($id, $cached = false)
    {
        $res = array($id);

        if ($cached)
        {
            $data = $this->_get_structured_data();
            if ($id > 0 && isset($data[$id]))
            {
                $i = 0;
                while ($i < count($res))
                {
                    $id  = $res[$i];
                    $res = array_merge($res, $data[$id]['cids']);
                    $i++;
                }
            }
        }
        else
        {
            $cids = array($id);
            while (!empty($cids))
            {
                $sql  = "SELECT cate_id FROM {$this->table} WHERE parent_id " . db_create_in($cids) . " AND store_id = '{$this->_store_id}'";
                $cids = $this->getCol($sql);
                $res  = array_merge($res, $cids);
            }
        }

        return $res;
    }


    /**
     * 取得结构化的分类数据（不包括不显示的分类，数据会缓存）
     *
     * @return array(
     *      0 => array(                             'cids' => array(1, 2, 3))
     *      1 => array('name' => 'abc', 'pid' => 0, 'cids' => array(2, 3, 4)),
     *      2 => array('name) => 'xyz', 'pid' => 1, 'cids' => array()
     * )
     *    分类id        分类名称             父分类id     子分类ids
     */
    function _get_structured_data()
    {
        $cache_server =& cache_server();
        $key  = 'goods_category_' . $this->_store_id;
        $data = $cache_server->get($key);
        if ($data === false)
        {
            $data = array(0 => array('cids' => array()));

            $cate_list = $this->get_list(-1, true);
            foreach ($cate_list as $id => $cate)
            {
                $data[$id] = array(
                    'name' => $cate['cate_name'],
                    'pid'  => $cate['parent_id'],
                    'cids' => array()
                );
            }

            foreach ($cate_list as $id => $cate)
            {
                $pid = $cate['parent_id'];
                isset($data[$pid]) && $data[$pid]['cids'][] = $id;
            }

            $cache_server->set($key, $data, 1800);
        }

        return $data;
    }
    /**
     * 获取所有格式化分类
     * @param type $amount 二级分类显示数量
     * @param type $brand_is_recommend 品牌是否为推荐
     * @return type
     */
    function _get_header_gcategories($amount, $brand_is_recommend = 1) {
        $cache_server =& cache_server();
        $key  = 'header_goods_category_' . $this->_store_id;
        $gcategory_list = $cache_server->get($key);
        if ($gcategory_list === FALSE)
        {
            $gcategories = array();
            if (!$amount) {
                $gcategories = $this->get_list(-1, true);
            } else {
                $gcategory = $gcategory_mod->get_list(0, true);
                $gcategories = $gcategory;
                foreach ($gcategory as $val) {
                    $result = $this->get_list($val['cate_id'], true);
                    $result = array_slice($result, 0, $amount);
                    $gcategories = array_merge($gcategories, $result);
                }
            }
            import('tree.lib');
            $tree = new Tree();
            $tree->setTree($gcategories, 'cate_id', 'parent_id', 'cate_name');
            $gcategory_list = $tree->getArrayList(0);
            $i = 0;
    //        foreach ($gcategory_list as $k => $v) {
    //            $gcategory_list[$k]['top'] = isset($position[$i]) ? $position[$i] : '0px';
    //            $i++;
    //        }
            $brand_mod = &m('brand');
            if ($gcategory_list) {
                foreach ($gcategory_list as $k => $v) {
                    $gcategory_list[$k]['brands'] = $brand_mod->find(array('conditions' => "tag = '" . $v['value'] . "' AND recommended=" . $brand_is_recommend));
                }
            }
            $cache_server->set($key, $gcategory_list, 1800);
        }
        return $gcategory_list;
    }
    
    /**
     * 获取父级分类，递归调用
     */
    private function _getParentCategory($cate_id, $gcategory, $data) {
        array_unshift($data, $cate_id);
        if ($gcategory[$cate_id]['parent_id'] != 0) {
            return $this->_getParentCategory($gcategory[$cate_id]['parent_id'], $gcategory, $data);
        } else {
            return $data;
        }
    }
    
    /**
     * 显示左侧商品分类
     * @param array $param 分类id
     * @sign int $sign 0为取得最后一级的同级分类，1为不取得
     */
    public function getLeftCategory($param, $sign = 0) {
        $data = array();
        $gcategory = $this->get_list(-1, true);
        foreach ($param as $val) {
            $data[] = $this->_getParentCategory($val, $gcategory, array());
        }
        $tpl_data = array();
        $gc_list = $this->get_all_category();
        foreach ($data as $value) {
            //$tpl_data[$val[0]][$val[1]][$val[2]] = $val[2];
            if (!empty($gc_list[$value[0]])) {   // 一级
                $tpl_data[$value[0]]['cate_id'] = $gc_list[$value[0]]['cate_id'];
                $tpl_data[$value[0]]['cate_name'] = $gc_list[$value[0]]['cate_name'];
                if (!empty($gc_list[$value[0]]['class2'][$value[1]])) { // 二级
                    $tpl_data[$value[0]]['class2'][$value[1]]['cate_id'] = $gc_list[$value[0]]['class2'][$value[1]]['cate_id'];
                    $tpl_data[$value[0]]['class2'][$value[1]]['cate_name'] = $gc_list[$value[0]]['class2'][$value[1]]['cate_name'];
                    if (!empty($gc_list[$value[0]]['class2'][$value[1]]['class3'][$value[2]])) {    // 三级
                        $tpl_data[$value[0]]['class2'][$value[1]]['class3'][$value[2]]['cate_id'] = $gc_list[$value[0]]['class2'][$value[1]]['class3'][$value[2]]['cate_id'];
                        $tpl_data[$value[0]]['class2'][$value[1]]['class3'][$value[2]]['cate_name'] = $gc_list[$value[0]]['class2'][$value[1]]['class3'][$value[2]]['cate_name'];
                        if (!$sign) {   // 取得全部三级分类
                            foreach ($gc_list[$value[0]]['class2'][$value[1]]['class3'] as $val) {
                                $tpl_data[$value[0]]['class2'][$value[1]]['class3'][$val['cate_id']]['cate_id'] = $val['cate_id'];
                                $tpl_data[$value[0]]['class2'][$value[1]]['class3'][$val['cate_id']]['cate_name'] = $val['cate_name'];
                                if ($value[2] == $val['cate_id']) {
                                    $tpl_data[$value[0]]['class2'][$value[1]]['class3'][$val['cate_id']]['default'] = 1;
                                }
                            }
                        }
                    } else {    // 取得全部二级分类
                        if (!$sign) {   // 取得同级分类
                            if (!empty($gc_list[$value[0]]['class2'])) {
                                foreach ($gc_list[$value[0]]['class2'] as $gc2) {
                                    $tpl_data[$value[0]]['class2'][$gc2['cate_id']]['cate_id'] = $gc2['cate_id'];
                                    $tpl_data[$value[0]]['class2'][$gc2['cate_id']]['cate_name'] = $gc2['cate_name'];
                                    if (!empty($gc2['class3'])) {
                                        foreach ($gc2['class3'] as $gc3) {
                                            $tpl_data[$value[0]]['class2'][$gc2['cate_id']]['class3'][$gc3['cate_id']]['cate_id'] = $gc3['cate_id'];
                                            $tpl_data[$value[0]]['class2'][$gc2['cate_id']]['class3'][$gc3['cate_id']]['cate_name'] = $gc3['cate_name'];
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {    // 取得全部一级分类
                    if (!$sign) {   // 取得同级分类
                        if (!empty($gc_list)) {
                            foreach ($gc_list as $gc1) {
                                $tpl_data[$gc1['cate_id']]['cate_id'] = $gc1['cate_id'];
                                $tpl_data[$gc1['cate_id']]['cate_name'] = $gc1['cate_name'];
                                if (!empty($gc1['class2'])) {
                                    foreach ($gc1['class2'] as $gc2) {
                                        $tpl_data[$gc1['cate_id']]['class2'][$gc2['cate_id']]['cate_id'] = $gc2['cate_id'];
                                        $tpl_data[$gc1['cate_id']]['class2'][$gc2['cate_id']]['cate_name'] = $gc2['cate_name'];
                                        if (!empty($gc2['class3'])) {
                                            foreach ($gc2['class3'] as $gc3) {
                                                $tpl_data[$gc1['cate_id']]['class2'][$gc2['cate_id']]['class3'][$gc3['cate_id']]['cate_id'] = $gc3['cate_id'];
                                                $tpl_data[$gc1['cate_id']]['class2'][$gc2['cate_id']]['class3'][$gc3['cate_id']]['cate_name'] = $gc3['cate_name'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $tpl_data;
    }
    
    /**
     * 商品分类树
     */
    public function get_all_category() {
        $cache_server =& cache_server();
        $keys  = 'goods_all_category';
        $gc_list = $cache_server->get($keys);
        if ($gc_list === FALSE) {
            $class_list = $this->get_list(-1, true);
            $gc_list = array();
            $class1_deep = array(); //第1级关联第3级数组
            $class2_ids = array(); //第2级关联第1级ID数组
            $type_ids = array(); //第2级分类关联类型
            if (is_array($class_list) && !empty($class_list)) {
                foreach ($class_list as $key => $value) {
                    $p_id = $value['parent_id']; //父级ID
                    $gc_id = $value['cate_id'];
                    $sort = $value['sort_order'];
                    if ($p_id == 0) {//第1级分类
                        $gc_list[$gc_id] = $value;
                    } elseif (array_key_exists($p_id, $gc_list)) {//第2级
                        $class2_ids[$gc_id] = $p_id;
                        $gc_list[$p_id]['class2'][$gc_id] = $value;
                    } elseif (array_key_exists($p_id, $class2_ids)) {//第3级
                        $parent_id = $class2_ids[$p_id]; //取第1级ID
                        $gc_list[$parent_id]['class2'][$p_id]['class3'][$gc_id] = $value;
                        $class1_deep[$parent_id][$sort][] = $value;
                    }
                }
            }
            $cache_server->set($keys, $gc_list, 1800);
        }
        return $gc_list;
    }

    /* 清除缓存 */
    function clear_cache()
    {
        $cache_server =& cache_server();
        $keys = array('goods_category_' . $this->_store_id, 'page_goods_category', 'function_get_store_data_' . $this->_store_id,'header_goods_category_' . $this->_store_id,'goods_all_category');
        foreach ($keys as $key)
        {
            $cache_server->delete($key);
        }
    }
}

?>