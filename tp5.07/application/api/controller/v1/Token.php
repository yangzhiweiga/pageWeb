<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/13
 * Time: 21:43
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\Validate\TokenGet;
use app\lib\exception\ParameterException;
use app\lib\exception\TokenException;
use app\api\service\Token as TokenService;
/**
 * 获取令牌,相当于登陆
 * Class Token
 * @package app\api\controller\v1
 */
class Token
{
    /**
     * @param string $code
     * @return mixed
     * @throws \think\Exception
     */
    public function getToken($code='')
    {
        (new TokenGet())->goCheck();
        $wx = new UserToken($code);
        $token = $wx->get();
        return [
            'token'=>$token
        ];
    }

    /**
     * @param string $token
     * @return array
     * @throws ParameterException
     */
    public function verifyToken( $token='')
    {
        if(!$token){
            throw new ParameterException(['token'=>'不允许为空']);
        }

        $valid = TokenService::verifyToken($token);
        return ['isValid'=>$valid];
    }
}