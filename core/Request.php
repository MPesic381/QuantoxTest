<?php

namespace App\Core;

class Request
{

    //Getting the parsed uri from a request
    public static function uri() {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    //Returning the requested method
    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }
}