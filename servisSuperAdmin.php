<?php
require_once 'core/init.php';

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
                <?php require_once 'components/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/sidebar.php'; ?>
                <!-- table start -->
            </form>
            <section class="mt-24 text-neutral_050  ml-16">
                <div class="container px-6 max-w-full ">
                    <div id="atas" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">Sewa Aktif</h1>
                                    <h2>6</h2>
                                </div>
                                <span id="open" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                    <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                    <span id="plus" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                </span>
                            </div>
                            <span id="garis" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <div class="w-full mx-auto  relative block max-h-[360px] overflow-y-auto mt-2" id="table">
                                <table class="w-full table-auto">
                                    <thead class="bg-neutral_800 sticky top-0">
                                        <tr class="font-semibold ">
                                            <th scope="col" class="text-left relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass "></i>
                                                    <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                                </div>
                                            </th>
                                            <th scope="col" class="text-left  ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100">
                                                    <h1 class=" uppercase">nama ps</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left  ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">play time</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left  ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">waktu</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">total</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left  ">
                                                <button onclick="showItems()" id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 drop">
                                                    <h1 class="capitalize font-normal">option</h1>
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="overflow-y-hidden">
                                        <!-- list 1 start -->
                                        <tr class="">
                                            <td class="flex flex-row gap-x-3 pb-5">
                                                <div class="form-control ">
                                                    <h1 class="font-semibold font-noto-sans text-xl my-auto">1</h1>
                                                </div>
                                                <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                    <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" alt="" class="rounded-full w-full h-full object-cover">
                                                </div>
                                                <div class="flex flex-col gap-y-1 ml-2">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <div class="dropdown dropdown-hover dropdown-right dropdown-end">
                                                    <label tabindex="0" class="btn m-1 hover:bg-neutral_600 bg-transparent">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </label>
                                                    <ul tabindex="0" class="dropdown-content -mb-1  shadow-elevation-light-4 bg-neutral_050 rounded-lg w-12 text-neutral_050">
                                                        <li class="cursor-pointer active:bg-primary_500 active:text-neutral_900 hover:bg-neutral_500 rounded-sm h-8 font-noto-sans text-base">
                                                            <button>
                                                                <svg class="mx-auto my-1.5" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                                                </svg>
                                                            </button>
                                                        </li>
                                                        <li class="cursor-pointer active:bg-primary_500 active:text-neutral_900  hover:bg-neutral_500 rounded-sm h-8 font-noto-sans text-base">
                                                            <button>
                                                                <svg class="mx-auto my-1.5" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                                </svg>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- list 1 end -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- table end -->

            <!-- <div class="w-20 h-20 bg-neutral_050">
                    <button class="btn btn-ghost">
                        <h1>iawjdiajdoaiijoaijdawoj</h1>
                    </button>
                </div> -->

            <!-- table start -->
            <section class="mt-12 text-neutral_050  ml-16">
                <div class="container px-6 max-w-full ">
                    <div id="atas2" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">Sewa Aktif</h1>
                                    <h2>6</h2>
                                </div>
                                <span id="open2" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                    <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                    <span id="plus2" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                </span>
                            </div>
                            <span id="garis2" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <div class="w-full mx-auto  relative max-h-[360px] block overflow-y-auto mt-2" id="table2">
                                <table class="w-full table-auto">
                                    <thead class="bg-neutral_800 sticky top-0">
                                        <tr class="font-semibold ">
                                            <th scope="col" class="text-left relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass "></i>
                                                    <input type="text" id="search2" name="search2" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                                </div>
                                            </th>
                                            <th scope="col" class="text-left  ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100">
                                                    <h1 class=" uppercase">nama ps</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left  ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">play time</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left  ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">waktu</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">total</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left  ">
                                                <button onclick="showItems()" id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 drop">
                                                    <h1 class="capitalize font-normal">option</h1>
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="overflow-y-hidden">
                                        <!-- list 1 start -->
                                        <tr class="">
                                            <td class="flex flex-row gap-x-3 pb-5">
                                                <div class="form-control ">
                                                    <h1 class="font-semibold font-noto-sans text-xl my-auto">1</h1>
                                                </div>
                                                <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                    <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" alt="" class="rounded-full w-full h-full object-cover">
                                                </div>
                                                <div class="flex flex-col gap-y-1 ml-2">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <div class="dropdown dropdown-hover dropdown-right dropdown-end">
                                                    <label tabindex="0" class="btn m-1 hover:bg-neutral_600 bg-transparent">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </label>
                                                    <ul tabindex="0" class="dropdown-content -mb-1  shadow-elevation-light-4 bg-neutral_050 rounded-lg w-12 text-neutral_050">
                                                        <li class="cursor-pointer active:bg-primary_500 active:text-neutral_900 hover:bg-neutral_500 rounded-sm h-8 font-noto-sans text-base">
                                                            <button>
                                                                <svg class="mx-auto my-1.5" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                                                </svg>
                                                            </button>
                                                        </li>
                                                        <li class="cursor-pointer active:bg-primary_500 active:text-neutral_900  hover:bg-neutral_500 rounded-sm h-8 font-noto-sans text-base">
                                                            <button>
                                                                <svg class="mx-auto my-1.5" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                                </svg>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
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
            <section class="mt-12 mb-8 text-neutral_050  ml-16">
                <div class="container px-6 max-w-full ">
                    <div id="atas3" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">Sewa Aktif</h1>
                                    <h2>6</h2>
                                </div>
                                <span id="open3" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                    <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                    <span id="plus3" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                </span>
                            </div>
                            <span id="garis3" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <div class="w-full mx-auto  relative max-h-[360px] block overflow-y-auto mt-2" id="table3">
                                <table class="w-full table-auto">
                                    <thead class="bg-neutral_800 sticky top-0">
                                        <tr class="font-semibold ">
                                            <th scope="col" class="text-leftrelative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass "></i>
                                                    <input type="text" id="search3" name="search3" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                                </div>
                                            </th>
                                            <th scope="col" class="text-left ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100">
                                                    <h1 class=" uppercase">nama ps</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">play time</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">waktu</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">total</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </th>
                                            <th scope="col" class="text-left ">
                                                <button onclick="showItems()" id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 drop">
                                                    <h1 class="capitalize font-normal">option</h1>
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="overflow-y-hidden">
                                        <!-- list 1 start -->
                                        <tr class="">
                                            <td class="flex flex-row gap-x-3 pb-5">
                                                <div class="form-control ">
                                                    <h1 class="font-semibold font-noto-sans text-xl my-auto">1</h1>
                                                </div>
                                                <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                    <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" alt="" class="rounded-full w-full h-full object-cover">
                                                </div>
                                                <div class="flex flex-col gap-y-1 ml-2">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <div class="dropdown dropdown-hover dropdown-right dropdown-end">
                                                    <label tabindex="0" class="btn m-1 hover:bg-neutral_600 bg-transparent">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </label>
                                                    <ul tabindex="0" class="dropdown-content -mb-1  shadow-elevation-light-4 bg-neutral_050 rounded-lg w-12 text-neutral_050">
                                                        <li class="cursor-pointer active:bg-primary_500 active:text-neutral_900 hover:bg-neutral_500 rounded-sm h-8 font-noto-sans text-base">
                                                            <button>
                                                                <svg class="mx-auto my-1.5" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                                                </svg>
                                                            </button>
                                                        </li>
                                                        <li class="cursor-pointer active:bg-primary_500 active:text-neutral_900  hover:bg-neutral_500 rounded-sm h-8 font-noto-sans text-base">
                                                            <button>
                                                                <svg class="mx-auto my-1.5" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                                </svg>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- list 1 end -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- table end -->

        </div>
    </main>

    <script>
        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });


        const open = document.getElementById('open');
        const atas = document.getElementById('atas');
        const table = document.getElementById('table');
        const garis = document.getElementById('garis');
        const plus = document.getElementById('plus');

        const open2 = document.getElementById('open2');
        const atas2 = document.getElementById('atas2');
        const table2 = document.getElementById('table2');
        const garis2 = document.getElementById('garis2');
        const plus2 = document.getElementById('plus2');

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

        const openTable2 = () => {
            open2.addEventListener("click", function() {
                if (atas2.classList.contains('h-[77px]')) {
                    localStorage.setItem("open-table2", "true");
                } else {
                    localStorage.setItem("open-table2", "false");
                }
                themeMode();
            });

            function themeMode() {
                if (localStorage.getItem("open-table2") == "false") {
                    garis2.classList.add('hidden');
                    plus2.classList.add('hidden');
                    table2.classList.add('hidden');
                    atas2.classList.remove('h-[450px]');
                    atas2.classList.add('h-[77px]');
                } else {
                    setTimeout(() => {
                        table2.classList.remove('hidden');
                        garis2.classList.remove('hidden');
                        plus2.classList.remove('hidden');
                        garis2.classList.add('ease-in-out');
                        table2.classList.add('ease-in-out');
                        atas2.classList.add('h-[450px]');
                        atas2.classList.remove('h-[77px]');
                    }, 100);
                }
            }
            if (localStorage.getItem("open-table2") !== null) {
                themeMode();
            }
            if (atas2.classList.contains("h-[450px]")) {
                open2.checked = true;
            }
        }
        openTable2();

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