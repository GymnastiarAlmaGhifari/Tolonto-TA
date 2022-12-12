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

if (Session::exists('inventorySuperAdmin')) {
    echo Session::flash('inventorySuperAdmin');
}

// pengecekan halaman admin
if (!$user->is_superAdmin(Session::get('username'))) {
    Session::flash(
        'inventorySuperAdmin',
        '<script>alert("Halaman Ini Khusus Super Admin")</script>'
    );
    Redirect::to('inventorySuperAdmin');
}

$ju_ps = $SadminPs->jumlah_ps($_SESSION['loksend']);
$ju_pssewa = $SadminPs->jumlah_pssewa($_SESSION['loksend']);
$ps = $SadminPs->ps_card($_SESSION['loksend']);
$ps_sewa = $SadminPs->ps_cardsewa($_SESSION['loksend']);

$errors = array();

if (isset($_POST['Konfirmasi-rental'])) {

    $id_ps = $SadminPs->idps($_POST['kategori-ps-rental'], $_SESSION['loksend']);
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
    $filename = date('YmdHis') . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='" . $dirUpload . $filename . "'>" . $filename . "</a>";
        if ($SadminPs->add_rental(
            [
                'id_ps' => $id_ps,
                'nama_ps' => $_POST['nama-ps-rental'],
                'harga' => $_POST['harga-ps-rental'],
                'status' => 'tidak aktif',
                'lok' => $_SESSION['loksend'],
                'jenis' => $_POST['kategori-ps-rental'],
                'img' => $dirUpload . $filename
            ]
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventorySuperAdmin.php'</script>";
        } else {
        }
    } else {
        echo "Upload Gagal!";
    }
}

