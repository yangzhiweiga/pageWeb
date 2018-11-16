<?php
/**
 * @author yzw <yangzhiweiga@163.com>
 * Date: 2018/11/13 14:22
 */
namespace app\web\controllers;

use Cross\MVC\Controller;
use modules\test\Document;
use modules\test\DocumentModule;
use modules\test\ShopProductModule;
use modules\test\ShopProductWriteModule;
use modules\test\UserModule;

class Test extends Controller
{
    function index()
    {
        $product = new ShopProductModule("My antonia","Willa","Cather",5.99);
        $product1 = new ShopProductModule("My antonia1","Willa1","Cather1",5.99);
        var_dump(DocumentModule::create());
        var_dump(UserModule::create());
    }
}