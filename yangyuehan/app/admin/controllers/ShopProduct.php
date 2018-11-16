<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/26
 * Time: 8:34
 */
namespace app\admin\controllers;

use Cross\MVC\Controller;

class ShopProduct extends Controller
{
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount = 0;

    /**
     * ShopProduct constructor.
     * @param $title
     * @param $fistName
     * @param $mainName
     * @param $price
     */
    function __construct($title,$fistName,$mainName,$price)
    {
        parent::__construct();
        $this->title = $title;
        $this->producerFirstName = $fistName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    function getProduceFirstName(){
        return $this->producerFirstName;
    }

    function getProduceMainName(){
        return $this->producerMainName;
    }

    function setDiscount($num){
        $this->discount = $num;
    }

    function getDiscount(){
        return $this->discount;
    }

    function getTitle(){
        return $this->title;
    }

    function getPrice(){
        return $this->price-$this->discount;
    }

    function getProducer(){
        return "{$this->producerFirstName}.{$this->producerMainName}";
    }

    function getSummaryLine(){
        $base = "{$this->title}({$this->producerMainName}{$this->producerFirstName})";
        return $base;
    }
}