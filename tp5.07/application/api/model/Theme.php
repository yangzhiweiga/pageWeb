<?php

namespace app\api\model;

class Theme extends BaseModel
{
    protected $hidden = ['update_time','delete_time','topic_img_id','head_img_id'];
    public function topicImg()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image','head_img_id','id');
    }
    //
    public function product()
    {
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }

    /**
     * @param $id
     * @return array|false|\PDOStatement|string|\think\Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getThemeWithProducts($id){
        $theme = self::with('product,topicImg,headImg')->find($id);
        return $theme;
    }
}
