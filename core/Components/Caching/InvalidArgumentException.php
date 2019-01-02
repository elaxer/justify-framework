<?php

namespace Core\Components\Caching;

use Core\Exceptions\JustifyException;

class InvalidArgumentException extends JustifyException implements \Psr\Cache\InvalidArgumentException
{

}