if (isset($_POST['Konfirmasi-sewa'])) {

    $id_ps = $SadminPs->idps($_POST['kategori-ps-sewa'], $_SESSION['loksend']);
    $namaFile = $_FILES['image-sewa']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-sewa']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    // create folder if not exist
    if (!file_exists('img/ps')) {
        mkdir('img/ps', 0777, true);
    }
    $dirUpload = "img/ps/";
    // genearete datetimestamp
    $filename = date('YmdHis') . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='" . $dirUpload . $filename . "'>" . $filename . "</a>";
        if ($SadminPs->add_sewa(
            [
                'id_ps' => $id_ps,
                'nama_ps' => $_POST['nama-ps-sewa'],
                'harga' => $_POST['harga-ps-sewa'],
                'status' => 'tidak aktif',
                'lok' => $_SESSION['loksend'],
                'jenis' => $_POST['kategori-ps-sewa'],
                'img' => $dirUpload . $filename
            ]
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventorySuperAdmin.php'</script>";
        } else {
        }
    } else {
        echo "Upload Gagal!";
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inventory Superadmin</title>
</head>

<body>

    <!--loader start  -->
    <!-- <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div> -->
    <!-- loader end -->

    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <!-- modal insert start -->

            <!-- modal insert end -->
            <!-- header -->
            <form action="inventorySuperAdmin.php" method="post">
                <!-- header -->
                <?php require_once 'components/main/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>

            </form>
            <!-- list control -->
            <!-- main ditempat -->
            <section id="main-ditempat" class="mt-24  text-neutral_050 ml-24 flex flex-row gap-8">
                <h1 class="capitalize font-semibold">total PS Rental</h1>
                <h2 class="text-neutral_300"><?php echo $ju_ps ?></h2>
            </section>
            <!-- list ps -->
            <section id="list-ps" class="mt-8  text-neutral_050 ml-24 mb-12">
                <div class="container">
                    <div class="flex flex-wrap gap-7 flex-row">
                        <!-- start -->
                        <?php
                        $row = 0;
                        if (empty($ps)) {
                            echo '<h1 class="text-2xl">Tidak Ada Data</h1>';
                        } else {

                            while ($row < count($ps)) {
                                $status = $ps[$row]['status'];
                                if ($status == 'aktif') {
                                    $ikon = 'bg-[#32FC00]';
                                } else {
                                    $ikon = 'bg-[#fc1100]';
                                }
                        ?>
                                <div class="w-[350px] h-[230px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 flex flex-col">
                                    <div class="flex justify-between mt-2 mx-5">
                                        <h1><?php echo $ps[$row]['nama_ps'] ?></h1>
                                        <div class="flex flex-row gap-2">
                                            <button id="edit" name="editButton" class="w-[30px] h-[30px] bg-neutral_050  rounded-full relative">
                                                <svg class="mx-auto my-1.5" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                                </svg>
                                            </button>
                                            <button id="hapus" name="hapusButton" class=" w-[30px] h-[30px] bg-neutral_050 rounded-full relative">
                                                <svg class="mx-auto my-1.5" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                    <span class="bg-neutral_600 w-[326.67px] h-0.5 mb-0 mt-2 mx-2"></span>
                                    <div class="flex justify-center items-center relative">
                                        <img class="h-[110px] m-2" src="<?php echo $ps[$row]['img'] ?>" alt="">
                                    </div>
                                    <h1 class="uppercase font-noto-sans font-semibold px-5"><?php echo $ps[$row]['jenis']; ?></h1>
                                    <div class="flex flex-row justify-between px-5">
                                        <div class="flex flex-row items-center gap-x-2">
                                            <span class="w-3 h-3 rounded-full <?php echo $ikon ?>"></span>
                                            <h1><?php echo $ps[$row]['status'] ?></h1>
                                        </div>
                                        <div class="flex flex-row items-center gap-x-2">
                                            <i class="fa-solid fa-dollar-sign"></i>
                                            <h1>Rp. <?php echo $ps[$row]['harga'] ?></h1>
                                        </div>
                                    </div>

                                </div>
                        <?php
                                $row++;
                            }
                        } ?>
                        <!-- end -->
                        <div class="w-[350px] h-[230px] bg-transparent rounded-xl  flex items-center justify-center">
                            <button id="tambahRental" name="tambahRental" class="flex justify-center items-center h-[150px] w-[150px] shadow-elevation-dark-4 bg-neutral_800 rounded-full relative">
                                <span class="bg-neutral_050 w-20 h-[4px] rounded-full"></span>
                                <span id="plus3" class="bg-neutral_050 w-[4px] h-20 absolute rounded-full"></span>
                            </button>
                        </div>

                    </div>
                </div>
            </section>
            <section id="main-ditempat" class="mt-12  text-neutral_050 ml-24 flex flex-row gap-8">
                <h1 class="capitalize font-semibold">total PS Sewa</h1>
                <h2 class="text-neutral_300"><?php echo $ju_pssewa ?></h2>
            </section>

            <!-- list ps -->
            <section id="list-ps" class="mt-8  text-neutral_050 ml-24 mb-12">
                <div class="container">
                    <div class="flex flex-wrap gap-7 flex-row">
                        <!-- start -->
                        <?php
                        $row = 0;
                        if (empty($ps_sewa)) {
                            echo '<h1 class="text-2xl">Tidak Ada Data</h1>';
                        } else {

                            while ($row < count($ps_sewa)) {
                                $status = $ps_sewa[$row]['status'];
                                if ($status == 'aktif') {
                                    $ikon = 'bg-[#32FC00]';
                                } else {
                                    $ikon = 'bg-[#fc1100]';
                                }
                        ?>
                                <div class="w-[350px] h-[230px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 flex flex-col">
                                    <div class="flex justify-between mt-2 mx-5">
                                        <h1><?php echo $ps_sewa[$row]['nama_ps'] ?></h1>
                                        <div class="flex flex-row gap-2">
                                            <button id="edit" name="editButton" class="w-[30px] h-[30px] bg-neutral_050  rounded-full relative">
                                                <svg class="mx-auto my-1.5" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                                </svg>
                                            </button>
                                            <button id="hapus" name="hapusButton" class=" w-[30px] h-[30px] bg-neutral_050 rounded-full relative">
                                                <svg class="mx-auto my-1.5" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                    <span class="bg-neutral_600 w-[326.67px] h-0.5 mb-0 mt-2 mx-2"></span>
                                    <div class="flex justify-center items-center relative">
                                        <img class="h-[110px] m-2" src="<?php echo $ps_sewa[$row]['img'] ?>" alt="">
                                    </div>
                                    <h1 class="uppercase font-noto-sans font-semibold px-5"><?php echo $ps_sewa[$row]['jenis']; ?></h1>
                                    <div class="flex flex-row justify-between px-5">
                                        <div class="flex flex-row items-center gap-x-2">
                                            <span class="w-3 h-3 rounded-full <?php echo $ikon ?>"></span>
                                            <h1><?php echo $ps_sewa[$row]['status'] ?></h1>
                                        </div>
                                        <div class="flex flex-row items-center gap-x-2">
                                            <i class="fa-solid fa-dollar-sign"></i>
                                            <h1>Rp. <?php echo $ps_sewa[$row]['harga'] ?></h1>
                                        </div>
                                    </div>

                                </div>
                        <?php
                                $row++;
                            }
                        } ?>
                        <!-- end -->
                        <div class="w-[350px] h-[230px] bg-transparent rounded-xl  flex items-center justify-center relative">

                            <button id="tambahSewa" name="tambahSewa" class="flex justify-center items-center h-[150px] w-[150px] shadow-elevation-dark-4 bg-neutral_800 rounded-full ">

                                <span class="bg-neutral_050 w-20 h-[4px] rounded-full"></span>
                                <span id="plus3" class="bg-neutral_050 w-[4px] h-20 absolute rounded-full"></span>
                            </button>
                        </div>

                    </div>
                </div>
            </section>

            <?php require_once 'components/inventorysuper/modals/rental.php' ?>
            <?php require_once 'components/inventorysuper/modals/sewa.php' ?>

        </div>

    </main>


    <script src="assets/js/main.js"></script>

    <script>
        const kategori = document.getElementById('kategori');
        const list_kategori = document.querySelectorAll('#list-kategori');
        const kategori_ps = document.querySelector('#kategori-ps-rental');
        const arrow_rental = document.querySelector('#arrow_rental');
        const option = document.querySelector('#option-rental');

        // if kategori_ps is clicked and dropdown is rotated 180deg if target not equal to kategori_ps 
        kategori_ps.addEventListener('click', (e) => {
            if (e.target === kategori_ps && !arrow_rental.classList.contains('rotate-180')) {
                arrow_rental.classList.toggle('rotate-180');
                arrow_rental.classList.toggle('transition');
                arrow_rental.classList.toggle('ease-in-out');
            } else if (e.target === kategori_ps && arrow_rental.classList.contains('rotate-180')) {
                arrow_rental.classList.toggle('rotate-180');
                arrow_rental.classList.toggle('transition');
                arrow_rental.classList.toggle('ease-in-out');
            }
        });

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
    <script>
        const imginp_rental = document.getElementById('image-rental');
        const prev_rental = document.getElementById('preview-rental');

        imginp_rental.onchange = evt => {
            const [file_rental] = imginp_rental.files
            if (file_rental) {
                //if size is more than 2mb alert
                if (file_rental.size > 2000000) {
                    alert('ukuran file maksimal 2mb');
                    imginp_rental.value = '';
                    return false;
                } else if (file_rental.type != 'image/jpeg' && file_rental.type != 'image/png' && file_rental.type != 'image/jpg') {
                    alert('type file harus .jpg .png .jpeg');
                    imginp_rental.value = '';
                    return false;
                } else {
                    prev_rental.src = URL.createObjectURL(file_rental)
                    //rename file to datetimenow and save to folder

                    console.log(file_rental);
                }

            }
        }

        const imginp = document.getElementById('image-sewa');
        const prev = document.getElementById('preview-sewa');

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