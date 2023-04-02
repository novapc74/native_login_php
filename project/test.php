<?php
function generateSlug(string $string): string
{
    $string = function_exists('mb_strtolower')
        ? mb_strtolower($string)
        : strtolower($string);
    $string = strtr($string, ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => '']);

    return str_replace(' ', '_', $string);
}

function passHash($path)
{
    return password_hash($path, null);
}
function checkPass($hash, $pass)
{
    return password_verify($pass, $hash);
}

//echo generateSlug("test data");

$data =  passHash('это мой пароль');
$res = checkPass($data, 'это мой пароль');
var_dump($res);