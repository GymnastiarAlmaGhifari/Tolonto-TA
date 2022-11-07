<?php

class Input
{

  public static function get($name)
  {
    if (isset($_POST[$name])) {
      return $_POST[$name];
    } else if (isset($_GET[$name])) {
      return $_GET[$name];
    }
    return false;
  }
}
