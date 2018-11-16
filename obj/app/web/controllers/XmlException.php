<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/26
 * Time: 11:48
 */

namespace app\web\controllers;


use Throwable;

class XmlException extends \Exception
{
    private $error;

    function __construct(\LibXMLError $error)
    {
        $shortFile = basename($error->file);
        $msg = "[{$shortFile},line{$error->line},col{$error->column}{$error->message}]";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }

    function getLibXmlError()
    {
        return $this->error;
    }
}