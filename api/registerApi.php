<?php
header("Content-Type: application/json");

require_once "../core/init.php";

$json = file_get_contents('php://input');
$data = json_decode($json);

$userId = $data->user_id;
$email = $data->email;
$username = $data->username;
$password = $data->password;
$hp = $data->hp;
$cookies = $data->cookies;
$create_at = $data->create_at;
$update_at = $data->update_at;
$saldo = $data->saldo;
$img = $data->img;

$create_at = date("Y-m-d H:i:s");
$update_at = date("Y-m-d H:i:s");

if ($user->register_api(
    [
        'user_id' => $userId,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'hp' => $hp,
        'cookies' => $cookies,
        'create_at' => $create_at,
        'update_at' => $update_at,
        'saldo' => $saldo,
        'img' => $img
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
