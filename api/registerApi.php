<?php

require_once "../core/init.php";

$userId = $_POST['user_id'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$cookies = $_POST['cookies'];
$create_at = $_POST['create_at'];
$update_at = $_POST['update_at'];
$saldo = $_POST['saldo'];

$create_at = date("Y-m-d H:i:s");
$update_at = date("Y-m-d H:i:s");

if ($user->register_api(
    [
        'user_id' => $userId,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'cookies' => $cookies,
        'create_at' => $create_at,
        'update_at' => $update_at,
        'saldo' => $saldo,
    ]
)) {
    $response = [
        "status" => "success",
        "message" => "Register Berhasil",
    ];
    echo json_encode($response);
} else {
    $response = [
        "status" => "error",
        "message" => "Register Gagal",
    ];
    echo json_encode($response);
}
