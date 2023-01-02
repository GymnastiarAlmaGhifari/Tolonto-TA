<?php
require_once 'core/init.php';
$SadminPs = new ControllerSuperadminInventory();

if (!$user->is_login()) {
    Session::flash(
        'login',
        '<script>alert("Anda Harus Login")</script>'
    );
    Redirect::to('login');
}

if (Session::exists('inventory')) {
    echo Session::flash('inventory');
}


$user_data = $user->get_data(Session::get('username'));
$ju_ps = $SadminPs->jumlah_ps($_SESSION['loksend']);
$ju_pssewa = $SadminPs->jumlah_pssewa($_SESSION['loksend']);
$ps = $SadminPs->ps_card($_SESSION['loksend']);
$ps_sewa = $SadminPs->ps_cardsewa($_SESSION['loksend']);

$errors = array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function tambah() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "components/dialogBoxTambah.php", true);
            xmlhttp.send();
        }
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="assets/styles/animation.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inventory</title>
</head>

<body>

    <!--loader start  -->
    <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div>
    <!-- loader end -->

    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <!-- modal insert start -->

            <!-- modal insert end -->
            <!-- header -->
            <form action="inventory.php" method="post">
                <!-- header -->
                <?php require_once 'components/main/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>

            </form>
            <?php require_once 'components/main/modalLogout.php'; ?>
            <!-- list ps -->
            <?php require_once 'components/inventory/lists/rental.php' ?>

            <?php require_once 'components/inventory/lists/sewa.php' ?>

        </div>

    </main>


    <script src="assets/js/main.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });
    </script>

</body>

</html>