<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/6
 * Time: 23:06
 */

namespace app\api\model;


use think\Model;

class Banner extends Model
{
    protected $hidden = ['delete_time','update_time'];

    function items()
    {
        return $this->hasMany('banner_item','banner_id','id');
    }

    /**
     * @param $id
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getBannerByID($id)
    {
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
    }
}