<!-- <h2 class="judul">Halaman Admin</h2>

<?php foreach ($users as $_user) : ?>
    <div class="list">
        <a class="list" href="dashboard.php?nama=<?php echo $_user['username'] ?>">
            <?php echo $_user['username'] ?></a>
    </div>
<?php endforeach; ?>


            <select name="lok" id="lok" class="btn btn-ghost w-[145px] h-[25px] capitalize font-semibold font-noto-sans gap-2 -mr-4 text-neutral_900">
            <?php foreach ($lok as $l) : ?>
                    <?php if ($l['nama_lok'] == $user_data['lok']) : ?>
                        <option class="bg-primary_050" selected><?php echo $l['nama_lok'] ?></option>
                    <?php else : ?>
                        <option class="bg-primary_050"><?php echo $l['nama_lok'] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>


xs:justify-center xs:-ml-[26px] xs:z-0 xl:justify-start lg:justify-start md:justify-start sm:justify-start
ml-5 2xl:ml-[26px] xl:ml-[26px] lg:ml-[26px] md:ml-[26px] sm:ml-[26px] mt-[28px]


<div class=" flex flex-row flex-wrap gap-7">
    <div class="w-[250px] h-[100px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 ">
        <h1 class="text-neutral_050 ml-3 mt-3">PlayStation Tersedia</h1>
        <h1 class="text-neutral_050 font-base text-5xl ml-[105px]">6</h1>
    </div>
    <div class="w-[250px]  h-[100px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 ">
        <h1 class="text-neutral_050  ml-3 mt-3">PlayStation Maintenance</h1>
        <h1 class="text-neutral_050 font-base text-5xl ml-[105px]">6</h1>
    </div>
    <div class="w-[250px] h-[100px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 ">
        <h1 class="text-neutral_050 ml-3 mt-3">Today's Booking</h1>
        <h1 class="text-neutral_050 font-base text-5xl ml-[105px]">6</h1>
    </div>
    <div class="w-[250px] h-[100px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 ">
        <h1 class="text-neutral_050 ml-3 mt-3">Laba Hari Ini</h1>
        <h1 class="text-neutral_050 font-base text-5xl mx-5">Rp. 300000</h1>
    </div>
</div>

<div class="text-neutral_050 ml-[26px] mt-[19px] font-noto-sans">main ditempat</div>

<div class="ml-[26px] mt-[28px]">
    <div class=" w-[350px] h-[250px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 flex flex-col relative">
        <div class="flex flex-row justify-between pt-2 px-5">
            <h1 class="text-neutral_050">PS No.1</h1>
            <div class="switch">
                <div class="switch__1">
                    <input type="checkbox" id="switch-1">
                    <label for="switch-1"></label>
                </div>
            </div>
        </div>
        <span class="bg-neutral_600 w-[326.67px] h-0.5 mb-0 mt-2 mx-2"></span>
        <div class="flex justify-center items-center relative">
            <img src="../public/image 7.png" alt="" class="scale-100">
        </div>
        <h1 class="uppercase font-noto-sans font-semibold text-neutral_050 px-5">PS 3</h1>
        <div class="flex flex-row justify-between px-5 text-neutral_050">
            <div class="flex flex-row items-center gap-x-2">
                <span class="w-3 h-3 rounded-full bg-[#32FC00]"></span>
                <h1>Aktif (14.00 - 15.00)</h1>
            </div>
            <div class="flex flex-row items-center gap-x-2">
                <h1>2 Jam</h1>
                <i class="fa-regular fa-clock"></i>
            </div>
        </div>
        <div class="flex flex-row justify-between px-5 text-neutral_050">
            <div class="flex flex-row items-center gap-x-2">
                <i class="fa-solid fa-dollar-sign"></i>
                <h1>Rp. 4000</h1>
            </div>
            <div class="flex flex-row items-center gap-x-2">
                <h1>nama user</h1>
                <i class="fas fa-user"></i>
            </div>
        </div>
    </div>
</div> -->

<section id="table-user2" class="mt-12 text-neutral_050  ml-16">
                <div class="container px-6  max-w-full xl:w-11/12 2xl:max-w-full md:w-11/12">
                    <div id="atas2" class="relative h-[450px] bg-neutral_800 rounded-xl px-8 duration-300 ease-in-out">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center h-[77px] -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">history rental</h1>
                                    <h2>6</h2>
                                </div>
                                <span id="open2" onclick="openTable2()" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                    <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                    <span id="plus2" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                </span>
                            </div>
                            <span id="garis2" class="w-full mx-auto -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <div class="absolute w-full mt-12" id="table2">
                                <table class="w-full mt-12 table-auto">
                                    <thead>
                                        <tr class="font-semibold ">
                                            <td class="py-2  relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass  mt-1"></i>
                                                    <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none focus:border-neutral_700 peer" placeholder=" " required>
                                                    <label for="search" id="placeholderSearch" class=" absolute ml-7 peer-focus:hidden peer-valid:hidden text-neutral_300 text-base">search</label>
                                                </div>
                                            </td>
                                            <td class="py-2 ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100">
                                                    <h1 class=" uppercase">nama ps</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="py-2 ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">play time</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="py-2 ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">waktu</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="py-2">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">total</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="py-2 ">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="capitalize font-normal">option</h1>
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody class="overflow-y-scroll w-full" style="height: 50vh;">
                                        <!-- list 1 start -->
                                        <tr class="">
                                            <td class="flex flex-row gap-x-3 pb-5">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 1 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
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


            <div class="" id="table">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="font-semibold ">
                                            <td class="py-2  relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass  mt-1"></i>
                                                    <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none focus:border-neutral_700 peer" placeholder=" " required>
                                                    <label for="search" id="placeholderSearch" class=" absolute ml-7 peer-focus:hidden peer-valid:hidden text-neutral_300 text-base">search</label>
                                                </div>
                                            </td>
                                            <td class="py-2 ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100">
                                                    <h1 class=" uppercase">nama ps</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="py-2 ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">play time</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="py-2 ">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">waktu</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="py-2">
                                                <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="uppercase">total</h1>
                                                    <i class="fa-solid fa-angle-up"></i>
                                                </button>
                                            </td>
                                            <td class="py-2 ">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 ">
                                                    <h1 class="capitalize font-normal">option</h1>
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- list 1 start -->
                                        <tr class="">
                                            <td class="flex flex-row gap-x-3 pb-5">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 1 end -->
                                        <!-- list 2 start -->
                                        <tr>
                                            <td class="flex flex-row gap-x-3">
                                                <div class="form-control -ml-2">
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
                                            <td class=" text-center">10.00 - 12.00</td>
                                            <td class="text-center">Rp.8000</td>
                                            <td class=" text-center">
                                                <button id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-3.5 px-6 text-neutral_100 ">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- list 2 end -->
                                    </tbody>
                                </table>
                            </div>