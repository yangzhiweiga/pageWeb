<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/12/13
 * Time: 15:30
 */

namespace app\api\controller\v1;


use app\api\Validate\Count;
use app\api\model\Product as ProductModel;
use app\api\Validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;

class Product
{
    /**
     * @param int $count
     * @return false|\PDOStatement|string|\think\Collection
     * @throws ProductException
     * @throws \think\Exception
     */
    function getRecent($count=15){
        (new Count())->goCheck();
        $product = ProductModel::getMostRecent($count);
        if($product->isEmpty()){
            throw new ProductException();
        }
        $product = $product->hidden(['summary']);
        return $product;
    }


    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if(!$product){
            throw new ProductException();
        }
        return $product;
    }
}