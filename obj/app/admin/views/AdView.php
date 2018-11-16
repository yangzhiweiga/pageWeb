<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/25
 * Time: 14:51
 */
namespace app\admin\views;


/**
 * 广告管理
 *
 * Class AdView
 * @package app\admin\views
 */
class AdView extends AdminView
{
    protected $position = [
        1=>'首页',
        2=>'资讯',
        3=>'资讯',
        4=>'日志',
        5=>'分享',
        6=>'关注'
    ];
    function index($data){
        $this->renderTpl('ad/index',$data);
    }

    function save(array $data){
        $this->renderTpl('ad/save',$data);
    }

    /**
     * @param $id
     */
    function getPosition($id){
        echo in_array((int)$id,array_keys($this->position))?$this->position[$id]:'暂无';
    }
}