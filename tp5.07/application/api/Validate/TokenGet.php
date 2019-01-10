<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/13
 * Time: 21:45
 */

namespace app\api\Validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code'=>'require|isNotEmpty'
    ];
    protected $message = [
        'code' => '没有code还想获取token,做梦哦'
    ];
}