<?php
namespace OCAP\InstantMessaging\Bride;
/**
 * 缓存辅助类
 * Trait CacheTrait
 * @package OCAP\InstantMessaging\Bride
 */
trait CacheTrait
{
    /**
     * @var \Doctrine\Common\Cache\Cache
     */
    protected $cache = null;

    /**
     * 设置缓存驱动
     * @param \Doctrine\Common\Cache\Cache $cache
     */
    public function setCache(\Doctrine\Common\Cache\Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * 获取缓存驱动
     * @return \Doctrine\Common\Cache\Cache
     * @throws \Exception
     */
    public function getCache()
    {
        if($this -> cache === null){
            throw new \Exception('请先设置缓存驱动');
        }
        return $this->cache;
    }
}