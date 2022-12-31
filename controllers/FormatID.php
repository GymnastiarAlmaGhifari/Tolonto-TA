<?php

class FormatID
{
    public static function convert($id) 
    {
        //convert from 40fad901-127d-4b32-98cc-4adab5882d5a to 40fad901127d4b3298cc4adab5882d5a
        $sid = str_replace('-', '', $id);
        return $sid;
        
    }  
}
