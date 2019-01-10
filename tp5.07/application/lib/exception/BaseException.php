<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/6
 * Time: 22:01
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;

}