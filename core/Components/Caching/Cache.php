<?php

namespace Core\Components\Caching;

use Core\Justify;

class Cache
{
    public function get($key)
    {
        return Justify::$container->get('cache_psr6')->getItem($key)->get();
    }

    public function set($key, $value)
    {
        $item = new Item($key);
        $item->set($value);

        Justify::$container->get('cache_psr6')->save($item);
    }

    public function has($key)
    {
        return Justify::$container->get('cache_psr6')->hasItem($key);
    }

    public function delete($key)
    {
        return Justify::$container->get('cache_psr6')->deleteItem($key);
    }

    public function flush()
    {
        return Justify::$container->get('cache_psr6')->clear();
    }
}
