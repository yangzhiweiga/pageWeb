<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/25
 * Time: 14:48
 */

namespace app\admin\controllers;

use modules\admin\AdModule;


/**
 * 广告管理
 *
 * Class Ad
 * @package app\admin\controllers
 */
class Ad extends Admin
{
    function index()
    {
        $list = (new AdModule())->getAdList();
        $this->data['list'] = $list;
        $this->display($this->data);
    }

    function save()
    {
        if ($this->is_post()) {
            try {
                $data = (new AdModule())->filterAdPostData($_POST);
                $validateData = AdModule::getInstance()->checkPostData($data);
                if ($validateData['status'] != 1) {
                    throw new \Exception($validateData['status']);
                }
                if ($data && $validateData) {
                    AdModule::getInstance()->add($data);
                }
                $this->to('ad:index');
            } catch (\Exception $e) {
                $this->data['status'] = $e->getMessage();
            }
        }
        $this->display($this->data);
    }
}