<?php
/**
 * Functions for mathematical operations
 */

/**
 * Field array arithmetic progression
 * @return array
 */
function fillArithmeticProgression($length, $d, $start = 0)
{
    $array = array();
    $array[0] = $start;
    for ($i = 1; $i < $length; $i++) {
        $array[$i] = $array[$i - 1] + $d;
    }
    return $array;
}

/**
 * Field array geometric progression
 * @return array
 */
function fillGeometricProgression($length, $q, $start = 1)
{
    $array = array();
    $array[0] = $start;
    for ($i = 1; $i < $length; $i++) {
        $array[$i] = $array[$i - 1] * $q;
    }
    return $array;
}

/**
 * Returns sum of terms of infinitely decreasing geometric progression
 * @return int
 */
function sumOfTermsOfIDGP($b1, $q)
{
    return $b1 / (1 - $q);
}

/**
 * Returns arifmetic average of array of numbers
 * @return int|float
 */
function average($numbers, $round = false)
{
    
    $sumOfNumbers = 0;
    foreach ($numbers as $number) {
        $sumOfNumbers += $number;
    }

    if ($round === true) {
        return round($sumOfNumbers / count($numbers));
    } else {
        return $sumOfNumbers / count($numbers);
    } 
}
