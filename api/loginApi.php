<?php
header("Content-Type: application/json");
// // require_once "../core/init.php";

// // // login api


// // $email = $_POST['email'];


// // if ($user->is_login1()) {
// //     $user_data = $user->get_data1(Session::get($email));
// //     $response = [
// //         "status" => "success",
// //         "message" => "Anda Sudah Login",
// //         "data" => $user_data,
// //     ];
// // } else {
// //     $response = [
// //         "status" => "error",
// //         "message" => "Anda Belum Login",
// //     ];
// // }

// // echo json_encode($response);


// // // if (Session::exists('login')) {
// // //     echo Session::flash('login');
// // // }

// // //echo json encode cookie value



// // $data = $user->loginApi($email, $password);
require_once "../core/init.php";

$json = file_get_contents('php://input');
// $email = json_decode($_POST, false);
// $password = json_decode($_POST['password'], false);
$data = json_decode($json);
$email = $data->email;
$password = $data->password;




// yang bisa dipakai
if ($user->loginApi($email, $password)) {
    // check cookie

    if (Cookie::exists('kukis')) {
        // set session
        Session::set('login', true);
        // get user data
        $user_data = $user->get_data1($email);
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
        $user->cookie($email, $kukis);
        // set cookie
        Cookie::set('kukis', $kukis, 2592000);
        // set session
        Session::set('login', true);
        // get user data
        $user_data = $user->get_data1($email);
        // set response
        $response = [
            "status" => "success",
            "message" => "Login Berhasil",
            "data" => $user_data,
        ];
        echo json_encode($response);
    }

    //     $response = [
    //         "status" => "success",
    //         "message" => "Login Berhasil",
    //         "data" => $user->get_data1($email),
    //     ];

    //     $user->cookie($email, $token);
    //     Cookie::set('kukis', $token, 3600);

    //     echo json_encode($response);
    // } else {

    //     $response = [
    //         "status" => "error",
    //         "message" => "Login Gagal",
    //     ];
    //     echo json_encode($response);
} else {
    $response = [
        "status" => "Username atau password salah",
        "message" => "Login Gagal",
    ];
    echo json_encode($response);
}
// sampai sini



// cek cookie

// $data = $user->cek_cookie($email);
// if ($data) {
//     $response = [
//         "status" => "success",
//         "message" => "Anda Sudah Login",
//         "data" => $data,
//     ];

//     echo json_encode($response);
// } else {
//     $response = [
//         "status" => "error",
//         "message" => "Anda Belum Login",
//     ];

//     echo json_encode($response);
// }

//  send cookie
// $cookie = $_POST['cookies'];

// $data = $user->sendCookie($cookie);
// if ($data) {
//     $response = [
//         "status" => "success",
//         "data" => $data,
//     ];
//     echo json_encode($response);
// } else {
//     $response = [
//         "status" => "error",
//     ];

//     echo json_encode($response);
// }






// get token from session
// $token = $_POST['token'];
// // check token
// if (Token::check($token)) {
//     // check login
//     if ($user->loginApi($email, $password)) {
//         // set cookie
//         $kukis = md5(uniqid(rand(), true));
//         $user->cookie($email, $kukis);
//         // set cookie
//         Cookie::set('kukis', $kukis, 3600);
//         // set session
//         Session::set('login', true);
//         // get user data
//         $user_data = $user->get_data1($email);
//         // set response
//         $response = [
//             "status" => "success",
//             "message" => "Login Berhasil",
//             "data" => $user_data,
//         ];
//         echo json_encode($response);
//     } else {
//         $response = [
//             "status" => "error",
//             "message" => "Login Gagal",
//             "data" => [],
//         ];
//         echo json_encode($response);
//     }
// } else {
//     $response = [
//         "status" => "error",
//         "message" => "Token Salah",
//         "data" => [],
//     ];
//     echo json_encode($response);
// }

// // $token === Session::get('token');





// if ($user->loginApi($email, $password)) {
//     // check cookie

//     if (Cookie::exists('kukis')) {
//         // set session
//         Session::set('login', true);
//         // get user data
//         $user_data = $user->get_data1($email);
//         // set response
//         $response = [
//             "status" => "success",
//             "message" => "Login Berhasil",
//             "data" => $user_data,
//         ];
//         echo json_encode($response);
//     } else {
//         // set cookie
//         $kukis = md5(uniqid(rand(), true));
//         $user->cookie($email, $kukis);
//         // set cookie
//         Cookie::set('kukis', $kukis, 2592000);
//         // set session
//         Session::set('login', true);
//         // get user data
//         $user_data = $user->get_data1($email);
//         // set response
//         $response = [
//             "status" => "success",
//             "message" => "Login Berhasil",
//             "data" => $user_data,
//         ];
//         echo json_encode($response);
//     }

    //     $response = [
    //         "status" => "success",
    //         "message" => "Login Berhasil",
    //         "data" => $user->get_data1($email),
    //     ];

    //     $user->cookie($email, $token);
    //     Cookie::set('kukis', $token, 3600);

    //     echo json_encode($response);
    // } else {

    //     $response = [
    //         "status" => "error",
    //         "message" => "Login Gagal",
    //     ];
    //     echo json_encode($response);
// } else {
//     $response = [
//         "status" => "Username atau password salah",
//         "message" => "Login Gagal",
//     ];
//     echo json_encode($response);
// }

// echo implode(',', $_COOKIE);





// if ($user->is_login1()) {
//     $user_data = $user->get_data1(Session::get($email));
//     $response = [
//         "status" => "success",
//         "message" => "Anda Sudah Login",
//         "data" => $user_data,
//     ];
// } else {
//     $response = [
//         "status" => "error",
//         "message" => "Anda Belum Login",
//     ];
// }

// echo json_encode($response);
// if (Session::exists('login')) {
//     echo Session::flash('login');
// }

// untuk menampung error


// pengujian cek nama
// if ($user->cek_nama1($email)) {
//     if ($user->loginApi($email, $password)) {
//         Session::set('email', $email);

//         // $user->cookie($email, $kukies);
//     }
// }
// $c = implode(',', $_COOKIE);

// $ck = json_encode($_COOKIE);

// $ckk = serialize($_COOKIE);

// cek cookie berdasarkan tabel user dan row cookie jika ada maka login menggunakan method loginApi jika tidak ada cookie maka membuat cookie baru dengan method cookie 
// if ($user->cek_cookie($email, $c)) {
//     $user->loginApi($email, $password);
//     $user->cookie($email, $c);
//     Session::set('email', $email);
// } else {
//     $user->loginApi($email, $password);
//     $user->cookie($email, $c);
//     Session::set('email', $email);
// }
    
// if ($user->cek_cookie($email,$c)) {
//     $user->loginApi($email, $password);
//     Session::set('email', $email);
//     // $user->cookie($email, $kukies);
// } else {
//     $error[] = "Cookie tidak ditemukan";
// }







// $user->cek_cookie($email, $c);



// $user->cookie($email, $c);
// $user->cookie($email, 'wkwkwkwkwk');
// String json_encode($_COOKIE);
