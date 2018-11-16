<?php
/**
 * @Author:       wonli <wonli@live.com>
 */

namespace app\web\controllers;

use modules\admin\ConfigModule;

class Main extends Web
{
    /**
     * 默认控制器
     */
    function index()
    {
        $nav_list = (new ConfigModule(1))->getConfigNodeList();
        $this->data['nav_list'] = $nav_list;
        if($res=(new ConfigModule(1))->getBackgroundImage('src')){
            $this->data['url']=current(array_column($res,'src'));
        }else{
            $this->data['url']=$this->view->res("images/banner.jpg");
        }
        $this->display($this->data);
    }
}
