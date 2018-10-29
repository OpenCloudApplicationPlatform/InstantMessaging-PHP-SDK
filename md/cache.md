### 缓存

SDK 使用 ``doctrine/cache`` 作为缓存组件，该组件包含多种缓存驱动，开发者可以自由选择。

Filesystem

```php
$cacheDriver = new \Doctrine\Common\Cache\FilesystemCache('./cacheDir');
```

APC

```php
$cacheDriver = new \Doctrine\Common\Cache\ApcCache();
```

Memcache

```php
$memcache = new Memcache();
$memcache->connect('127.0.0.1', 11211);

$cacheDriver = new \Doctrine\Common\Cache\MemcacheCache();
$cacheDriver->setMemcache($memcache);
```

Mamcached

```php
$memcached = new Memcached();
$memcached->addServer('127.0.0.1', 11211);

$cacheDriver = new \Doctrine\Common\Cache\MemcachedCache();
$cacheDriver->setMemcached($memcached);
```

Xcache

```php
$cacheDriver = new \Doctrine\Common\Cache\XcacheCache();
```

Redis

```php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$cacheDriver = new \Doctrine\Common\Cache\RedisCache();
$cacheDriver->setRedis($redis);
```
