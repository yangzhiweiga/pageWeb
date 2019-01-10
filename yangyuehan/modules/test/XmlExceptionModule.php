<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/11/16
 * Time: 22:58
 */
namespace modules\test;

use Couchbase\Exception;

class XmlExceptionModule extends Exception
{
    private $error;

    function __construct(\LibXMLError $error)
    {
        $short_file = basename($error->file);
        $msg = "[{$short_file},line{$error->line},col {$error->column} {$error->message}]";
        parent::__construct($msg, $error->code);
    }

    function getLibXmlError()
    {
        return $this->error;
    }
}