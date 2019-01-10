<?php

namespace app\api\controller\v1;

use app\api\Validate\IDCollection;
use app\api\Validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;
use think\Controller;
use app\api\model\Theme as ThemeModel;
/**
 * Class Theme
 * @package app\api\controller\v1
 */
class Theme extends Controller
{
    /**
     * @url     /theme?ids=:id1,id2,id3...
     * @param string $ids
     * @return false|\PDOStatement|string|\think\Collection
     * @throws ThemeException
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    function getSimpleList($ids='')
    {
        (new IDCollection())->goCheck();
        $ids = explode(',',$ids);
        $result = ThemeModel::with('topicImg,headImg')->select($ids);
        if(!$result){
            throw new ThemeException();
        }
        return $result;
    }

    /**
     * @param $id
     * @return array|false|\PDOStatement|string|\think\Model
     * @throws ThemeException
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    function getComplexOne($id)
    {
        (new IDMustBePositiveInt())->goCheck($id);
        $result = ThemeModel::getThemeWithProducts($id);
        if(!$result){
            throw new ThemeException();
        }
        return $result;
    }
}
