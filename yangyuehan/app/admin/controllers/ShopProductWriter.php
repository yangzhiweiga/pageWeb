<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/26
 * Time: 8:49
 */

namespace app\admin\controllers;

abstract class ShopProductWriter
{
    protected $products = [];

    function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }
    abstract function write();
}