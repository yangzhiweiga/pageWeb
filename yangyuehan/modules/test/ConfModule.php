<?php
/**
 * @author yzw <yangzhiweiga@163.com>
 * Date: 2018/11/16 15:41
 */
namespace modules\test;

use Cross\MVC\Module;

/**
 * @author yzw <yangzhiweiga@163.com>
 * Class ConfModule
 * @package modules\test
 */
class ConfModule extends Module
{
    private $file;
    private $xml;
    private $lastmatch;

    /**
     * ConfModule constructor.
     * @param string $file
     */
    function __construct($file)
    {
        parent::__construct();
        $this->file = $file;
        $this->xml = simplexml_load_file($file);
    }

    function write()
    {
        file_put_contents($this->file,$this->xml->asXML());
    }

    function get($str)
    {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if(count($matches)){
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    function set($key,$value)
    {
        if(!is_null($this->get($key))){
            $this->lastmatch[0] = $value;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item',$value)->addAttribute('name',$key);
    }
}