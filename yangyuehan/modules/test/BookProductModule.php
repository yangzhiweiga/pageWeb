<?php
/**
 * @author yzw <yangzhiweiga@163.com>
 * Date: 2018/11/15 14:47
 */
namespace modules\test;

class  BookProductModule extends ShopProductModule
{
    private $numPages;
    function __construct($title, $firstName, $mainName, $price,$numPages)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

    function getNumberOfPages()
    {
        return $this->numPages;
    }

    function getSummaryLine()
    {
        $base = "$this->title ($this->producerMainName)";
        $base .= "$this->producerFirstName";
        $base .= ":page count - $this->numPages";
        return $base;
    }
}