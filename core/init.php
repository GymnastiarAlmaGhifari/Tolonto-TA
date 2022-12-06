<?php
ob_start();

session_start(); // memulai season


//load kelas
spl_autoload_register(function ($class) {
    require_once 'controllers/' . $class . '.php';
});
// menggunakan spl_autoload_register untuk memanggil semua kelas yang ada di folder controllers

// Controller Web
<<<<<<< HEAD
$user = new ControllerAuth();
=======
$user = new Controllerauth();
>>>>>>> 5633731e67c3c8c3150e1c56ab410f58e564af09
// $Sadmin = new ControllerSuperAdmin();
// $riwayat = new ControllerRiwayat();
// $detail = new ControllerDetail();
// $sewa = new ControllerSewa();
// $SadminUser = new ControllerSuperadminUser();
// $SadminPs = new ControllerSuperadminInventory();

// Controller API
// $userapi = new ControllerAuthApi();
// $sewa = new ControllerSewaApi();
// $feedback = new ControllerFeedbackApi();
// $servis = new ControllerServisApi();
// $payment = new ControllerPaymentApi();
// $order = new ControllerOrderApi();
// $game = new ControllerGameCenterApi();
