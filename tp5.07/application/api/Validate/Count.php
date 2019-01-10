<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/13
 * Time: 15:32
 */

namespace app\api\Validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
}