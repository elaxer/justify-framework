<?php

namespace Core\Components\Caching;

use Core\Exceptions\JustifyException;
use \Psr\Cache\InvalidArgumentException as InvalidArgumentExceptionInterface;

class InvalidArgumentException extends JustifyException implements InvalidArgumentExceptionInterface
{
}
