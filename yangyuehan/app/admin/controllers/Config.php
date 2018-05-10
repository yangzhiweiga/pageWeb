<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/5/10
 * Time: 21:32
 */

namespace app\admin\controllers;

use modules\admin\ConfigModule;

class Config extends Admin
{
    function index()
    {

    }

    function navConfig()
    {
        $list = (new ConfigModule(1))->getConfigAll();
        $this->data['list'] = $list;
        $this->display($this->data);
    }
}