<?php
/**
 * Cross - a micro PHP 5 framework
 *
 * @link        http://www.crossphp.com
 * @license     MIT License
 */
namespace Cross\Cache\Driver;

use Cross\Exception\CoreException;
use Cross\I\CacheInterface;
use Cross\Core\Helper;

/**
 * @Auth: wonli <wonli@live.com>
 * Class FileCacheDriver
 * @package Cross\Cache\Driver
 */
class FileCacheDriver implements CacheInterface
{
    /**
     * 缓存配置
     *
     * @var array
     */
    private $config;

    /**
     * 缓存文件路径
     *
     * @var string
     */
    private $cache_file;

    /**
     * 过期时间
     *
     * @var int
     */
    private $expire_time;

    function __construct(array $cache_config)
    {
        $this->setConfig($cache_config);
        if (empty($cache_config['cache_path']) || empty($cache_config['key'])) {
            throw new CoreException('请指定缓存文件路径和缓存key');
        }

        $this->cache_file = $cache_config['cache_path'] . DIRECTORY_SEPARATOR . $cache_config['key'];
        $this->expire_time = isset($cache_config ['expire_time']) ? $cache_config ['expire_time'] : 3600;
    }

    /**
     * 如果缓存文件不存在则创建
     */
    function init()
    {
        if (!file_exists($this->cache_file)) {
            Helper::mkfile($this->cache_file);
        }
    }

    /**
     * 返回缓存文件
     *
     * @param string $key
     * @return mixed
     */
    function get($key = '')
    {
        if (file_exists($this->cache_file)) {
            return file_get_contents($this->cache_file);
        }

        return false;
    }

    /**
     * 检查是否有效
     *
     * @return bool
     */
    function isValid()
    {
        if (!file_exists($this->cache_file)) {
            return false;
        } elseif ((time() - filemtime($this->cache_file)) < $this->expire_time) {
            return true;
        }

        return false;
    }

    /**
     * 保存缓存
     *
     * @param $key
     * @param $value
     * @return mixed|void
     */
    function set($key, $value)
    {
        if (null == $key) {
            $key = $this->cache_file;
            if (!file_exists($key)) {
                $this->init();
            }
        }

        file_put_contents($key, $value, LOCK_EX);
    }

    /**
     * 设置配置
     *
     * @param array $config
     * @return mixed
     */
    function setConfig(array $config = array())
    {
        $this->config = $config;
    }

    /**
     * 获取缓存配置
     *
     * @return mixed
     */
    function getConfig()
    {
        return $this->config;
    }
}
