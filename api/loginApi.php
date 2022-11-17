<?php
header("Content-Type: application/json");
// // require_once "../core/init.php";

// // // login api





// // $data = $userapi->loginApi($email, $password);
require_once "../core/init.php";

$json = file_get_contents('php://input');
// $email = json_decode($_POST, false);
// $password = json_decode($_POST['password'], false);
$data = json_decode($json);
$email = $data->email;
$password = $data->password;




// yang bisa dipakai
if ($userapi->loginApi($email, $password)) {
    // check cookie

    if (Cookie::exists('kukis')) {
        // set session
        Session::set('login', true);
        // get user data
        $user_data = $userapi->get_data1($email);
        // set response
        $response = [
            "status" => "success",
            "message" => "Login Berhasil",
            "data" => $user_data,
        ];
        echo json_encode($response);
    } else {
        // set cookie
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
            "message" => "Login Berhasil",
            "data" => $user_data,
        ];
        echo json_encode($response);
    }


} else {
    $response = [
        "status" => "Username atau password salah",
        "message" => "Login Gagal",
    ];
    echo json_encode($response);
}
// sampai sini



