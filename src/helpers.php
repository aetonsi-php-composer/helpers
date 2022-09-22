<?php

if (!function_exists('plaintext')) {
    function plaintext()
    {
        \header('Content-Type: text/plain; charset=UTF-8');
    }
}

if (!function_exists('vd')) {
    function vd()
    {
        $vars = \func_get_args();
        if ($vars) foreach ($vars as $var) \var_dump($var);
        plaintext();
        exit;
    }
}

if (!function_exists('pr')) {
    function pr($arr)
    {
        \print_r($arr);
        plaintext();
        exit;
    }
}
