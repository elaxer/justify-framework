<?php
/**
 * Functions for mathematical operations
 */

/**
 * Field array arithmetic progression
 *
 * @param integer $length length of array
 * @param integer $d arithmetic progression difference
 * @param integer $start the number from which the array begins to fill
 * @return array
 */
function fillArithmeticProgression($length, $d, $start = 0)
{
    $array = [];
    $array[0] = $start;
    for ($i = 1; $i < $length; $i++) {
        $array[$i] = $array[$i - 1] + $d;
    }
    return $array;
}

/**
 * Field array geometric progression
 *
 * @param integer $length length of array
 * @param integer $q denominator of geometric progression
 * @param integer $start the number from which the array begins to fill
 * @return array
 */
function fillGeometricProgression($length, $q, $start = 1)
{
    $array = [];
    $array[0] = $start;
    for ($i = 1; $i < $length; $i++) {
        $array[$i] = $array[$i - 1] * $q;
    }
    return $array;
}

/**
 * Returns sum of terms of infinitely decreasing geometric progression
 *
 * @param integer $b1 the first term of a geometric progression
 * @param integer $q denominator of geometric progression
 * @return int
 */
function sumOfTermsOfIDGP($b1, $q)
{
    if ($q > 0 && $q < 1) {
        return $b1 / (1 - $q);
    }
    return false;

}

/**
 * Returns arithmetic average of array of numbers
 *
 * @param array $numbers array of numbers
 * @param bool $round determines be rounded average or not
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
