<?php
/**
 * @Author:       wonli <wonli@live.com>
 */
namespace app\web\views;

/**
 * @Auth: wonli <wonli@live.com>
 * Class MainView
 * @package app\web\views
 */
class MainView extends WebView
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 默认视图控制器
     *
     * @param array $data
     */
    function index($data = array())
    {
        $this->data['title']='杨悦涵个人主页';
        $this->renderTpl('main/index', $data);
    }
}
