<?php

namespace PG\Tools;

use Nette\Object;

class Helpers extends Object
{
    public static function loader($helper)
    {
        if (method_exists(__CLASS__, $helper))
            return call_user_func_array(__CLASS__ . "::$helper", array_slice(func_get_args(), 1));
        else
            return NULL;
    }

    public static function uvpg($string)
    {
        return "\"$string\"";
    }
}