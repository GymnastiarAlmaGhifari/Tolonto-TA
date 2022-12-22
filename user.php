<?php

require_once "core/init.php";
$SadminUser = new ControllerSuperadminUser();

$user_data = $user->get_data(Session::get('username'));

$ju = $SadminUser->jumlah_user();
$ja = $SadminUser->jumlah_admin();
$tb_admin = $SadminUser->table_admin();
$tb_user = $SadminUser->table_user();
$lokasi = $SadminUser->lokasi();

if (!$user->is_login()) {
    Session::flash(
        'login',
        '<script>alert("Anda Harus Login")</script>'
    );
    Redirect::to('login');
}

if (Session::exists('user')) {
    echo Session::flash('user');
}



// while loop if img name doesnt exist in database then delete img


// make method get_data from user_data
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link rel="stylesheet" href="assets/styles/animation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <!--loader start  -->
    <!-- <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div> -->
    <!-- loader end -->
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <?php require_once 'components/main/header.php'; ?>
            <form action="user.php" method="post">
                <!-- header -->
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>
            </form>
            <?php
            require_once 'components/user/tables/user.php'; ?>
            <?php if ($user_data['username'] == Session::get('username')) { ?>
                <?php if ($user->is_superAdmin(Session::get('username'))) { ?>
                    <?php require_once 'components/user/tables/admin.php'; ?>
                <?php } ?>
            <?php } ?>
        </div>
    </main>

    <script>
        const table_admin = document.getElementById('table-admin');
        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });
    </script>
    <?php require_once 'components/main/modalLogout.php'; ?>

</body>


</html>