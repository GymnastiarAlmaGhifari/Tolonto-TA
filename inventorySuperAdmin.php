<?php
<<<<<<< HEAD:pages/inventorySuperAdmin.php
require_once '../core/init.php';
=======
require_once 'core/init.php';
>>>>>>> 5633731e67c3c8c3150e1c56ab410f58e564af09:inventorySuperAdmin.php
$SadminPs = new ControllerSuperadminInventory();

$ju_ps = $SadminPs->jumlah_ps();
$ps = $SadminPs->ps_card();


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
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="assets/styles/animation.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Inventory Superadmin</title>
</head>

<body>

    <!--loader start  -->
    <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div>
    <!-- loader end -->
<<<<<<< HEAD:pages/inventorySuperAdmin.php
    <main class=" bg-neutral_900 w-full font-noto-sans">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
=======



    <main class=" bg-neutral_900 w-full font-noto-sans">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <!-- modal insert start -->
            <div id="modal-hapus" class="fixed bg-primary_100/50 h-screen w-screen flex flex-row justify-center items-center z-50">
                <div class="bg-neutral_050 w-1/2 h-1/2 rounded-2xl flex flex-col justify-center items-center">
                    <h1 class="text-neutral_900 font-semibold text-2xl">Tambah PS</h1>
                    <form action="inventorySuperAdmin.php" method="post" class="flex flex-col gap-4 mt-8">
                        <input type="text" name="nama" id="nama" placeholder="Nama PS" class="bg-neutral_050 w-1/2 h-12 rounded-2xl px-4">
                        <input type="text" name="harga" id="harga" placeholder="Harga PS" class="bg-neutral_050 w-1/2 h-12 rounded-2xl px-4">
                        <input type="text" name="stok" id="stok" placeholder="Stok PS" class="bg-neutral_050 w-1/2 h-12 rounded-2xl px-4">
                        <input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi PS" class="bg-neutral_050 w-1/2 h-12 rounded-2xl px-4">
                        <input type="text" name="gambar" id="gambar" placeholder="Gambar PS" class="bg-neutral_050 w-1/2 h-12 rounded-2xl px-4">
                        <input type="submit" name="tambah" id="tambah" value="Tambah" class="bg-neutral_900 text-neutral_050 w-1/2 h-12 rounded-2xl px-4">
                    </form>
                </div>
            </div>
            <!-- modal insert end -->
>>>>>>> 5633731e67c3c8c3150e1c56ab410f58e564af09:inventorySuperAdmin.php
            <!-- header -->
            <?php require_once 'components/header.php'; ?>

            <!-- sidebar -->
            <?php require_once 'components/sidebar.php'; ?>
            <form action="inventorySuperAdmin.php" method="post">


                <?php if (isset($_POST['hapusButton'])) {
                    require_once 'components/alertHapus.php';
                }

                if (isset($_POST['editButton'])) {
                    require_once 'components/dialogBoxEdit.php';
                }
                if (isset($_POST['tambahButton'])) {
                    require_once 'components/dialogBoxTambah.php';
                    $f = fopen('components/dialogBoxTambah.php', 'r');

                    fpassthru($f);

                    fclose($f);
                }
                ?>
            </form>
            <!-- list control -->
            <!-- main ditempat -->
            <section id="main-ditempat" class="mt-24  text-neutral_050 ml-24 flex flex-row gap-8">
                <h1 class="capitalize font-semibold">total inventory</h1>
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
                            <button id="tambah" name="tambahButton" onclick="tambah()" class="flex justify-center items-center h-[150px] w-[150px] shadow-elevation-dark-4 bg-neutral_800 rounded-full ">
                                <span class="bg-neutral_050 w-20 h-[4px] rounded-full"></span>
                                <span id="plus3" class="bg-neutral_050 w-[4px] h-20 absolute rounded-full"></span>
                            </button>
                        </div>

                    </div>
                </div>

            </section>


        </div>

    </main>

    <script src="../assets/js/main.js"></script>
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

</body>

</html>