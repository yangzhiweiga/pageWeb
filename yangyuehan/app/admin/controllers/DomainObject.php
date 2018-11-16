<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/26
 * Time: 8:56
 */

namespace app\admin\controllers;

use Cross\MVC\Controller;

abstract class DomainObject extends Controller
{
    private $group;

    function __construct()
    {
        parent::__construct();
        $this->group = static::getGroup();
    }

    public static function create()
    {
        return new static();
    }

    static function getGroup()
    {
        return "default";
    }
}