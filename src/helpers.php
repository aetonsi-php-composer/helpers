<?php

if (!function_exists('vd')) {
    function vd()
    {
        $vars = \func_get_args();
        if ($vars) {
            foreach ($vars as $var) \var_dump($var);
        }
        exit;
    }
}

if (!function_exists('pr')) {
    function pr($arr)
    {
        \print_r($arr);
        exit;
    }
}
