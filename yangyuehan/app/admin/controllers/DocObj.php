<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/26
 * Time: 8:59
 */
namespace app\admin\controllers;

/**
 * Class Documment
 * @package app\admin\controllers
 */
class DocObj extends DomainObject
{

    function getUserObject(){
        echo "<pre>";
        print_r(User::create());exit;
    }

    static function getGroup(){
        return "document";
    }
}