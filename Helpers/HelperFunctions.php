<?php

function unsetArrayEmptyParam(array $array): array
{
    foreach ($array as $key => $value) {
        if (!isset($array[$key])) {

            unset($array[$key]);
        }
    }

    return $array;
}

function generateOtp(): int
{
    return random_int(100000, 999999);
}
