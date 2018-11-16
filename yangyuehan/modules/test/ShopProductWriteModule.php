<?php
/**
 * @author yzw <yangzhiweiga@163.com>
 * Date: 2018/11/15 14:13
 */
namespace modules\test;

use modules\BaseModule;

abstract class ShopProductWriteModule extends BaseModule
{
    private $products = [];

    function write(){
        $str = "";
        foreach ($this->products as $shopProduct){
            $str .= "{$shopProduct->title}:".$shopProduct->getProduct()."{$shopProduct->price}\r\n";
        }
        print $str;
    }

    public function addProduct(ShopProductModule $shopProduct){
        $this->products[] = $shopProduct;
    }

    abstract public function read();
}