<?php
// cookie

class Cookie
{
    public static function exists($nama)
    {
        return (isset($_COOKIE[$nama])) ? true : false;
    }

    public static function get($nama)
    {
        return $_COOKIE[$nama];
    }

    public static function set($nama, $nilai, $expiry)
    {
        if (setcookie($nama, $nilai, time() + $expiry, '/')) {
            return true;
        }
        return false;
    }

    public static function delete($nama)
    {
        self::set($nama, '', time() - 1);
    }
}
