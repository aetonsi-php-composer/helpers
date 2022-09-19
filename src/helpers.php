<?php

if (!function_exists('vd')) {
    function vd(mixed ...$vars): void
    {
        $vars && var_dump(...$vars);
        exit;
    }
}

if (!function_exists('pr')) {
    function pr(array $var): void
    {
        print_r($var);
        exit;
    }
}
