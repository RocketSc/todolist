<?php

namespace Core;

class Settings
{
    private static $registry;

    public static function bind($key, $value)
    {
        self::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (array_key_exists($key, self::$registry)) {
            return self::$registry[$key];
        }

        throw new \Exception('No such key is bound in registry');
    }
}