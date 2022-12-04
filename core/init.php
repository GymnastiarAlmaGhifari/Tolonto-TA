<?php
ob_start();

session_start(); // memulai season


//load kelas
spl_autoload_register(function ($class) {
    require_once '../controllers/' . $class . '.php';
});
// menggunakan spl_autoload_register untuk memanggil semua kelas yang ada di folder controllers

// Controller Web
$user = new ControllerAuth();
$Sadmin = new ControllerSuperAdmin();
$riwayat = new ControllerRiwayat();
$detail = new ControllerDetail();
$sewa = new ControllerSewa();
$SadminUser = new ControllerSuperadminUser();

// Controller API
$userapi = new ControllerAuthApi();
$sewa = new ControllerSewaApi();
$feedback = new ControllerFeedbackApi();
$servis = new ControllerServisApi();
$payment = new ControllerPaymentApi();
$order = new ControllerOrderApi();
$game = new ControllerGameCenterApi();
