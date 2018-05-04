<?php
/**
 * mysql
 */
$mysql_link = array(
    'host' => '127.0.0.1',
    'port' => '3306',
    'user' => 'root',
    'pass' => '123456',
    'prefix' => '',
    'charset' => 'utf8',
);

/**
 * redis
 */
$redis_link = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'pass' => '',
    'timeout' => 2.5
);

#默认数据库配置
$db = $mysql_link;
$db['name'] = 'crossphp';


// 缓存
$cache = $redis_link;
$cache['db'] = 'localhost';

// 队列
$queue = $redis_link;
$queue['db'] = 'localhost';


return array(
    'mysql' => array(
        'db' => $db,
    ),
    'redis' =>  array(
        'cache' =>  $cache,
        'queue' =>  $queue,
    ),
);
