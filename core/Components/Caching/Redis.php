<?php

namespace Core\Components\Caching;

use Predis\Client;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

class Redis implements CacheItemPoolInterface
{
    /**
     * @var Client
     */
    private $redis;

    /**
     * @var array
     */
    private $deferred = [];

    /**
     * Memcached constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $redis = new Client([
            'scheme' => $config['scheme'],
            'host' => $config['host'],
            'port' => $config['port'],
        ]);

        $this->redis = $redis;
    }

    /**
     * @param string $key
     *
     * @throws InvalidArgumentException
     * @return \Psr\Cache\CacheItemInterface
     */
    public function getItem($key)
    {
        if (!is_string($key) || mb_strlen($key) === 0) {
            throw new InvalidArgumentException();
        }

        if (isset($this->deferred[$key])) {
            return $this->deferred[$key];
        }

        $value = $this->redis->get($key);

        if ($value == null) {
            return new Item($key);
        }

        $item = new Item($key);
        return $item->set($value);
    }

    /**
     * @param array $keys
     * @throws InvalidArgumentException
     * @return array|\Traversable
     */
    public function getItems(array $keys = [])
    {
        $items = [];

        foreach ($keys as $key) {
            $items[] = $this->getItem($key);
        }

        return $items;
    }

    /**
     * @param string $key
     * @throws InvalidArgumentException
     * @return bool
     */
    public function hasItem($key)
    {
        if (!is_string($key) || mb_strlen($key) === 0) {
            throw new InvalidArgumentException();
        }

        return boolval($this->redis->exists($key));
    }

    /**
     * @return bool
     */
    public function clear()
    {
        return $this->redis->flushdb();
    }

    /**
     * @param string $key
     * @throws InvalidArgumentException
     * @return bool
     */
    public function deleteItem($key)
    {
        if (!is_string($key) || mb_strlen($key) === 0) {
            throw new InvalidArgumentException();
        }

        return $this->redis->del([$key]);
    }

    /**
     * @param array $keys
     * @throws InvalidArgumentException
     * @return bool
     */
    public function deleteItems(array $keys)
    {
        foreach ($keys as $key) {
            if (!is_string($key) || mb_strlen($key) === 0) {
                throw new InvalidArgumentException();
            }
        }

        return $this->redis->del($keys);
    }

    /**
     * @param CacheItemInterface $item
     * @return bool
     */
    public function save(CacheItemInterface $item)
    {
        return $this->redis->set($item->getKey(), $item->get());
    }

    /**
     * @param CacheItemInterface $item
     * @return bool
     */
    public function saveDeferred(CacheItemInterface $item)
    {
        $this->deferred[$item->getKey()] = $item;

        return true;
    }

    /**
     * @return bool
     */
    public function commit()
    {
        $data = [];

        foreach ($this->deferred as $key => $item) {
            $data[$key] = $item->get();

            unset($this->deferred[$key]);
        }

        return $this->redis->setMulti($this->deferred);
    }

    /**
     *
     */
    public function __destruct()
    {
        $this->redis->quit();
    }
}
