<?php

require_once 'core/init.php';

$Sadmin = new ControllerSuperAdmin();

if (!$user->is_login()) {
    Session::flash('login', '<script>alert("Anda Harus Login")</script>');
    Redirect::to('login');
}

if (Session::exists('dashboard')) {
    echo Session::flash('dashboard');
}


$users = $user->get_users();
$tersedia = $Sadmin->ps_tersedia($_SESSION['loksend']);
$maintain = $Sadmin->ps_maintain();
$psbook = $Sadmin->ps_book();
$laba = $Sadmin->laba();
$ps = $Sadmin->ps_card($_SESSION['loksend']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="assets/styles/animation.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>
    <!--loader start  -->
    <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div>
    <!-- loader end -->
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <form action="dashboard.php" method="post">
                <!-- header -->
                <?php require_once 'components/main/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>
            </form>
            <?php require_once 'components/main/modalLogout.php'; ?>
            <!-- list control -->
            <section id="control" class="xs:mt-[84px] sm:mt-24 text-neutral_050  xs:ml-[84px] sm:ml-24 ">
                <div class="container">
                    <div class="flex flex-wrap flex-row  gap-7 font-base ">
                        <div class="w-[250px] h-[100px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 ">
                            <h1 class="ml-3 mt-3">Total PlayStation Rental</h1>
                            <h1 class="text-5xl ml-[105px]"><?php echo $tersedia ?></h1>
                        </div>
                        <div class="w-[250px] h-[100px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 ">
                            <h1 class="ml-3 mt-3">PlayStation Maintenance</h1>
                            <h1 class="text-5xl ml-[105px]"><?php echo $maintain ?></h1>
                        </div>
                        <div class="w-[250px] h-[100px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 ">
                            <h1 class="ml-3 mt-3">Booking Hari ini</h1>
                            <h1 class="text-5xl ml-[105px]"><?php echo $psbook ?></h1>
                        </div>
                        <div class="w-[250px] h-[100px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 ">
                            <h1 class="ml-3 mt-3">Laba Hari ini</h1>
                            <h1 class="text-5xl mx-5">Rp. <?php echo $laba ?></h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- main ditempat -->
            <section id="main-ditempat" class=" mt-8 text-neutral_050 xs:ml-[84px] sm:ml-24 ">
                <h1>Main Di tempat</h1>
            </section>
            <!-- list ps -->
            <section id="list-ps" class="mt-8  text-neutral_050 xs:ml-[84px] sm:ml-24  mb-12">
                <div class="container">
                    <div class="flex flex-wrap gap-7 flex-row">
                        <?php
                        $row = 0;
                        if (empty($ps)) {
                            echo '<h1 class="text-2xl">Tidak Ada Data</h1>';
                        } else {
                            while ($row < count($ps)) {
                                $status = $ps[$row]['status'];
                                if ($status == 'aktif') {
                                    $id_ps = $ps[$row]['id_ps'];
                                    $aktif = $Sadmin->is_active($id_ps);
                        ?> 
                            <div class="w-[350px] h-[250px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 flex flex-col">
                                        <div class="flex justify-between mt-2 mx-5">
                                            <h1><?php echo $ps[$row]['nama_ps'] ?></h1>
                                            <!-- <div class="switch">
                                    <div class="switch__1">
                                        <input type="checkbox" id="switch-1">
                                        <label for="switch-1"></label>
                                    </div>
                                </div> -->
                                            <input type="checkbox" class="toggle toggle-md   checked:bg-[#32FC00]" checked />
                                        </div>
                                        <span class="bg-neutral_600 w-[326.67px] h-0.5 mb-0 mt-2 mx-2"></span>
                                        <div class="flex justify-center items-center relative">
                                            <img class="h-[110px] m-2" src="<?php echo $ps[$row]['img'] ?>" alt="">
                                        </div>
                                        <h1 class="uppercase font-noto-sans font-semibold px-5"><?php echo $ps[$row]['nama_jenis'] ?></h1>
                                        <div class="flex flex-row justify-between px-5">
                                            <div class="flex flex-row items-center gap-x-2">
                                                <span class="w-3 h-3 rounded-full bg-[#32FC00]"></span>
                                                <h1><?php echo $ps[$row]['status'] ?></h1>
                                            </div>
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1><?php echo $aktif[0]['playtime'] ?></h1>
                                                <i class="fa-regular fa-clock"></i>
                                            </div>
                                        </div>
                                        <div class="flex flex-row justify-between px-5">
                                            <div class="flex flex-row items-center gap-x-2">
                                                <i class="fa-solid fa-dollar-sign"></i>
                                                <h1>Rp. <?php echo $aktif[0]['bayar'] ?></h1>
                                            </div>
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1><?php echo $aktif[0]['username'] ?></h1>
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                        
                                } else { ?>
                        <div class=" xs:w-[260px] sm:w-[350px] h-[250px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 flex flex-col">
                            <div class="flex justify-between mt-2 mx-5">
                                <h1><?php echo $ps[$row]['nama_ps'] ?></h1>
                                <input type="checkbox" class="toggle toggle-md   checked:bg-[#32FC00]" checked />
                            </div>
                            <span class="bg-neutral_600 xs:w-[240px] sm:w-[326.67px] h-0.5 mb-0 mt-2 mx-2"></span>
                            <div class="flex justify-center items-center relative">
                                <img class="h-[110px] m-2" src="<?php echo $ps[$row]['img'] ?>" alt="">
                            </div>
                            <h1 class="uppercase font-noto-sans font-semibold px-5"><?php echo $ps[$row]['nama_jenis'] ?></h1>
                            <div class="flex flex-row justify-between px-5">
                                <div class="flex flex-row items-center gap-x-2">
                                    <span class="w-3 h-3 rounded-full bg-[#fc1100]"></span>
                                    <h1><?php echo $ps[$row]['status'] ?></h1>
                                </div>
                                <div class="flex flex-row items-center gap-x-2">
                                    <h1>-</h1>
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between px-5">
                                <div class="flex flex-row items-center gap-x-2">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    <h1>Rp. -</h1>
                                </div>
                                <div class="flex flex-row items-center gap-x-2">
                                    <h1>-</h1>
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
            <?php    }
                                $row++;
                            }
                        } ?>
            <!-- end -->

                    </div>
                </div>

            </section>


        </div>

    </main>

    <script src="assets/js/main.js"></script>
    <script>
        // for loop 1x isi location.reload()
        
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}


        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });


        // ambil dari alertLogout.php
    </script>

</body>

</html>