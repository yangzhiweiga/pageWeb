<?php
/**
 * @author yzw <yangzhiweiga@163.com>
 * Date: 2018/11/16 15:26
 */
namespace modules\test;

abstract class DomainObjectModule
{
    private $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }

    public static function create()
    {
        return new static();
    }

    public static function getGroup()
    {
        return "default";
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
    }
}