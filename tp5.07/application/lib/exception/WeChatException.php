<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/13
 * Time: 22:40
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = '微信服务端接口调用失败';
    public $errorCode = 999;
}