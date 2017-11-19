<?php

namespace Justify\Modules;

use Justify\Exceptions\InvalidArgumentException;

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
     * @return int|float
     */
    public function average($numbers)
    {
        try {
            if (!is_array($numbers)) {
                throw new InvalidArgumentException('array', gettype($numbers));
            }

            $sumOfNumbers = 0;

            foreach ($numbers as $number) {
                $sumOfNumbers += $number;
            }

            return $sumOfNumbers / count($numbers);
        } catch (InvalidArgumentException $e) {
            $e->printError();
        }
    }

    /**
     * Checks number to even
     * 
     * If number even then will be return true
     * else will be return false
     * 
     * @param number $number checks number
     * @return boolean
     */
    public function isEven($number)
    {
        try {
            if (!is_numeric($number)) {
                throw new InvalidArgumentException('number', gettype($number));
            }

            return $number % 2 == 0 ? true : false;
        } catch (InvalidArgumentException $e) {
            $e->printError();
        }
    }

    /**
     * Checks number to odd
     * 
     * If number odd then will be return true
     * else will be return false
     * 
     * @param number $number checks number
     * @return boolean
     */
    public function isOdd($number)
    {
        try {
            if (!is_numeric($number)) {
                throw new InvalidArgumentException('number', gettype($number));
            }

            return $number % 2 != 0 ? true : false;
        } catch (InvalidArgumentException $e) {
            $e->printError();
        }
    }
}
