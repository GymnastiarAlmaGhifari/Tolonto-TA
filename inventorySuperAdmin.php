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

if (Session::exists('dashboardSuperAdmin')) {
    echo Session::flash('dashboardSuperAdmin');
}

// pengecekan halaman admin
if (!$user->is_superAdmin(Session::get('username'))) {
    Session::flash(
        'dashboardSuperAdmin',
        '<script>alert("Halaman Ini Khusus Super Admin")</script>'
    );
    Redirect::to('dashboardSuperAdmin');
}

$ju_ps = $SadminPs->jumlah_ps($_SESSION['loksend']);
$ju_pssewa = $SadminPs->jumlah_pssewa($_SESSION['loksend']);
$ps = $SadminPs->ps_card($_SESSION['loksend']);
$ps_sewa = $SadminPs->ps_cardsewa($_SESSION['loksend']);

print_r($_SESSION);

$errors = array();

if (isset($_POST['Konfirmasi'])) {
        $validation = new Validation();

        // metode check
        $validation = $validation->check(array(
            'nama-ps' => array(
                'required' => true,
            ),
            'harga-ps' => array(
                'required' => true,
            ),
            'kategori' => array(
                'required' => true,
            )

        ));
        // pengujian cek nama
        if ($validation->passed()) {
            $psname = Input::get('nama-ps');
            $psprice = Input::get('harga-ps');
            $pskategori = Input::get('kategori');

            echo $psname;
            echo $psprice;
            echo $pskategori;
            $namaFile = $_FILES['image']['name'];
            $fileNameParts = explode('.', $namaFile);
            $ext = end($fileNameParts);
            $namaSementara = $_FILES['image']['tmp_name'];
            
            // tentukan lokasi file akan dipindahkan
            // create folder if not exist
            if (!file_exists('img/ps')) {
                mkdir('img/ps', 0777, true);
            }
            $dirUpload = "img/ps/";
            // genearete datetimestamp
            $filename = date('YmdHis') . '.' . $ext;
            
            // pindahkan file 
            $terupload = move_uploaded_file($namaSementara, $dirUpload.$filename);
            
            if ($terupload) {
                echo "Upload berhasil!<br/>";
                echo "Link: <a href='".$dirUpload.$filename."'>".$filename."</a>";
            } else {
                echo "Upload Gagal!";
            }

            if ($user->cek_nama(Input::get('nama-ps'))) {
                
            } else {
            // untuk mengisi errornya ke array
            $errors = $validation->errors();
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Inventory Superadmin</title>
</head>

<body>

    <!--loader start  -->
    <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>s
    </div>
    <!-- loader end -->

    <main class=" bg-neutral_900 w-full font-noto-sans">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <!-- modal insert start -->

            <!-- modal insert end -->
            <!-- header -->
            <form action="inventorySuperAdmin.php" method="post">
                <?php require_once 'components/header.php'; ?>

                <!-- sidebar -->
                <?php require_once 'components/sidebar.php'; ?>


                <?php if (isset($_POST['hapusButton'])) {
                    require_once 'components/alertHapus.php';
                }

                if (isset($_POST['editButton'])) {
                    require_once 'components/dialogBoxEdit.php';
                }
                if (isset($_POST['tambahButton'])) {
                    require_once 'components/dialogBoxTambah.php';
                }
                ?>
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

            <!-- modal tambah start -->
            <section>
                <div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0 z-50">

                    <!-- modal -->
                    <div id="modal" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[520px] w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
                        <div class="flex flex-row justify-start ml-[23px]  gap-3 mb-3">
                            <svg width="21" height="24" viewBox="0 0 21 24" class="my-auto" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.28571 0C1.01714 0 0 1.01714 0 2.28571V20.5714C0 21.1776 0.240816 21.759 0.66947 22.1877C1.09812 22.6163 1.67951 22.8571 2.28571 22.8571H6.85714V20.6743L9.24572 18.2857H2.28571V16H11.5314L13.8171 13.7143H2.28571V11.4286H16.1029L18.2857 9.24572V6.85714L11.4286 0H2.28571ZM10.2857 1.71429L16.5714 8H10.2857V1.71429ZM18.4571 12.5714C18.2857 12.5714 18.1257 12.6286 18 12.7543L16.8343 13.92L19.2229 16.2971L20.3886 15.1429C20.6286 14.8914 20.6286 14.48 20.3886 14.24L18.9029 12.7543C18.7771 12.6286 18.6171 12.5714 18.4571 12.5714ZM16.16 14.5943L9.14286 21.6229V24H11.52L18.5486 16.9714L16.16 14.5943Z" fill="#FAFAFA" />
                            </svg>
                            <h1 id="mdoalText" class="text-neutral_050 font-base font-noto-sans text-xl">Tambah PlayStation Rental Baru</h1>
                        </div>
                        <span class="w-11/12 h-0.5 mx-auto -mt-4 bg-neutral_600"></span>
                        <form action="inventorySuperAdmin.php" method="post" class="flex flex-col items-center justify-center gap-4 mt-2" enctype="multipart/form-data">
                            <!-- gambar start -->
                            <div class="flex flex-col justify-center items-center relative">
                                <!-- show previe image from Upload::uploadimage() -->
                                <img src="components/kamera.png" alt="" id="preview" class="w-[100px] h-[100px] object-cover rounded-full shadow-elevation-dark-4 bg-transparent">
                                <label>
                                    <input class="text-sm cursor-pointer w-36 hidden" accept="image/*" type="file" name="image" id="image" />
                                    <div class="cursor-pointer rounded-full bg-primary_400 w-[35px] h-[35px] flex flex-row justify-center items-center absolute  bottom-1 -right-1.5">
                                        <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 3V0H5V3H8V5H5V8H3V5H0V3M6 9V6H9V3H16L17.8 5H21C22.1 5 23 5.9 23 7V19C23 20.1 22.1 21 21 21H5C3.9 21 3 20.1 3 19V9M13 18C17.45 18 19.69 12.62 16.54 9.46C13.39 6.31 8 8.55 8 13C8 15.76 10.24 18 13 18ZM9.8 13C9.8 15.85 13.25 17.28 15.26 15.26C17.28 13.25 15.85 9.8 13 9.8C11.24 9.8 9.8 11.24 9.8 13Z" fill="black" />
                                        </svg>
                                    </div>
                                </label>
                            </div>
                            <!-- gambar end -->

                            <div class="relative z-0 w-11/12 mt-5">
                                <input type="text" id="nama-ps" name="nama-ps" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                                <label for="nama-ps" class="absolute text-sm text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Nama PS</label>
                                <svg width="30" height="24" class="absolute top-4 left-5" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27 0C27.7956 0 28.5587 0.31607 29.1213 0.87868C29.6839 1.44129 30 2.20435 30 3V21C30 21.7956 29.6839 22.5587 29.1213 23.1213C28.5587 23.6839 27.7956 24 27 24H3C2.20435 24 1.44129 23.6839 0.87868 23.1213C0.31607 22.5587 0 21.7956 0 21V3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.31607 2.20435 0 3 0H27ZM13.5 13.5H10.5V16.5H13.5V13.5ZM25.5 13.5H16.5V16.5H25.5V13.5ZM7.5 7.5H4.5V10.5H7.5V7.5ZM25.5 7.5H10.5V10.5H25.5V7.5Z" fill="#303030" />
                                </svg>
                            </div>
                            <div class="relative z-0 w-11/12">
                                <input type="text" id="harga-ps" name="harga-ps" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                                <label for="harga-ps" class="absolute text-sm text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Harga PS</label>
                                <svg width="14" height="24" class="absolute top-4 left-7" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#303030" />
                                </svg>
                            </div>
                            <div class="relative z-0 w-11/12 ">
                                <div id="dropdown" class="dropdown dropdown-hover  dropdown-bottom w-full">
                                    <label tabindex="0" id="lok" class="btn btn-ghost bg-neutral_050 hover:bg-primary_500 capitalize font-semibold font-noto-sans gap-6 text-neutral_900 w-full h-14 flex flex-row justify-start items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg width="13" height="24" class="ml-2" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.12 20.2267L1.89333 16L0.0133336 17.88L6.12 24L12.24 17.88L10.3467 16M6.12 3.77333L10.3467 8L12.2267 6.12L6.12 0L0 6.12L1.89333 8L6.12 3.77333Z" fill="black" />
                                        </svg>

                                        <h1 id="kategori" name="kategori"></h1>
                                        <i class="fa-solid fa-caret-down fa-2x absolute right-5 "></i>

                                    </label>
                                    <ul tabindex="0" id="content" class="dropdown-content p-2 w-full cursor-pointer space-y-2 shadow-elevation-light-4 bg-neutral_600 rounded-lg text-neutral_050">
                                        <li id="list-kategori" class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                                            <a>PS-3</a>
                                        </li>
                                        <li id="list-kategori" class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                                            <a>PS-4</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="flex flex-row gap-11 items-center justify-center w-full">
                                <button type="button" onclick="openModal(false)" name="Batal" id="Batal" value="Batal" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl px-4">
                                    Batal
                                </button>
                                <button type="submit" name="Konfirmasi" id="Konfirmasi" class="bg-[#4FCF2F] text-neutral_050 w-5/12 h-12 rounded-2xl px-4">Konfirmas</button>
                            </div>
                        </form>

                    </div>

                </div>
            </section>
            <!-- modal tambah end -->


        </div>

    </main>

    <script src="assets/js/main.js"></script>
    <script>
        const modal_overlay = document.querySelector('#modal_overlay');
        const modal = document.querySelector('#modal');
        const tambahSewa = document.querySelector('#tambahSewa');
        const tambahRental = document.querySelector('#tambahRental');
        const modalText = document.querySelector('#modalText');

        function openModal(value) {
            const modalCl = modal.classList
            const overlayCl = modal_overlay

            if (value) {
                overlayCl.classList.remove('hidden')
                setTimeout(() => {
                    modalCl.remove('opacity-0')
                    modalCl.remove('-translate-y-full')
                    modalCl.remove('scale-150')
                }, 100);
            } else {
                modalCl.add('-translate-y-full')
                setTimeout(() => {
                    modalCl.add('opacity-0')
                    modalCl.add('scale-150')
                }, 100);
                setTimeout(() => overlayCl.classList.add('hidden'), 300);
            }
        }
        openModal(false)

        // open modal sewa and set text modalText to 'Sewa'
        tambahSewa.addEventListener('click', () => {
            openModal(true)
        });

        tambahRental.addEventListener('click', () => {
            openModal(true)
        });
    </script>
    <script>
        const kategori = document.getElementById('kategori');
        const list_kategori = document.querySelectorAll('#list-kategori');
        const content = document.getElementById('content');
        const dropdown = document.getElementById('dropdown');

        list_kategori.forEach((list) => {
            list.addEventListener('click', () => {
                kategori.innerHTML = list.innerHTML;
                content.classList.add('hidden');
            });
        });

        // hover
        dropdown.addEventListener('mouseover', () => {
            content.classList.remove('hidden');
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
        const image = document.querySelector('#image');
        const preview = document.querySelector('#preview');

        // if preview is null add some image


        image.addEventListener('change', function() {
            const file = image.files[0];
            const type = file.type;
            const size = file.size;
            const name = file.name;

            if (type != 'image/jpeg' && type != 'image/png' && type != 'image/jpg') {
                alert('type file harus .jpg .png .jpeg');
                image.value = '';
                return false;
            }

            if (size > 2000000) {
                alert('ukuran file maksimal 2mb');
                image.value = '';
                return false;
            }

            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);

            fileReader.onload = function(e) {
                preview.src = e.target.result;
            }
        })
    </script>
    <script>
        const imginp = document.getElementById('image');
        const prev = document.getElementById('preview');

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