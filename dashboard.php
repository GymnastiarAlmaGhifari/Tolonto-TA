<?php
require_once 'core/init.php';

if (!$user->is_login()) {
    Session::flash('login', '<script>alert("Anda Harus Login")</script>');
    Redirect::to('login');
}

if (Session::exists('dashboard')) {
    echo Session::flash('dashboard');
}

if (Input::get('nama')) {
    $user_data = $user->get_data(Input::get('nama'));
} else {
    $user_data = $user->get_data(Session::get('username'));
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="assets/styles/animation.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <?php require_once 'components/main/header.php'; ?>
    <?php require_once 'components/main/sidebar.php'; ?>

    <!-- fungsi multi level user       -->
</body>

</html>



<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Dashboard</title>
</head>

<body>
    <h1 class="text-teriary_900 text-2xl m-7 bg-primary_500">this is dashboard</h1>
</body>

</html> -->