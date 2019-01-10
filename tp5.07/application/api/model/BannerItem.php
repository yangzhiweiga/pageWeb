<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/8
 * Time: 16:17
 */

namespace app\api\model;


use think\Model;

class BannerItem extends Model
{
    protected $hidden = ['id','img_id','banner_id','delete_time','update_time'];

    function img()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}