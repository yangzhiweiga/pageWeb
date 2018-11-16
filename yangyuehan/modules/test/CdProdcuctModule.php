<?php
/**
 * @author yzw <yangzhiweiga@163.com>
 * Date: 2018/11/15 14:41
 */
namespace modules\test;

class CdProductModule extends ShopProductModule
{
    private $playLength;

    function __construct($title, $firstName, $mainName, $price,$playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    function getPlayLength()
    {
        return $this->playLength;
    }

    function getSummaryLine()
    {
        $base = "{$this->title}({$this->producerMainName})";
        $base .= "{$this->producerFirstName}";
        $base .= ":playing time - {$this->playLength}";
        return $base;
    }
}