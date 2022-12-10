<?php

require_once "core/init.php";
$SadminUser = new ControllerSuperadminUser();

$ju = $SadminUser->jumlah_user();
$ja = $SadminUser->jumlah_admin();
$tb_admin = $SadminUser->table_admin();
$tb_user = $SadminUser->table_user();

// make method get_data from user_data
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <!--loader start  -->
    <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div>
    <!-- loader end -->
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <form action="userSuperAdmin.php" method="post">
                <!-- header -->
                <?php require_once 'components/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/sidebar.php'; ?>

            </form>
            <!-- table start -->
            <section class="mt-24 text-neutral_050  ml-16">
                <div class="container px-6 max-w-full ">
                    <div id="atas" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">user</h1>
                                    <h2><?php echo $ju ?></h2>

                                </div>
                                <span id="open" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                    <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                    <span id="plus" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                </span>
                            </div>
                            <span id="garis" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <div class="w-full mx-auto  relative h-[360px] overflow-y-auto mt-2" id="table">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="font-semibold ">
                                            <td class="relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass "></i>
                                                    <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                                </div>
                                            </td>
                                            <td class=" ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100">
                                                    <h1 class=" uppercase">No. Hp</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class=" ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">Saldo</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class=" ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">Play Time</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class=" ">
                                                <button onclick="showItems()" id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 drop">
                                                    <h1 class="capitalize font-normal">option</h1>
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody class="overflow-y-hidden">
                                        <!-- list 1 start -->
                                        <?php
                                        $row = 0;
                                        while ($row < count($tb_user)) { ?>
                                            <tr class="">
                                                <td class="flex flex-row gap-x-3 pb-5">
                                                    <div class="form-control ml-[5px]">
                                                        <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $row + 1 ?></h1>
                                                    </div>
                                                    <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                        <img src="<?php echo $tb_user[$row]['img'] ?>" alt="" class="rounded-full w-full h-full object-cover">
                                                    </div>
                                                    <div class="flex flex-col gap-y-1 ml-2">
                                                        <h1 class="font-semibold"><?php echo $tb_user[$row]['username'] ?></h1>
                                                        <h2 class="text-neutral_400 text-xs"><?php echo $tb_user[$row]['email'] ?></h2>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?php echo $tb_user[$row]['hp'] ?></td>
                                                <td class="text-center"><?php echo $tb_user[$row]['saldo'] ?></td>
                                                <td class=" text-center"><?php echo $tb_user[$row]['playtime'] ?></td>
                                                <td class=" text-center">
                                                    <button class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-2">
                                                        <h1 class="text-neutral_900 font-semibold">Topup</h1>
                                                        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#303030" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php $row++;
                                        }
                                        ?>
                                        <!-- list 1 end -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- table end -->

            <!-- table start -->
            <section id="table-admin" class="mt-12 mb-8 text-neutral_050  ml-16">
                <div class="container px-6 max-w-full ">
                    <div id="atas3" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">Admin</h1>
                                    <h2><?php echo $ja ?></h2>
                                </div>
                                <div class="flex flex-row gap-5">
                                    <button id="tambahAdmin" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-2">
                                        <h1 class="text-neutral_900 font-semibold">Add Admin</h1>
                                        <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.746 11.25C14.494 11.25 8.00219 12.7462 8.00219 15.75V18H27.4898V15.75C27.4898 12.7462 20.998 11.25 17.746 11.25ZM6.78421 6.75V3.375H4.34826V6.75H0.694336V9H4.34826V12.375H6.78421V9H10.4381V6.75M17.746 9C19.0381 9 20.2773 8.52589 21.1909 7.68198C22.1046 6.83807 22.6179 5.69347 22.6179 4.5C22.6179 3.30653 22.1046 2.16193 21.1909 1.31802C20.2773 0.474106 19.0381 0 17.746 0C16.4539 0 15.2147 0.474106 14.301 1.31802C13.3874 2.16193 12.8741 3.30653 12.8741 4.5C12.8741 5.69347 13.3874 6.83807 14.301 7.68198C15.2147 8.52589 16.4539 9 17.746 9Z" fill="#303030" />
                                        </svg>

                                        </svg>
                                    </button>
                                    <span id="open3" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                        <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                        <span id="plus3" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                    </span>
                                </div>
                            </div>
                            <span id="garis3" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <div class="w-full mx-auto  relative h-[360px] overflow-y-auto mt-2" id="table3">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="font-semibold ">
                                            <td class="relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass "></i>
                                                    <input type="text" id="search3" name="search3" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                                </div>
                                            </td>
                                            <td class=" ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">level</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">lokasi</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class=" ">
                                                <button onclick="showItems()" id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 drop">
                                                    <h1 class="capitalize font-normal">option</h1>
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody class="overflow-y-hidden">
                                        <!-- list start -->
                                        <?php
                                        $row = 0;
                                        while ($row < count($tb_admin)) { ?>
                                            <tr class="">
                                                <td class="flex flex-row gap-x-4 pb-5">
                                                    <div class="form-control ml-[5px]">
                                                        <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $row + 1 ?></h1>
                                                    </div>
                                                    <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                        <img src="<?php echo $tb_admin[$row]['img'] ?>" " alt="" class=" rounded-full w-full h-full object-cover">
                                                        </>
                                                        <div class="flex flex-col gap-y-1">
                                                            <h1 class="font-semibold"><?php echo $tb_admin[$row]['username'] ?></h1>
                                                            <h2 class="text-neutral_400 text-xs"><?php echo $tb_admin[$row]['id_admin'] ?></h2>
                                                        </div>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    echo $tb_admin[$row]['role'];
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    echo $tb_admin[$row]['lok'];
                                                    ?>
                                                </td>
                                                <td class=" text-center">
                                                    <div class="h-[36px] w-[91px] bg-neutral_050 rounded-full p-2 flex flex-row items-center justify-center mx-auto gap-2 ">
                                                        <button class=" bg-primary_600 w-[35px] h-[28px] rounded-3xl relative">
                                                            <svg width="19" class="mx-auto" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                                            </svg>
                                                        </button>
                                                        <span class="w-0.5 h-6 bg-neutral_900"></span>
                                                        <button class="bg-primary_600 w-[35px] h-[28px] rounded-3xl relative">
                                                            <svg width="16" class="mx-auto" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                            </svg>
                                                        </button>


                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- list end -->
                                        <?php $row++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- table end -->


            <!-- modal_tambah admin end -->
            <section>
                <div id="modal_overlay_addAdmin" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0 z-50">

                    <!-- modal -->
                    <div id="modal_addAdmin" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[520px] w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
                        <div class="flex flex-row justify-start ml-[23px]  gap-3 mb-3">
                            <svg width="21" height="24" viewBox="0 0 21 24" class="my-auto" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.28571 0C1.01714 0 0 1.01714 0 2.28571V20.5714C0 21.1776 0.240816 21.759 0.66947 22.1877C1.09812 22.6163 1.67951 22.8571 2.28571 22.8571H6.85714V20.6743L9.24572 18.2857H2.28571V16H11.5314L13.8171 13.7143H2.28571V11.4286H16.1029L18.2857 9.24572V6.85714L11.4286 0H2.28571ZM10.2857 1.71429L16.5714 8H10.2857V1.71429ZM18.4571 12.5714C18.2857 12.5714 18.1257 12.6286 18 12.7543L16.8343 13.92L19.2229 16.2971L20.3886 15.1429C20.6286 14.8914 20.6286 14.48 20.3886 14.24L18.9029 12.7543C18.7771 12.6286 18.6171 12.5714 18.4571 12.5714ZM16.16 14.5943L9.14286 21.6229V24H11.52L18.5486 16.9714L16.16 14.5943Z" fill="#FAFAFA" />
                            </svg>
                            <h1 id="mdoalText" class="text-neutral_050 font-base font-noto-sans text-xl">Tambah Admin>
                        </div>
                        <span class="w-11/12 h-0.5 mx-auto -mt-4 bg-neutral_600"></span>
                        <form action="userSuperAdmin.php" method="post" class="flex flex-col items-center justify-center gap-4 mt-2" enctype="multipart/form-data">
                            <!-- gambar start -->
                            <div class="flex flex-col justify-center items-center relative">
                                <!-- show previe image from Upload::uploadimage() -->
                                <img src="components/kamera.png" alt="" id="preview-Admin" class="w-[100px] h-[100px] object-cover rounded-full shadow-elevation-dark-4 bg-transparent">
                                <label>
                                    <input class="text-sm cursor-pointer w-36 hidden" accept="image/*" type="file" name="image-Admin" id="image-Admin" />
                                    <div class="cursor-pointer rounded-full bg-primary_400 w-[35px] h-[35px] flex flex-row justify-center items-center absolute  bottom-1 -right-1.5">
                                        <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 3V0H5V3H8V5H5V8H3V5H0V3M6 9V6H9V3H16L17.8 5H21C22.1 5 23 5.9 23 7V19C23 20.1 22.1 21 21 21H5C3.9 21 3 20.1 3 19V9M13 18C17.45 18 19.69 12.62 16.54 9.46C13.39 6.31 8 8.55 8 13C8 15.76 10.24 18 13 18ZM9.8 13C9.8 15.85 13.25 17.28 15.26 15.26C17.28 13.25 15.85 9.8 13 9.8C11.24 9.8 9.8 11.24 9.8 13Z" fill="black" />
                                        </svg>
                                    </div>
                                </label>
                            </div>
                            <!-- gambar end -->

                            <div class="relative z-0 w-11/12 mt-5">
                                <input type="text" id="nama-ps-Admin" name="nama-ps-Admin" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 valid:text-neutral_500 peer" placeholder=" " />
                                <label for="nama-ps-Admin" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Nama PS</label>
                                <svg width="30" height="24" class="absolute top-4 left-5" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27 0C27.7956 0 28.5587 0.31607 29.1213 0.87868C29.6839 1.44129 30 2.20435 30 3V21C30 21.7956 29.6839 22.5587 29.1213 23.1213C28.5587 23.6839 27.7956 24 27 24H3C2.20435 24 1.44129 23.6839 0.87868 23.1213C0.31607 22.5587 0 21.7956 0 21V3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.31607 2.20435 0 3 0H27ZM13.5 13.5H10.5V16.5H13.5V13.5ZM25.5 13.5H16.5V16.5H25.5V13.5ZM7.5 7.5H4.5V10.5H7.5V7.5ZM25.5 7.5H10.5V10.5H25.5V7.5Z" fill="#303030" />
                                </svg>
                            </div>
                            <div class="relative z-0 w-11/12">
                                <input type="text" id="harga-ps-Admin" name="harga-ps-Admin" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                                <label for="harga-ps-Admin" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Harga PS</label>
                                <svg width="14" height="24" class="absolute top-4 left-7" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#303030" />
                                </svg>
                            </div>
                            <div class="relative z-0 w-11/12 ">
                                <svg width="14" height="24" class="absolute top-4 left-7" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.12 20.2267L1.89333 16L0.0133336 17.88L6.12 24L12.24 17.88L10.3467 16M6.12 3.77333L10.3467 8L12.2267 6.12L6.12 0L0 6.12L1.89333 8L6.12 3.77333Z" fill="black" />
                                </svg>
                                <select name="kategori-ps-Admin" id="kategori-ps-Admin" required class="select select-bordered font-normal py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-16  pr-3 ">
                                    <option value="" class="text-neutral_500 text-base" hidden>Pilih Kategori PS</option>
                                    <option id="option" value="PS1" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 1</option>
                                    <option id="option" value="PS2" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 2</option>
                                    <option id="option" value="PS3" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 3</option>
                                    <option id="option" value="PS4" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 4</option>
                                    <option id="option" value="PS5" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 5</option>
                                </select>
                                <i id="arrow_addAdmin" class="fa-solid fa-caret-down fa-2x absolute right-4 mt-3"></i>

                            </div>

                            <div class="flex flex-row gap-11 mt-2 items-center justify-center w-full">
                                <button type="button" onclick="openModalAddAdmin(false)" name="Batal-Admin" id="Batal-Admin" value="Batal-Admin" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl px-4">
                                    Batal
                                </button>
                                <button type="submit" name="Konfirmasi-Admin" id="Konfirmasi-Admin" class="bg-[#4FCF2F] text-neutral_050 w-5/12 h-12 rounded-2xl px-4">Konfirmasi</button>
                            </div>
                        </form>

                    </div>

                </div>
            </section>
            <!-- modal_tambah admin end -->
        </div>
    </main>

    </div>
    <script>
        const modal_overlay_addAdmin = document.querySelector('#modal_overlay_addAdmin');
        const modal_addAdmin = document.querySelector('#modal_addAdmin');
        const tambahAdmin = document.querySelector('#tambahAdmin');
        const table_admin = document.getElementById('table-admin');

        // if lokasi not 'Bojonegoro' or '<input class="hidden" name="lok">Bojonegoro' from local storage  table admin classlist hidden
        window.addEventListener('load', () => {
            if (localStorage.getItem('lokasi') !== 'Bojonegoro') {
                table_admin.classList.add('hidden')
                console.log(localStorage.getItem('lokasi'))
            } else {
                table_admin.classList.remove('hidden')
                console.log(localStorage.getItem('lokasi'))
            }
        })


        const openModalAddAdmin = (value) => {
            const modalClAdmin = modal_addAdmin.classList
            const overlayClAdmin = modal_overlay_addAdmin

            if (value) {
                overlayClAdmin.classList.remove('hidden')
                setTimeout(() => {
                    modalClAdmin.remove('opacity-0')
                    modalClAdmin.remove('-translate-y-full')
                    modalClAdmin.remove('scale-150')
                }, 100);
            } else {
                modalClAdmin.add('-translate-y-full')
                setTimeout(() => {
                    modalClAdmin.add('opacity-0')
                    modalClAdmin.add('scale-150')
                }, 100);
                setTimeout(() => overlayClAdmin.classList.add('hidden'), 300);
            }
        }
        openModalAddAdmin(false)

        tambahAdmin.addEventListener('click', () => {
            openModalAddAdmin(true)
        });


        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });


        const open = document.getElementById('open');
        const atas = document.getElementById('atas');
        const table = document.getElementById('table');
        const garis = document.getElementById('garis');
        const plus = document.getElementById('plus');

        const open3 = document.getElementById('open3');
        const atas3 = document.getElementById('atas3');
        const table3 = document.getElementById('table3');
        const garis3 = document.getElementById('garis3');
        const plus3 = document.getElementById('plus3');

        const openTable = () => {
            open.addEventListener("click", function() {
                if (atas.classList.contains('h-[77px]')) {
                    localStorage.setItem("open-table", "true");
                } else {
                    localStorage.setItem("open-table", "false");
                }
                themeMode();
            });

            function themeMode() {
                if (localStorage.getItem("open-table") == "false") {
                    garis.classList.add('hidden');
                    plus.classList.add('hidden');
                    table.classList.add('hidden');
                    atas.classList.remove('h-[450px]');
                    atas.classList.add('h-[77px]');
                } else {
                    setTimeout(() => {
                        table.classList.remove('hidden');
                        garis.classList.remove('hidden');
                        plus.classList.remove('hidden');
                        garis.classList.add('ease-in-out');
                        table.classList.add('ease-in-out');
                        atas.classList.add('h-[450px]');
                        atas.classList.remove('h-[77px]');
                    }, 100);
                }
            }
            if (localStorage.getItem("open-table") !== null) {
                themeMode();
            }
            if (atas.classList.contains("h-[450px]")) {
                open.checked = true;
            }
        }
        openTable();

        const openTable3 = () => {
            open3.addEventListener("click", function() {
                if (atas3.classList.contains('h-[77px]')) {
                    localStorage.setItem("open-table3", "true");
                } else {
                    localStorage.setItem("open-table3", "false");
                }
                themeMode();
            });

            function themeMode() {
                if (localStorage.getItem("open-table3") == "false") {
                    garis3.classList.add('hidden');
                    plus3.classList.add('hidden');
                    table3.classList.add('hidden');
                    atas3.classList.remove('h-[450px]');
                    atas3.classList.add('h-[77px]');
                } else {
                    setTimeout(() => {
                        table3.classList.remove('hidden');
                        garis3.classList.remove('hidden');
                        plus3.classList.remove('hidden');
                        garis3.classList.add('ease-in-out');
                        table3.classList.add('ease-in-out');
                        atas3.classList.add('h-[450px]');
                        atas3.classList.remove('h-[77px]');
                    }, 100);
                }
            }
            if (localStorage.getItem("open-table3") !== null) {
                themeMode();
            }
            if (atas3.classList.contains("h-[450px]")) {
                open3.checked = true;
            }
        }
        openTable3();

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
</body>


</html>