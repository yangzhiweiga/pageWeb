<?php
/**
 * @author yzw <yangzhiweiga@163.com>
 * Date: 2018/11/13 14:23
 */
namespace modules\test;

use modules\BaseModule;

class ShopProductModule extends BaseModule implements ChareableModule
{
    private $title = 'default product';
    private $producerMainName = 'main name';
    private $producerFirstName = 'first name';
    private $price = 0;
    private $discount = 0;
    private $id = 0;

    function __construct($title, $firstName, $mainName, $price)
    {
        parent::__construct();
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    function __toString()
    {
        // TODO: Implement __toString() method.
        return __CLASS__;
    }

    function getProduct()
    {
        return "{$this->producerFirstName}" . "{$this->producerMainName}";
    }

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerFirstName}), ";
        $base .= "{$this->producerMainName}";
        return $base;
    }

    function setDiscount($num)
    {
        $this->discount = $num;
    }

    function getDiscount()
    {
        return $this->discount;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setID($id)
    {
        $this->id = $id;
    }

    /**
     * @param $id
     * @param PDO $pdo
     * @return BookProductModule|CdProductModule|ShopProductModule|null
     */
    static function getInstance($id,$pdo)
    {
        $pdo = new \PDO('db:mysql;host:127.0.0.1','root','123456');
        $SQL = "select * from products where id=?";
        $stmt = $pdo->prepare($SQL);
        $result = $stmt->execute([$id]);
        $row = $result->fetch();

        if(empty($row))return null;

        if($row['type'] == 'book'){
            $product = new BookProductModule($row['title'],$row['first_name'],$row['main_name'],$row['price'],$row['num_pages']);
        }else if($row['type'] == 'cd'){
            $product = new CdProductModule($row['title'],$row['first_name'],$row['main_name'],$row['price'],$row['play_length']);
        }else{
            $product = new ShopProductModule($row['title'],$row['first_name'],$row['main_name'],$row['price']);
        }
        $product->setID($row['id']);
        $product->setDiscount($row['discount']);
        return $product;
    }

    function getPrice()
    {
        // TODO: Implement getPrice() method.
    }
}