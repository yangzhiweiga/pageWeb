<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/20
 * Time: 12:54
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}