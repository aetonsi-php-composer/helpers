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
        plaintext();
        $dbbt = \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
        echo "{ $dbbt[file]:$dbbt[line] }\n";
        foreach (\func_get_args() as $var) \var_dump($var);
        exit;
    }
}

if (!function_exists('pr')) {
    function pr($arr)
    {
        plaintext();
        $dbbt = \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
        echo "{ $dbbt[file]:$dbbt[line] }\n";
        \print_r($arr);
        exit;
    }
}
