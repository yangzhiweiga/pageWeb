<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/6
 * Time: 22:03
 */

namespace app\lib\exception;

/**
 * Class BannerMissException
 * @package app\lib\exception
 */
class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg ='请求banner不存在';
    public $errorCode = 40000;
}