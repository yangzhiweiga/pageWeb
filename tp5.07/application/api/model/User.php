<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/13
 * Time: 22:01
 */

namespace app\api\model;

class User extends BaseModel
{
    public static function getByOpenID($openid)
    {
        $user = User::where('openid','=',$openid)->find();
        return $user;
    }
}