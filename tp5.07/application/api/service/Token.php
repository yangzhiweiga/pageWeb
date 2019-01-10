<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/20
 * Time: 12:24
 */

namespace app\api\service;


use think\Cache;

class Token
{
    public static function generateToken()
    {
        $randChar = getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('secure.token_sale');
        return md5($randChar . $timestamp . $tokenSalt);
    }

    /**
     * @param $token
     * @return bool
     */
    public static function verifyToken( $token )
    {
        $exist = Cache::get($token);
        if ($exist) {
            return true;
        } else {
            return false;
        }
    }
}