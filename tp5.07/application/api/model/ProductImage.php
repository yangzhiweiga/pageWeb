<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/24
 * Time: 13:13
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id','delete_time','product_id'];

    public function imgUrl()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}