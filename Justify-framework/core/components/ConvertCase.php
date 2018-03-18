<?php

namespace Justify\Components;

/**
 * Class ConvertCase
 *
 * Converts cases
 *
 * @since 2.0
 * @package Justify\Components
 */
class ConvertCase
{
    /**
     * Converts camelCase to snake_case
     *
     * @param string $string converts string
     * @return string
     */
    public static function camelCaseToSnakeCase($string)
    {
        preg_match_all('/[A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+/', $string, $matches);
        foreach ($matches[0] as &$match) {
            $match = strtolower($match);
        }

        return implode('_', $matches[0]);
    }

    /**
     * Converts snake_case to camelCase
     *
     * @param string $string converts string
     * @param bool $studly if studly true then snake case will be converted to StudlyCamelCase
     * @return string
     */
    public static function snakeCaseToCamelCase($string, $studly = false)
    {
        $segments = explode('_', $string);

        if ($studly) {
            foreach ($segments as &$segment) {
                $segment = ucfirst($segment);
            }

            return implode('', $segments);
        }

        $firstSegment = array_shift($segments);
        foreach($segments as &$segment) {
            $segment = ucfirst($segment);
        }
        
        array_unshift($segments, $firstSegment);
        
        return implode('', $segments);
    }
}
