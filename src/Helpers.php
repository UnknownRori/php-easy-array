<?php

use UnknownRori\EasyArray\EasyArray;

if(!function_exists('EasyArr')){
    function EasyArr($data)
    {
        return new EasyArray($data);
    }
}