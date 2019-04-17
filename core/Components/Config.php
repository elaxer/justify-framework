<?php

namespace Core\Components;

/**
 * Class Config
 *
 * @since 2.4.3-dev
 * @package Core\Components
 */
class Config extends Bag
{
    public function __construct(array $config)
    {
        $this->setBag($config);
    }
}
