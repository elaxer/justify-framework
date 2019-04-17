<?php

namespace Core\Components;

/**
 * Class Bag
 *
 * @since 2.4.3-dev
 * @package Core\Components
 */
class Bag
{
    protected $bag;

    public function get($key, $default = null)
    {
        if (!$this->has($key)) {
            return $default;
        }

        return $this->bag[$key];
    }

    public function set($key, $value)
    {
        return $this->bag[$key] = $value;
    }

    public function multiSet($keysValues)
    {
        foreach ($keysValues as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function has($key)
    {
        return isset($this->bag[$key]);
    }

    public function delete($key)
    {
        unset($this->bag[$key]);

        return $this;
    }

    public function getBag()
    {
        return $this->bag;
    }

    public function setBag($bag)
    {
        $this->bag = $bag;

        return $this;
    }
}
