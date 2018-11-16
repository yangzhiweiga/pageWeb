<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/26
 * Time: 11:00
 */
namespace app\web\controllers;

class SpreadSheet extends DocObj
{
    function index(){
        p(SpreadSheet::create());
    }
}