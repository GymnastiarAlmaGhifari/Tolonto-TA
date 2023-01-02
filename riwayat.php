<?php

require_once 'core/init.php';

$riwayat = new ControllerRiwayat();

$user_data = $user->get_data(Session::get('username'));
$rent = $riwayat->h_rental($_SESSION['loksend']);
$jumlah_rent = $riwayat->jumlah_rent($_SESSION['loksend']);
$sewa = $riwayat->h_sewa($_SESSION['loksend']);
$jumlah_sewa = $riwayat->jumlah_sewa($_SESSION['loksend']);
$service = $riwayat->h_servis($_SESSION['loksend']);
$jumlah_servis = $riwayat->jumlah_servis($_SESSION['loksend']);
$topup = $riwayat->h_topup();
$jumlah_topup = $riwayat->jumlah_topup();


if (!$user->is_login()) {
    Session::flash(
        'login',
        '<script>alert("Anda Harus Login")</script>'
    );
    Redirect::to('login');
}

if (Session::exists('riwayat')) {
    echo Session::flash('riwayat');
}

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Riwayat</title>
</head>

<body>
    <!--loader start  -->
    <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div>
    <!-- loader end -->
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <form action="riwayat.php" method="post">

                <?php
                require_once 'components/main/header.php';
                require_once 'components/main/sidebar.php';
                ?>
            </form>
            <?php require_once 'components/main/modalLogout.php'; ?>
            <?php
            require_once 'components/riwayat/tables/rental.php';
            require_once 'components/riwayat/tables/sewa.php';
            require_once 'components/riwayat/tables/servis.php';
            require_once 'components/riwayat/tables/topup.php';
            ?>

        </div>
    </main>

    <script>
        if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });
    </script>

</body>


</html>