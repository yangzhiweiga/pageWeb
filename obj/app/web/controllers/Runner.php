<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/26
 * Time: 12:00
 */

namespace app\web\controllers;

use Cross\MVC\Controller;

/**
 * Class Runner
 * @package app\web\controllers
 */
    class Runner extends Controller
{
    /**
     * init
     */
    static function init()
    {
        try {
            $conf = new Conf(dirname(__FILE__) . "/conf01.xml");
            print "user:{$conf->get('user')}\n";
            print "host:{$conf->get('host')}\n";
            $conf->set("pass", "new")->write();
        } catch (FileException $e) {
            //文件权限问题
            print_r($e->getMessage());
        } catch (XmlException $e) {
            //XML文件损坏
            print_r($e->getMessage());
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}