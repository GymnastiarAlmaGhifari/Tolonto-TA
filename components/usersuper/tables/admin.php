<!-- table start -->
<section id="table-admin" class="mt-12 mb-8 text-neutral_050  ml-16">
    <div class="container px-6 max-w-full ">
        <div id="atas3" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
            <div class="flex flex-wrap flex-col ">
                <div class=" flex flex-row justify-between items-center -mb-3">
                    <div class="flex gap-4">
                        <h1 id="texttable" class="capitalize font-semibold">Admin</h1>
                        <h2><?php echo $ja ?></h2>
                    </div>
                    <div class="flex flex-row gap-5">
                        <button id="tambahAdmin" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-3">
                            <h1 class="text-neutral_900 font-semibold">Tambah Admin</h1>
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
                <div class="w-full mx-auto relative block h-[360px] overflow-y-auto mt-2" id="table3">
                    <table class="w-full">
                        <thead class="bg-neutral_800 sticky top-0">
                            <tr class="font-semibold ">
                                <th scope="col" class="text-left relative">
                                    <div class="flex flex-row gap-x-3 items-center">
                                        <i class="fa-solid fa-magnifying-glass "></i>
                                        <input type="text" id="search3" name="search3" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                    </div>
                                </th>
                                <th scope="col" class="text-left  ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">level</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">lokasi</h1>
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
                                            <img src="<?php echo $tb_admin[$row]['img'] ?>" alt="" class=" rounded-full w-full h-full object-cover">
                                        </div>
                                        <div class="flex flex-col gap-y-1">
                                            <h1 class="font-semibold"><?php echo $tb_admin[$row]['username'] ?></h1>
                                            <h2 id="id_admin" name="id_admin" class="text-neutral_400 text-xs"><?php echo $tb_admin[$row]['id_admin'] ?></h2>
                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo $tb_admin[$row]['role']; ?></td>
                                    <td class="text-center"><?php echo $tb_admin[$row]['lok']; ?></td>
                                    <td class=" text-center">
                                        <div class="h-[36px] w-[91px] bg-neutral_050 rounded-full p-2 flex flex-row items-center justify-center mx-auto gap-2 ">
                                            <button id="editAdmin" name="editAdmin" type="submit" value="<?php echo $tb_admin[$row]['id_admin'] ?>" class=" hover:bg-neutral_900/20  w-[35px] h-[28px] rounded-3xl">
                                                <svg width="19" class="mx-auto" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                                </svg>
                                                <input type="hidden" name="inputpost">
                                            </button>
                                            <span class="w-0.5 h-6 bg-neutral_900"></span>
                                            <button id="deleteAdmin" value="<?php echo $tb_admin[$row]['id_admin'] ?>" class="hover:bg-neutral_900/20 w-[35px] h-[28px] rounded-3xl">
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
<script>
    const open3 = document.getElementById('open3');
    const atas3 = document.getElementById('atas3');
    const table3 = document.getElementById('table3');
    const garis3 = document.getElementById('garis3');
    const plus3 = document.getElementById('plus3');


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php require_once 'components/usersuper/modals/addAdmin.php'; ?>
<?php require_once 'components/usersuper/modals/editAdmin.php'; ?>
<?php require_once 'components/usersuper/modals/deleteAdmin.php'; ?>