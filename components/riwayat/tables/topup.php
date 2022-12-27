<!-- table start -->
<section class="mt-12 mb-8 text-neutral_050  ml-16">
    <div class="container px-6 max-w-full ">
        <div id="atas3" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
            <div class="flex flex-wrap flex-col ">
                <div class=" flex flex-row justify-between items-center -mb-3">
                    <div class="flex gap-4 items-center">
                        <h1 class="capitalize font-semibold">Topup</h1>
                        <h2><?php echo $jumlah_topup ?></h2>
                    </div>
                    <div class="flex flex-row gap-2 sm:gap-5">
                        <button id="hapus-semua-topup" class="h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-3">
                            <h1 class="text-neutral_900 font-semibold hidden sm:block">Hapus Semua Topup</h1>
                            <svg width="16" class="xs:w-[22px] sm:w-[26px]" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                            </svg>
                        </button>
                        <span id="open3" class="w-[36px] h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                            <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                            <span id="plus3" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                        </span>
                    </div>
                </div>
                <span id="garis3" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                <h1 id="data-kosong3" class="hidden my-auto mt-3 text-xl">Tidak Ada Data</h1>
                <div class="w-full mx-auto  relative h-[360px] block overflow-y-auto mt-2" id="table3">
                    <table class="w-full table-auto">
                        <thead class="bg-neutral_800 sticky -top-[1.4px]">
                            <tr class="font-semibold ">
                                <th scope="col" class="text-left pl-4 relative">
                                    <div class="flex flex-row gap-x-3 items-center">
                                        <i class="fa-solid fa-magnifying-glass "></i>
                                        <input type="text" id="search3" name="search3" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                    </div>
                                </th>
                                <th scope="col" class="text-left pl-4">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900">
                                        <h1 class=" uppercase">Email User</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                    <button class="flex flex-row items-center ml-14 gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">Nominal</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">waktu</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left pl-4 ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">Admin</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                    <button onclick="showItems()" id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 drop">
                                        <h1 class="capitalize font-normal">option</h1>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-hidden">
                            <!-- list 1 start -->
                            <?php
                            $rows = 0;
                            if (empty($topup)) {
                                echo
                                '<script>
                                document.getElementById("table3").style.display = "none"
                                    
                                document.getElementById("data-kosong3").classList.remove("hidden") 
            
                                document.getElementById("atas3").classList.add("h-[450px]") 

                                if (document.getElementById("atas3").classList.contains("h-[77px]")) {
                                    document.getElementById("data-kosong3").classList.add("hidden")
                                }

                                    </script> ';
                            } else {
                                while ($rows < count($topup)) { ?>
                                    <tr class="">
                                        <td class="pl-4  flex flex-row gap-x-3 pb-5">
                                            <div class="form-control ">
                                                <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $rows + 1 ?></h1>
                                            </div>
                                            <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                <img src="<?php echo $topup[$rows]['img'] ?>" alt="" class="rounded-full w-full h-full object-cover">
                                            </div>
                                            <div class="flex flex-col gap-y-1 ml-2">
                                                <h1 class="font-semibold"><?php echo $topup[$rows]['username'] ?></h1>
                                                <h2 class="text-neutral_400 text-xs"><?php echo $topup[$rows]['id_topup'] ?></h2>
                                            </div>
                                        </td>
                                        <td class="pl-4  text-center"><?php echo $topup[$rows]['email'] ?></td>
                                        <td class="text-left pl-24 "><?php echo  Rupiah::to($topup[$rows]['jml_topup']) ?></td>
                                        <td id="waktu_topup" class=" text-center"><?php echo date('H:i:s m/d/y', strtotime($topup[$rows]['waktu'])) ?></td>
                                        <td class="pl-4  text-center"><?php echo $topup[$rows]['admin'] ?></td>
                                        <td class="pl-4   text-center">
                                            <button id="hapus-topup" value="<?php echo $topup[$row]['id_topup'] ?>" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-2">
                                                <h1 class="text-error_600 font-semibold">hapus</h1>
                                                <svg widsth="16" class="mx-auto" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                            <?php $rows++;
                                }
                            } ?>
                            <!-- list 1 end -->
                        </tbody>
                    </table>
                    <h1 id="tidak_ditemukan3" class="hidden mt-7 ml-2 text-lg">Data Tidak Ditemukan</h1>
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
    const search3 = document.getElementById('search3');
    const data_kosong3 = document.getElementById('data-kosong3');
    const waktu_topup = document.querySelectorAll('#waktu_topup');
    const tidak_ditemukan3 = document.getElementById('tidak_ditemukan3');

    window.addEventListener("load", () => {
        if (localStorage.getItem("open-table-riwayat-aktif") == "false") {
            data_kosong3.classList.add('hidden');
        }
    });

    <?php if (empty($topup)) { ?>
        data_kosong3.classList.remove('hidden');
        table3.classList.add('hidden');
        open3.addEventListener("click", () => {
            if (localStorage.getItem("open-table-riwayat-aktif") == "false") {
                data_kosong3.classList.remove('hidden');
                table3.classList.add('hidden');
            } else {
                data_kosong3.classList.add('hidden');
                table3.classList.add('hidden');
            }
        });

    <?php } ?>

    waktu_topup.forEach((waktu) => {
        waktu.innerHTML = waktu.innerHTML.replace(' ', ' - ');
    });


    const openTable3 = () => {
        open3.addEventListener("click", function() {
            if (atas3.classList.contains('h-[77px]')) {
                localStorage.setItem("open-table-riwayat-aktif", "true");
            } else {
                localStorage.setItem("open-table-riwayat-aktif", "false");
            }
            openTab();
        });

        function openTab() {
            if (localStorage.getItem("open-table-riwayat-aktif") == "false") {
                garis3.classList.add('hidden');
                plus3.classList.add('hidden');
                table3.classList.add('hidden');
                atas3.classList.remove('h-[450px]');
                atas3.classList.add('h-[77px]');
            } else {
                setTimeout(() => {
                    table3.classList.remove('hidden');
                }, 150);
                garis3.classList.remove('hidden');
                plus3.classList.remove('hidden');
                garis3.classList.add('ease-in-out');
                table3.classList.add('ease-in-out');
                atas3.classList.add('h-[450px]');
                atas3.classList.remove('h-[77px]');
            }
        }
        if (localStorage.getItem("open-table-riwayat-aktif") !== null) {
            openTab();
        }
        if (atas3.classList.contains("h-[450px]")) {
            open3.checked = true;

        }

    }
    openTable3();

    const searchRiwayatTopup = () => {
        const input = document.getElementById('search3');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('table3');
        const tr = table.getElementsByTagName('tr');
        for (let i = 0; i < tr.length; i++) {
            const td = tr[i].getElementsByTagName('td')[0];
            if (td) {
                const txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
        if (tr[1].style.display == "none") {
            tidak_ditemukan3.classList.remove('hidden');
        } else {
            tidak_ditemukan3.classList.add('hidden');
        }
    }
    search3.addEventListener('keyup', searchRiwayatTopup);
</script>
<?php
require_once 'components/riwayat/modals/topup.php';
require_once 'components/riwayat/modals/semuaTopup.php';
?>