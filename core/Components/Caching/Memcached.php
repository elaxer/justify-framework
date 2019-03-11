<?php

namespace Core\Components\Caching;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Class Memcached
 *
 * @package Core\Components\Caching
 */
class Memcached implements CacheItemPoolInterface
{
    /**
     * @var \Memcached
     */
    private $memcached;

    /**
     * @var array
     */
    private $deferred = [];

    /**
     * Memcached constructor.
     *
     * @param array $servers
     */
    public function __construct(array $servers)
    {
        $memcached = new \Memcached();

        foreach ($servers as $server) {
            $memcached->addServer($server['host'], $server['port'], $server['weight'] ?? null);
        }

        $this->memcached = $memcached;
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

        $value = $this->memcached->get($key);

        if ($this->memcached->getResultCode() === \Memcached::RES_NOTFOUND) {
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

        $this->memcached->get($key);

        return $this->memcached->getResultCode() === \Memcached::RES_NOTFOUND;
    }

    /**
     * @return bool
     */
    public function clear()
    {
        return $this->memcached->flush();
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

        return $this->memcached->delete($key);
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

        return $this->memcached->deleteMulti($keys);
    }

    /**
     * @param CacheItemInterface $item
     * @return bool
     */
    public function save(CacheItemInterface $item)
    {
        return $this->memcached->set($item->getKey(), $item->get());
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

        return $this->memcached->setMulti($this->deferred);
    }

    /**
     *
     */
    public function __destruct()
    {
        $this->memcached->quit();
    }
}
