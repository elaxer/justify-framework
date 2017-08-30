<?php

function fill_arithmetic_progression($length, $d, $start = 0)
{
    $array = array();
    $array[0] = $start;
    for ($i = 1; $i < $length; $i++) {
        $array[$i] = $array[$i - 1] + $d;
    }
    return $array;
}

function fill_geometric_progression($length, $q, $start = 1)
{
    $array = array();
    $array[0] = $start;
    for ($i = 1; $i < $length; $i++) {
        $array[$i] = $array[$i - 1] * $q;
    }
    return $array;
}

function sum_of_terms_of_IDGP($b1, $q)
{
    return $b1 / (1 - $q);
}

