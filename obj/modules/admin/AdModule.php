<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/25
 * Time: 14:50
 */

namespace modules\admin;

use Cross\Core\Helper;

class AdModule extends AdminModule
{
    protected $t = 'ad';
    static protected $ins = null;

    function __construct($params = '')
    {
        parent::__construct($params);
    }

    static function getInstance()
    {
        if (self::$ins instanceof self) {
            return self::$ins;
        }

        self::$ins = new self;
        return self::$ins;
    }

    function getTableName()
    {
        return $this->t;
    }

    /**
     * @param array $postData
     * @return mixed
     * @throws \Cross\Exception\CoreException
     */
    function filterAdPostData(array $postData)
    {
        $this->filterPostData($postData, $data, $this->t);
        return $data;
    }

    /**
     * @param $data
     * @return bool|mixed
     * @throws \Cross\Exception\CoreException
     */
    function add($data){
        return $this->link->add($this->t,$data);
    }

    /**
     * @param $postData
     * @return array|string
     * @throws \Cross\Exception\CoreException
     */
    function checkPostData($postData){
        foreach($postData as $key=>$value){
            switch ($key){
                case 'ad_name':
                    $res = Helper::isChinese($value);
                    if(!$res){
                        return $this->result(500001);
                    }
            }
        }
        return $this->result(1);
    }

    function getAdList(){
        return $this->link->getAll($this->t,"*");
    }

}