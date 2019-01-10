<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/4
 * Time: 0:30
 */

namespace app\api\Validate;


class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id'=>'require|isPositiveInteger'
    ];

    protected $message=[
        'id'=>'id必须是正整数'
    ];
}