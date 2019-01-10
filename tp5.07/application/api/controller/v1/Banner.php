<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/4
 * Time: 0:28
 */

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\Validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**
     * @param $id
     * @return \think\response\Json
     * @throws BannerMissException
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    function getBanner($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return $banner;
    }
}