<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/5/10
 * Time: 21:36
 */

namespace modules\admin;

use Cross\MVC\Module;

class ConfigModule extends Module
{
    protected $t = 'config';
    protected $t_bg='wallpaper';
    protected $type = 1;

    function __construct($type = '')
    {
        parent::__construct();
        $this->type = $type;
    }

    function getConfigAll($fields = "*")
    {
        return $this->link->getAll($this->t, $fields, array('type' => $this->type));
    }

    function getConfigNodeList(){
        $list=$this->getConfigAll();
        if($list){
            $list=$this->getTree($list);
        }
        return $list;
    }

    function getTree($data,$pid=0){
        $tree='';
        foreach($data as $k=>$v){
            if($v['pid']==$pid){
                $v['pid']=$this->getTree($data,$v['id']);
                $tree[]=$v;
            }
        }
        return $tree;
    }

    function getBackgroundImage($fields="*"){
        return $this->link->getAll($this->t_bg,$fields);
    }
}