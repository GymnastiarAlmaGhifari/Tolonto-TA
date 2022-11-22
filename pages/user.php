<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">

            <!-- header -->
            <?php require_once 'components/header.php'; ?>
            <!-- sidebar -->
            <?php require_once 'components/sidebar.php'; ?>
            <!-- table start -->
            <section class="mt-24 text-neutral_050  ml-16">
                <div class="container px-6  max-w-full xl:w-11/12 2xl:max-w-full md:w-11/12">
                    <div id="atas" class="h-[450px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center h-[77px] -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">user</h1>
                                    <h2>6</h2>
                                </div>
                                <span id="open" onclick="openTable()" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                    <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                    <span id="plus" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                </span>
                            </div>
                            <span id="garis" class="w-full mx-auto -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <div class="w-full mx-auto  relative h-[360px] overflow-y-auto mt-2" id="table">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="font-semibold ">
                                            <td class="  relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass  mt-1"></i>
                                                    <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none focus:border-neutral_700 peer" placeholder=" " required>
                                                    <label for="search" id="placeholderSearch" class=" absolute ml-7 peer-focus:hidden peer-valid:hidden text-neutral_300 text-base">search</label>
                                                </div>
                                            </td>
                                            <td class=" ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100">
                                                    <h1 class=" uppercase">nama ps</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class=" ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">play time</h1>
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
                                        <tr class="">
                                            <td class="flex flex-row gap-x-3 pb-5">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <!-- <div class="dropdown dropdown-right">
                                                    <label tabindex="0" class="btn btn-ghost capitalize font-semibold font-noto-sans gap-2 -mr-4 text-neutral_900">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </label>
                                                    <ul tabindex="0" class="dropdown-content p-2 z-10 cursor-pointer space-y-2 shadow-elevation-light-4 bg-neutral_600 rounded-lg w-52 text-neutral_050">
                                                        <li class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                                                            wqdmoqwdoq
                                                        </li>
                                                        <li class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                                                            wqdmoqwdoq
                                                        </li>

                                                    </ul>
                                                </div> -->
                                                <!-- <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 peer">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <div class="hidden absolute peer-focus:block bg-neutral_600 z-20 -right-3">
                                                    <ul>
                                                        <li>wkokwdow</li>
                                                        <li>iwjiwj</li>
                                                    </ul>
                                                </div> -->
                                            </td>
                                        </tr>
                                        <!-- list 1 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- table end -->

            <!-- table start -->
            <section class="mt-12 text-neutral_050  ml-16">
                <div class="container px-6  max-w-full xl:w-11/12 2xl:max-w-full md:w-11/12">
                    <div id="atas2" class="h-[450px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center h-[77px] -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">admin</h1>
                                    <h2>6</h2>
                                </div>
                                <span id="open2" onclick="openTable2()" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                    <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                    <span id="plus2" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                </span>
                            </div>
                            <span id="garis2" class="w-full mx-auto -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <div class="w-full mx-auto  relative h-[360px] overflow-y-auto mt-2" id="table2">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="font-semibold ">
                                            <td class="  relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass  mt-1"></i>
                                                    <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none focus:border-neutral_700 peer" placeholder=" " required>
                                                    <label for="search" id="placeholderSearch" class=" absolute ml-7 peer-focus:hidden peer-valid:hidden text-neutral_300 text-base">search</label>
                                                </div>
                                            </td>
                                            <td class=" ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100">
                                                    <h1 class=" uppercase">nama ps</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class=" ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">play time</h1>
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
                                        <tr class="">
                                            <td class="flex flex-row gap-x-3 pb-5">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <!-- <div class="dropdown dropdown-right">
                                                    <label tabindex="0" class="btn btn-ghost capitalize font-semibold font-noto-sans gap-2 -mr-4 text-neutral_900">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </label>
                                                    <ul tabindex="0" class="dropdown-content p-2 z-10 cursor-pointer space-y-2 shadow-elevation-light-4 bg-neutral_600 rounded-lg w-52 text-neutral_050">
                                                        <li class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                                                            wqdmoqwdoq
                                                        </li>
                                                        <li class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                                                            wqdmoqwdoq
                                                        </li>

                                                    </ul>
                                                </div> -->
                                                <!-- <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 peer">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <div class="hidden absolute peer-focus:block bg-neutral_600 z-20 -right-3">
                                                    <ul>
                                                        <li>wkokwdow</li>
                                                        <li>iwjiwj</li>
                                                    </ul>
                                                </div> -->
                                            </td>
                                        </tr>
                                        <!-- list 1 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-[5px]">
                                                    <label class="label cursor-pointer">
                                                        <input type="checkbox" checked="checked" class="checkbox rounded-full bg-neutral_800 border-2 border-neutral_050" />
                                                    </label>
                                                </div>
                                                <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" width="42px" height="42px" alt="" class="rounded-full">
                                                <div class="flex flex-col gap-y-1">
                                                    <h1 class="font-semibold">john</h1>
                                                    <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                                </div>
                                            </td>
                                            <td class="text-center">PS No.1</td>
                                            <td class="text-center">2 Jam</td>

                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
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

    </div>
    <script src="../assets/js/main.js"></script>

    <script>
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



        // const btnOption = document.getElementById('btn-option');


        // const showItems = () => {
        //     // buat dropdown html di javascript

        //     if (btnOption.classList.contains('drop')) {
        //         btnOption.innerHTML = `
        //         <div class="flex flex-col gap-y-2">
        //             <a href="#" class="flex flex-row items-center gap-x-2">
        //                 <i class="fa-solid fa-edit"></i>
        //                 <h1 class="text-neutral_100">Edit</h1>
        //             </a>
        //             <a href="#" class="flex flex-row items-center gap-x-2">
        //                 <i class="fa-solid fa-trash"></i>
        //                 <h1 class="text-neutral_100">Delete</h1>
        //             </a>
        //         </div>
        //         `;
        //     } else {
        //         btnOption.innerHTML = `
        //         <i class="fa-solid fa-ellipsis"></i>
        //         `;
        //     }
        // }

        const openTable = () => {
            atas.classList.toggle('h-[450px]');
            atas.classList.toggle('h-[77px]');

            // hilangkan table dan muncul setelah 300ms dan ketika atas sudah berubah langsung hilang
            if (atas.classList.contains('h-[77px]')) {
                garis.classList.add('hidden');
                plus.classList.add('hidden');
                table.classList.add('hidden');

            } else {
                setTimeout(() => {
                    table.classList.remove('hidden');
                    garis.classList.remove('hidden');
                    plus.classList.remove('hidden');
                    garis.classList.add('ease-in-out');
                    table.classList.add('ease-in-out');
                }, 100);

            }

        }
        openTable();
        const openTable2 = () => {
            atas2.classList.toggle('h-[450px]');
            atas2.classList.toggle('h-[77px]');

            // hilangkan table dan muncul setelah 300ms dan ketika atas sudah berubah langsung hilang
            if (atas2.classList.contains('h-[77px]')) {
                garis2.classList.add('hidden');
                plus2.classList.add('hidden');
                table2.classList.add('hidden');

            } else {
                setTimeout(() => {
                    table2.classList.remove('hidden');
                    garis2.classList.remove('hidden');
                    plus2.classList.remove('hidden');
                    garis2.classList.add('ease-in-out');
                    table2.classList.add('ease-in-out');
                }, 100);

            }

        }
        openTable2();





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