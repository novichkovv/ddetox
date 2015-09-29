<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 05.03.15
 * Time: 21:35
 */
class registry
{
    /**
     * @var array
     */
    protected static $registry = [];

    /**
     * @param string $key
     * @param mixed $item
     * @return void
     */

    public static function set($key, $item)
    {
        if(!array_key_exists($key, self::$registry)) {
            self::$registry[$key] = $item;
        }
    }

    /**
     * @param string $key
     * @return mixed|false
     */

    public static function get($key)
    {
        if(array_key_exists($key, self::$registry)) {
            return self::$registry[$key];
        } else {
            return false;
        }
    }

    /**
     * @param string $key
     * return void
     */

    public static function remove($key)
    {
        if(array_key_exists($key, self::$registry)) {
            unset(self::$registry[$key]);
        }
    }

    /**
     * return void
     */

    public static function print_registry()
    {
        print_r(self::$registry);
    }

    protected function __construct() {}
}