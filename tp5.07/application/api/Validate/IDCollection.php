<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/8
 * Time: 23:29
 */

namespace app\api\Validate;


class IDCollection extends BaseValidate
{
    protected $rule=[
        'ids'=>'require|checkIDs',
    ];

    protected $message=[
        'ids'=>'ids参数必须是以逗号分隔的正整数'
    ];

    /**
     * @param $value
     * @return bool
     */
    public function checkIDs($value)
    {
        $values = explode(',',$value);
        if(empty($value)){
            return false;
        }

        foreach($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}