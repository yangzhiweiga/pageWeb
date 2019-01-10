<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/13
 * Time: 14:07
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg ='请求的主题不存在';
    public $errorCode = 30000;
}