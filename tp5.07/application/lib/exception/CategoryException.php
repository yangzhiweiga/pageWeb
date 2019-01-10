<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/6
 * Time: 22:03
 */

namespace app\lib\exception;

/**
 * Class CategoryException
 * @package app\lib\exception
 */
class CategoryException extends BaseException
{
    public $code = 404;
    public $msg ='分类不存在';
    public $errorCode = 50000;
}