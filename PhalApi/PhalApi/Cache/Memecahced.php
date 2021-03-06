<?php
/**
 * PhalApi_Cache_Memecahced MC缓存
 *
 * - 使用序列化对需要存储的值进行转换，以提高速度
 *
 * @package     PhalApi\Cache
 * @license     http://www.phalapi.net/license
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2014-11-14
 */

class PhalApi_Cache_Memecahced implements PhalApi_Cache {

    protected $memcached = null;

    protected $prefix;

    /**
     * @param string $config['host'] Memcache域名
     * @param int $config['port'] Memcache端口
     * @param string $config['prefix'] Memcache key prefix
     */
    public function __construct($config) {
        $this->memcached = new Memcached();
        $this->memcached->addServer($config['host'], $config['port']);
	
	$this->prefix = isset($config['prefix']) ? $config['prefix'] : 'phalapi_';
    }

    public function set($key, $value, $expire = 600) {
        $this->memcached->set($this->formatKey($key), @serialize($value), $expire);
    }

    public function get($key) {
		$value = $this->memcached->get($this->formatKey($key));
        return $value !== FALSE ? @unserialize($value) : NULL;
    }

    public function delete($key) {
        return $this->memcached->delete($this->formatKey($key));
    }

    protected function formatKey($key) {
		return $this->prefix . $key;
    }
}
