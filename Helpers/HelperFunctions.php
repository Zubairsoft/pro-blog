<?php

function unsetArrayEmptyParam(array $array):array
{
    foreach ($array as $key => $value) {
        if(!isset($array[$key])){

            unset($array[$key]);
        }
    }

    return $array;
}