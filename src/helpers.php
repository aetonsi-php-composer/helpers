<?php


if (!function_exists('plaintext')) {
    /**
     * Sets the content type to plain text.
     */
    function plaintext()
    {
        \header('Content-Type: text/plain; charset=UTF-8');
    }
}


if (!function_exists('vd')) {
    /**
     * var_dumps all the given arguments, then terminates the program. Also prints the callee's file/function/line.
     *
     * @param ...mixed variables
     */
    function vd()
    {
        @plaintext(); // as this is just an helper function, silence possible "header already sent" warnings
        $dbbt = \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
        echo "{ $dbbt[file] @ $dbbt[function]():$dbbt[line] }\n";
        foreach (\func_get_args() as $var) \var_dump($var);
        exit;
    }
}


if (!function_exists('pr')) {
    /**
     * print_rs all the given arguments, then terminates the program. Also prints the callee's file/function/line.
     *
     * @param ...mixed arrays
     */
    function pr()
    {
        @plaintext(); // as this is just an helper function, silence possible "header already sent" warnings
        $dbbt = \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
        echo "{ $dbbt[file] @ $dbbt[function]():$dbbt[line] }\n";
        foreach (\func_get_args() as $var) \print_r($var);
        exit;
    }
}
