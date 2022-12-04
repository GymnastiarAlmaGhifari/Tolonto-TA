<?php

class Location
{
    public static function in($slice, $lokasi = "")
    {
        $location = $_SERVER['PHP_SELF'];
        $location = explode('/', $location);
        return $location[$slice] == $lokasi;
    }
}
