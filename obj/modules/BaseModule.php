<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/25
 * Time: 22:53
 */

namespace modules;

use Cross\MVC\Module;

class BaseModule extends Module
{
    function __construct($params = '')
    {
        parent::__construct($params);
    }

    /**
     * 过滤数组
     *
     * @param array $postData
     * @param $data
     * @param $tableName
     * @throws \Cross\Exception\CoreException
     */
    function filterPostData(array $postData, &$data, $tableName)
    {
        //SHOW COLUMNS FROM tbl_name [FROM db_name]     //列出资料表字段
        $SQL = "SHOW COLUMNS FROM {$tableName}";
        $res = $this->link->fetchAll($SQL);
        if (!empty($res) && $postData) {
            $res = array_column($res, 'Field');
            if (!empty($res)) {
                foreach ($postData as $key => $value) {
                    if (in_array($key, $res)) {
                        $data[$key] = $value;
                    }
                }
            }
        }
    }
}