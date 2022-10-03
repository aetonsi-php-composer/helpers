<?php


if (!function_exists('jsonapplication')) {
    /**
     * Sets the content type to json application.
     */
    function jsonapplication()
    {
        \header('Content-Type: application/json; charset=UTF-8');
    }
}


if (!function_exists('plaintext')) {
    /**
     * Sets the content type to plain text.
     */
    function plaintext()
    {
        \header('Content-Type: text/plain; charset=UTF-8');
    }
}


if (!function_exists('je')) {
    /**
     * json_encodes $data, and returns it if $return===true, else it prints it.
     *
     * @param mixed $data
     * @return string|false|never
     */
    function je($data, $return = false)
    {
        $result = @\json_encode($data, \JSON_UNESCAPED_UNICODE);
        if (!$return) {
            @jsonapplication();
            echo defne($result, ''); // if $result is false, print nothing
            exit;
        } else {
            return $result;
        }
    }
}


if (!function_exists('trace')) {
    /**
     * Prints or returns ($return===true) a json_encoded representation of the stack trace (and terminates the program if $return===false).
     */
    function trace($ignoreArgs = false, $limit = 0)
    {
        je(\debug_backtrace(($ignoreArgs ? \DEBUG_BACKTRACE_IGNORE_ARGS : 0), $limit));
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


if (!function_exists('def')) {
    /**
     * Returns $var if it's set, else returns $default.
     * PLEASE NOTE: call this with the \@ operator for array keys/object vars that might not exist!
     * For example: echo @def($_SERVER['test'], 123);
     */
    function def($var, $default = null)
    {
        return isset($var) ? $var : $default;
    }
}


if (!function_exists('defne')) {
    /**
     * Returns $var if it's set AND not empty, else returns $default.
     * PLEASE NOTE: call this with the \@ operator for array keys/object vars that might not exist!
     * For example: echo @defne($_SERVER['test'], 123);
     */
    function defne($var, $default = null)
    {
        return isset($var) && !empty($var) ? $var : $default;
    }
}
