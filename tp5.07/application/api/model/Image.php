<?php

namespace app\api\model;

class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    /**
     * @param $value
     * @param $data
     * @return string
     */
    public function getUrlAttr($value, $data)
    {
        $value = $this->prefixImgUrl($value, $data);
        return $value;
    }
    //
}
