<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/6
 * Time: 21:52
 */

namespace app\api\Validate;


use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * @return bool
     * @throws Exception
     */
    public function goCheck()
    {
        $request = Request::instance();
        $params = $request->param();

        $result = $this->check($params);
        if (!$result) {
            $error = $this->error;
            throw new Exception($error);
        } else {
            return true;
        }
    }

    /**
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool|string
     */
    protected function isPositiveInteger($value, $rule='', $data='', $field='')
    {
        if(is_numeric($value) && is_int($value+0) && ($value+0)>0 ){
            return true;
        }
        return false;
    }

    protected function isNotEmpty($value='',$rule='',$data='',$field='')
    {
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }
}