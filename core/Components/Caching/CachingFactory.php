<?php

namespace Core\Components\Caching;

class CachingFactory
{
    const NAMESPACE = 'Core\\Components\\Caching\\';

    /**
     * @param $driver
     * @param array $config
     * @return \Psr\Cache\CacheItemPoolInterface
     */
    public static function create($driver, array $config)
    {
        $className = self::NAMESPACE . ucfirst($driver);

        return new $className($config);
    }
}
