<?php
/**
 * @Author:       wonli <wonli@live.com>
 */
namespace app\web\controllers;

use Cross\Core\Delegate;

class Main extends Web
{
    /**
     * 默认控制器
     */
    function index()
    {
        $this->display($this->data);
    }
}
