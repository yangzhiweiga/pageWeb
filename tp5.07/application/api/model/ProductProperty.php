<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/24
 * Time: 13:14
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden = ['product_id','delete_time','id'];
}