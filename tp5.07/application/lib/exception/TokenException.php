<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/20
 * Time: 12:42
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 100001;
}