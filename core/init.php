<?php

session_start(); // memulai season


//load kelas
spl_autoload_register(function ($class) {
    require_once '../controllers/' . $class . '.php';
});
// menggunakan spl_autoload_register untuk memanggil semua kelas yang ada di folder controllers

$user = new Controller();
$Sadmin = new ControllerSuperAdmin();