<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/13
 * Time: 16:29
 */

namespace app\api\controller\v1;


use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;
use think\Controller;

class Category extends Controller
{
    /**
     * @return false|static[]
     * @throws CategoryException
     * @throws \think\exception\DbException
     */
    public function getAllCategories()
    {
        $category = CategoryModel::all([],'img');//categoryModel::with('img')->select();
        if($category->isEmpty()){
            throw new CategoryException();
        }

        return $category;
    }
}