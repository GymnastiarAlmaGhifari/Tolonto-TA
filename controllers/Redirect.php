<?php
class Redirect
{

  public static function to($lokasi)
  {
    header('Location:' . $lokasi . '.php');
  }
}
