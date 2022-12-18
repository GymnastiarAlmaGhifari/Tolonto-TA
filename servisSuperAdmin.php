<?php
require_once 'core/init.php';

$servis = new ControllerServis();

$service = $servis->h_servis($_SESSION['loksend']);
$jumlah_servis = $servis->jumlah_servis($_SESSION['loksend']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link rel="stylesheet" href="assets/styles/animation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Servis SuperAdmin</title>
</head>

<body>
    <!--loader start  -->
    <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div>
    <!-- loader end -->
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <form action="servisSuperAdmin.php" method="post">
                <!-- header -->
                <?php require_once 'components/main/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>
            </form>
            <?php require_once 'components/servissuper/tables/servis.php'; ?>

            <!-- <div class="w-20 h-20 bg-neutral_050">
                    <button class="btn btn-ghost">
                        <h1>iawjdiajdoaiijoaijdawoj</h1>
                    </button>
                </div> -->

        </div>
    </main>
    <script>
        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });
    </script>

</body>

</html>