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
     * Doctrine\Common\Cache\Cache
     */
    protected $cache;
    /**
     * 设置缓存驱动
     */
    public function setCache(\Doctrine\Common\Cache\Cache $cache)
    {
        $this->cache = $cache;
    }
    /**
     * 获取缓存驱动
     */
    public function getCache()
    {
        return $this->cache;
    }
}