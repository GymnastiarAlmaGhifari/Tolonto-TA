<?php

require_once "core/init.php";
$SadminUser = new ControllerSuperadminUser();

$ju = $SadminUser->jumlah_user();
$ja = $SadminUser->jumlah_admin();
$tb_admin = $SadminUser->table_admin();
$tb_user = $SadminUser->table_user();
$lokasi = $SadminUser->lokasi();

if (isset($_POST['Konfirmasi-Admin'])) {

    $idadmin = $SadminUser->idadmin();

    $namaFile = $_FILES['image-Admin']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-Admin']['tmp_name'];
    // create folder if not exist
    if (!file_exists('img/admin')) {
        mkdir('img/admin', 0777, true);
    }
    $dirUpload = "img/admin/";
    // genearete datetimestamp
    $filename = $idadmin . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='" . $dirUpload . $filename . "'>" . $filename . "</a>";
        if ($SadminUser->add_admin(
            [
                'id_admin' => $idadmin,
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
                'level' => $_POST['level-Admin'],
                'lok' => $_POST['lokasi-Admin'],
                'img' => $dirUpload . $filename
            ]
        )) // jika berhasil refresh page tanpa submit ulang
        {
            Redirect::to('userSuperAdmin');
        } else {
        }
    } else {
        echo "Upload Gagal!";
    }
}

if (isset($_POST['Konfirmasi-Admin-Edit'])) {
    // $idmin = $_POST['id-admin-edit'];
    // echo $idmin;

    $namaFile = $_FILES['image-Admin-edit']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-Admin-edit']['tmp_name'];
    // create folder if not exist
    if (!file_exists('img/admin')) {
        mkdir('img/admin', 0777, true);
    }
    $dirUpload = "img/admin/";
    // genearete datetimestamp
    $filename = $_POST['id-admin-edit'] . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='" . $dirUpload . $filename . "'>" . $filename . "</a>";
        if ($_POST['password-edit'] == '') {
            if ($SadminUser->update_admin(
                [
                    'username' => $_POST['username-edit'],
                    'update_at' => date('Y-m-d H:i:s'),
                    'level' => $_POST['level-edit'],
                    'lok' => $_POST['lokasi-edit'],
                    'img' => $dirUpload . $filename
                ],
                $_POST['id-admin-edit']
            )) {
                Redirect::to('userSuperAdmin');
            } else {
            }
        } else {
            if ($SadminUser->update_admin(
                [
                    'username' => $_POST['username-edit'],
                    'password' => password_hash($_POST['password-edit'], PASSWORD_DEFAULT),
                    'update_at' => date('Y-m-d H:i:s'),
                    'level' => $_POST['level-edit'],
                    'lok' => $_POST['lokasi-edit'],
                    'img' => $dirUpload . $filename
                ],
                $_POST['id-admin-edit']
            )) // jika berhasil refresh page tanpa submit ulang
            {
                Redirect::to('userSuperAdmin');
            } else {
            }
        }
    } else {
        echo "Upload Gagal!";
        if ($_POST['password-edit'] == '') {
            if ($SadminUser->update_admin(
                [
                    'username' => $_POST['username-edit'],
                    'update_at' => date('Y-m-d H:i:s'),
                    'level' => $_POST['level-edit'],
                    'lok' => $_POST['lokasi-edit'],
                ],
                $_POST['id-admin-edit']
            )) {
                Redirect::to('userSuperAdmin');
            } else {
            }
        } else {
            if ($SadminUser->update_admin(
                [
                    'username' => $_POST['username-edit'],
                    'password' => password_hash($_POST['password-edit'], PASSWORD_DEFAULT),
                    'update_at' => date('Y-m-d H:i:s'),
                    'level' => $_POST['level-edit'],
                    'lok' => $_POST['lokasi-edit'],
                ],
                $_POST['id-admin-edit']
            )) // jika berhasil refresh page tanpa submit ulang
            {
                Redirect::to('userSuperAdmin');
            } else {
            }
        }
    }
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
            <form action="userSuperAdmin.php" method="post">
                <!-- header -->
                <?php require_once 'components/main/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>
            </form>
            <?php
            require_once 'components/usersuper/tables/user.php';
            require_once 'components/usersuper/tables/admin.php';

            ?>

        </div>
    </main>

    <script>
        const table_admin = document.getElementById('table-admin');
        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });
    </script>

</body>


</html>