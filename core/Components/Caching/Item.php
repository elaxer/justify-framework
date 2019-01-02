<?php

namespace Core\Components\Caching;

use Psr\Cache\CacheItemInterface;

/**
 * Class Item
 *
 * @package Core\Components\Caching
 */
class Item implements CacheItemInterface
{
    private $key = null;
    private $value = null;
    private $isHit = false;
    private $expiresAt = 0;
    private $expiresAfter = 0;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        if (!$this->isHit()) {
            return null;
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isHit()
    {
        return $this->isHit;
    }

    /**
     * @param mixed $value
     * @return static
     */
    public function set($value)
    {
        $this->isHit = true;
        $this->value = $value;

        return $this;
    }

    /**
     * @param \DateTimeInterface|null $expiration
     * @return static
     */
    public function expiresAt($expiration)
    {
        $this->expiresAt = $expiration;

        return $this;
    }

    /**
     * @param \DateInterval|int|null $time
     * @return static
     */
    public function expiresAfter($time)
    {
        $this->expiresAfter = $time;

        return $this;
    }
}
