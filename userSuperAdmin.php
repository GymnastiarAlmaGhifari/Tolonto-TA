<?php

require_once "core/init.php";
$SadminUser = new ControllerSuperadminUser();

$ju = $SadminUser->jumlah_user();
$ja = $SadminUser->jumlah_admin();
$tb_admin = $SadminUser->table_admin();
$tb_user = $SadminUser->table_user();
$lokasi = $SadminUser->lokasi();

if (isset($_POST['Konfirmasi-Admin'])) {

    $namaFile = $_FILES['image-Admin']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-Admin']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    // create folder if not exist
    if (!file_exists('img/admin')) {
        mkdir('img/admin', 0777, true);
    }
    $dirUpload = "img/admin/";
    // genearete datetimestamp
    $filename = date('YmdHis') . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='" . $dirUpload . $filename . "'>" . $filename . "</a>";
        if ($SadminUser->add_admin(
            [
                'id_admin' => $_POST['username'],
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

            <?php require_once 'components/usersuper/tables/user.php'; ?>

            <?php require_once 'components/usersuper/tables/admin.php'; ?>

            <?php require_once 'components/usersuper/modals/addAdmin.php'; ?>

            <?php require_once 'components/usersuper/modals/editAdmin.php'; ?>

            <?php require_once 'components/usersuper/modals/topup.php'; ?>
        </div>
    </main>
    
    <script>
        const table_admin = document.getElementById('table-admin');

        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });

        window.addEventListener('load', () => {
            if (localStorage.getItem('lokasi') !== 'Bojonegoro') {
                table_admin.classList.add('hidden')
                console.log(localStorage.getItem('lokasi'))
            } else {
                table_admin.classList.remove('hidden')
                console.log(localStorage.getItem('lokasi'))
            }
        })
    </script>
    <script>
        // sorting table by column
        // const table = document.querySelector('.table');
        // const tbody = table.querySelector('tbody');
        // const thead = table.querySelector('thead');
        // const ths = thead.querySelectorAll('th');
        // const tds = tbody.querySelectorAll('td');
        // const trs = tbody.querySelectorAll('tr');
        // const tfoot = table.querySelector('tfoot');

        // ths.forEach((th, index) => {
        //     th.addEventListener('click', () => {
        //         const sortedRows = Array.from(trs).sort((a, b) => {
        //             const aColText = a.querySelector(`td:nth-child(${index + 1})`).textContent.trim();
        //             const bColText = b.querySelector(`td:nth-child(${index + 1})`).textContent.trim();
        //             return aColText > bColText ? 1 : -1;
        //         });
        //         tbody.append(...sortedRows);
        //     });
        // });

        // // search table
        // const search = document.querySelector('.search');
        // search.addEventListener('input', (e) => {
        //     const searchText = e.target.value;
        //     const rows = tbody.querySelectorAll('tr');
        //     rows.forEach((row) => {
        //         const rowText = row.textContent;
        //         if (rowText.toLowerCase().includes(searchText.toLowerCase())) {
        //             row.style.display = 'table-row';
        //         } else {
        //             row.style.display = 'none';
        //         }
        //     });
        // });

        // // select all checkbox
        // const selectAll = document.querySelector('.select-all');
        // selectAll.addEventListener('click', (e) => {
        //     const checkboxes = tbody.querySelectorAll('input[type="checkbox"]');
        //     checkboxes.forEach((checkbox) => {
        //         checkbox.checked = e.target.checked;
        //     });
        // });
    </script>
        <script>
        // const imginp_rental = document.getElementById('image-rental');
        // const prev_rental = document.getElementById('preview-rental');

        // imginp_rental.onchange = evt => {
        //     const [file_rental] = imginp_rental.files
        //     if (file_rental) {
        //         //if size is more than 2mb alert
        //         if (file_rental.size > 2000000) {
        //             alert('ukuran file maksimal 2mb');
        //             imginp_rental.value = '';
        //             return false;
        //         } else if (file_rental.type != 'image/jpeg' && file_rental.type != 'image/png' && file_rental.type != 'image/jpg') {
        //             alert('type file harus .jpg .png .jpeg');
        //             imginp_rental.value = '';
        //             return false;
        //         } else {
        //             prev_rental.src = URL.createObjectURL(file_rental)
        //             //rename file to datetimenow and save to folder

        //             console.log(file_rental);
        //         }

        //     }
        // }

        const imginp = document.getElementById('image-Admin');
        const prev = document.getElementById('preview-Admin');

        imginp.onchange = evt => {
            const [file] = imginp.files
            if (file) {
                //if size is more than 2mb alert
                if (file.size > 2000000) {
                    alert('ukuran file maksimal 2mb');
                    imginp.value = '';
                    return false;
                } else if (file.type != 'image/jpeg' && file.type != 'image/png' && file.type != 'image/jpg') {
                    alert('type file harus .jpg .png .jpeg');
                    imginp.value = '';
                    return false;
                } else {
                    prev.src = URL.createObjectURL(file)
                    //rename file to datetimenow and save to folder

                    console.log(file);
                }

            }
        }
    </script>
</body>


</html>