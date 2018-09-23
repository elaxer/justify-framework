<?php

namespace Core;

interface FactoryInterface
{
    public static function create(string $className, array $params = []);
}
