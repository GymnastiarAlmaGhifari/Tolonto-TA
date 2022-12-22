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

if (isset($_POST['Konfirmasi-rental'])) {

    switch ($_SESSION['loksend']) {
        case 'Bojonegoro':
            $lok = 'bjn';
            break;
        case 'Babat':
            $lok = 'bbt';
            break;
        case 'Tuban':
            $lok = 'tbn';
            break;
    }

    $id_ps = $SadminPs->idps($lok);
    $namaFile = $_FILES['image-rental']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-rental']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    // create folder if not exist
    if (!file_exists('img/ps')) {
        mkdir('img/ps', 0777, true);
    }
    $dirUpload = "img/ps/";
    // genearete datetimestamp
    $filename = $id_ps . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
        echo "Link: <a href='" . $dirUpload . $filename . "'>" . $filename . "</a>";
        if ($SadminPs->add_rental(
            [
                'id_ps' => $id_ps,
                'nama_ps' => $_POST['nama-ps-rental'],
                'harga' => Rupiah::clear($_POST['harga-ps-rental']),
                'status' => 'tidak aktif',
                'lok' => $_SESSION['loksend'],
                'jenis' => $_POST['kategori-ps-rental'],
                'img' => $dirUpload . $filename
            ]
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventory.php'</script>";
        } else {
        }
    } else {
    }
}

if (isset($_POST['Konfirmasi-rental-edit'])) {

    $namaFile = $_FILES['image-rental-edit']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-rental-edit']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    // create folder if not exist
    if (!file_exists('img/ps')) {
        mkdir('img/ps', 0777, true);
    }
    $dirUpload = "img/ps/";
    // genearete datetimestamp
    $filename = $_POST['id-rental-edit'] . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {

        echo "Link: <a href='" . $dirUpload . $filename . "'>" . $filename . "</a>";
        if ($SadminPs->update_psrental(
            [
                'nama_ps' => $_POST['nama-ps-rental-edit'],
                'harga' => Rupiah::clear($_POST['harga-ps-rental-edit']),
                'jenis' => $_POST['kategori-ps-rental-edit'],
                'img' => $dirUpload . $filename
            ],
            $_POST['id-rental-edit']
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventory.php'</script>";
        } else {
            //error
        }
    } else {

        if ($SadminPs->update_psrental(
            // rubah harga dengan Rupiah::clear
            [
                'nama_ps' => $_POST['nama-ps-rental-edit'],
                'harga' => Rupiah::clear($_POST['harga-ps-rental-edit']),
                'jenis' => $_POST['kategori-ps-rental-edit'],

            ],
            $_POST['id-rental-edit']
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventory.php'</script>";
        } else {
            //error
        }
    }
}

if (isset($_POST['Konfirmasi-sewa'])) {

    switch ($_SESSION['loksend']) {
        case 'Bojonegoro':
            $lok = 'bjn';
            break;
        case 'Babat':
            $lok = 'bbt';
            break;
        case 'Tuban':
            $lok = 'tbn';
            break;
    }

    $id_ps = $SadminPs->idps_sewa($lok);
    $namaFile = $_FILES['image-sewa']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-sewa']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    // create folder if not exist
    if (!file_exists('img/ps-sewa')) {
        mkdir('img/ps-sewa', 0777, true);
    }
    $dirUpload = "img/ps-sewa/";
    // genearete datetimestamp
    $filename = $id_ps . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
        if ($SadminPs->add_sewa(
            [
                'id_ps' => $id_ps,
                'nama_ps' => $_POST['nama-ps-sewa'],
                'harga' => Rupiah::clear($_POST['harga-ps-sewa']),
                'status' => 'tidak aktif',
                'lok' => $_SESSION['loksend'],
                'jenis' => $_POST['kategori-ps-sewa'],
                'img' => $dirUpload . $filename
            ]
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventory.php'</script>";
        } else {
        }
    } else {
    }
}

if (isset($_POST['Konfirmasi-sewa-edit'])) {

    $namaFile = $_FILES['image-sewa-edit']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-sewa-edit']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    // create folder if not exist
    if (!file_exists('img/ps-sewa')) {
        mkdir('img/ps-sewa', 0777, true);
    }
    $dirUpload = "img/ps/";
    // genearete datetimestamp
    $filename = $_POST['id-sewa-edit'] . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
        if ($SadminPs->update_pssewa(
            [
                'nama_ps' => $_POST['nama-ps-sewa-edit'],
                'harga' => Rupiah::clear($_POST['harga-ps-sewa-edit']),
                'jenis' => $_POST['kategori-ps-sewa-edit'],
                'img' => $dirUpload . $filename
            ],
            $_POST['id-sewa-edit']
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventory.php'</script>";
        } else {
            //error
        }
    } else {
        echo "gagal";
        if ($SadminPs->update_pssewa(
            [
                'nama_ps' => $_POST['nama-ps-sewa-edit'],
                'harga' => Rupiah::clear($_POST['harga-ps-sewa-edit']),
                'jenis' => $_POST['kategori-ps-sewa-edit'],

            ],
            $_POST['id-sewa-edit']
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventory.php'</script>";
        } else {
            //error
        }
    }
}

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
            <!-- list ps -->
            <?php require_once 'components/inventory/lists/rental.php' ?>

            <?php if ($user_data['username'] == Session::get('username') && $user_data['lok'] == 'Bojonegoro') { ?>
                <?php require_once 'components/inventory/lists/sewa.php' ?>
            <?php } ?>

        </div>

    </main>


    <script src="assets/js/main.js"></script>
    <script>
        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });

        const hapus = document.getElementById('hapus');
        const alertHapus = document.getElementById('alertHapus');


        hapus.addEventListener('click', () => {
            alertHapus.classList.toggle('activeAlert');
        })
    </script>
    <?php require_once 'components/main/modalLogout.php'; ?>
</body>

</html>