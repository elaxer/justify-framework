<?php

namespace Justify\Modules;

class Math
{
    /**
     * Field array arithmetic progression
     *
     * @param integer $length length of array
     * @param integer $d arithmetic progression difference
     * @param integer $start the number from which the array begins to fill
     * @return array
     */
    public function fillArithmeticProgression($length, $d, $start = 0)
    {
        $array = [$start];
        
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
    public function fillGeometricProgression($length, $q, $start = 1)
    {
        $array = [$start];

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
    public function sumOfTermsOfIDGP($b1, $q)
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
    public function average($numbers)
    {
        $sumOfNumbers = 0;

        foreach ($numbers as $number) {
            $sumOfNumbers += $number;
        }

        return $sumOfNumbers / count($numbers);
    }

    /**
     * Checks number to even
     * 
     * If number even then will be return true
     * else will be return false
     * 
     * @param int $number checks number
     * @return boolean
     */
    public function isEven($number)
    {
        return $number % 2 == 0 ? true : false;
    }

    /**
     * Checks number to odd
     * 
     * If number odd then will be return true
     * else will be return false
     * 
     * @param int $number checks number
     * @return boolean
     */
    public function isOdd($number)
    {
        return $number % 2 != 0 ? true : false;
    }
}
