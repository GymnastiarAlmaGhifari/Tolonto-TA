<?php
require_once '../core/init.php';

class Session
{

  public static function exists($nama)
  {
    // if else terrnary operator
    return (isset($_SESSION[$nama])) ? true : false;
  }

  public static function set($nama, $nilai)
  {
    return $_SESSION[$nama] = $nilai;
  }
  public static function get($nama)
  {
    return $_SESSION[$nama];
  }

  public static function flash($nama, $pesan = '')
  {
    if (self::exists($nama)) {
      $session = self::get($nama);
      self::delete($nama);
      return $session;
    } else {
      self::set($nama, $pesan);
    }
  }

  public static function delete($nama)
  {
    if (self::exists($nama)) {
      unset($_SESSION[$nama]);
    }
  }
}
