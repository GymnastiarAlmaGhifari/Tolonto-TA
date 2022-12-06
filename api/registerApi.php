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
// print_r($data);
// die();

$create_at = date("Y-m-d H:i:s");
$update_at = date("Y-m-d H:i:s");

if ($userapi->register_api(
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
    $kukis = md5(uniqid(rand(), true));
        $userapi->cookie($email, $kukis);
        // set cookie
        Cookie::set('kukis', $kukis, 2592000);
        // set session
        Session::set('login', true);
        // get user data
        $user_data = $userapi->get_data1($email);
        // set response
        $response = [
            "status" => "success",
            "message" => "Register Berhasil",
            "status code" => "200",
            "data" => $user_data,
        ];
        http_response_code(200);
        echo json_encode($response);
    // $response = [
    //     "status" => "success",
    //     "message" => "Register Berhasil",

        
    // ];
} else {
    $response = [
        "status" => "error",
        "message" => "Register Gagal",
        "status code" => "400",
    ];
    http_response_code(400);
    echo json_encode($response);
}
