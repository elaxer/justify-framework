<?php
function translite($string)
{
    $converter = [
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

        'А' => 'A', 'Б' => 'B', 'В' => 'V',
        'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
        'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
        'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
    ];
    return strtr($string, $converter);
}

function leet_translite($string)
{
    $string = mb_strtoupper($string);
    $converter = [
        'А' => '4', 'Б' => '6', 'В' => '8',
        'Г' => 'r', 'Д' => '|)', 'Е' => '3',
        'Ё' => 'Ё', 'Ж' => '}|{', 'З' => '3',
        'И' => '1', 'Й' => 'u*', 'К' => '|<',
        'Л' => '/I', 'М' => '|\/|', 'Н' => '|-|',
        'О' => '0', 'П' => 'n', 'Р' => '|>',
        'С' => '5', 'Т' => '7', 'У' => '`/',
        'Ф' => 'qp', 'Х' => 'X', 'Ц' => 'L|',
        'Ч' => '\'-|', 'Ш' => 'W', 'Щ' => 'W,',
        'Ь' => 'b', 'Ы' => 'bl', 'Ъ' => '`b',
        'Э' => '-)', 'Ю' => '|-0', 'Я' => '9|',
    ];
    return strtr($string, $converter);
}
