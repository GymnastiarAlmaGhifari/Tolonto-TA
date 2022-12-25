<!-- table start -->
<section id="riwayat-sewa" class="mt-12 text-neutral_050  ml-16">
    <div class="container px-6 max-w-full ">
        <div id="atas2" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
            <div class="flex flex-wrap flex-col ">
                <div class=" flex flex-row justify-between items-center -mb-3">
                    <div class="flex gap-4">
                        <h1 class="capitalize font-semibold">Sewa</h1>
                        <h2><?php echo $jumlah_sewa ?></h2>
                    </div>
                    <div class="flex flex-row gap-2 sm:gap-5">
                        <button id="hapus-semua-sewa" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-3">
                            <h1 class="text-neutral_900 font-semibold hidden sm:block">Hapus Semua Sewa</h1>
                            <svg width="16" class="xs:w-[22px] sm:w-[26px]" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                            </svg>
                        </button>
                        <span id="open2" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                            <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                            <span id="plus2" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                        </span>
                    </div>
                </div>
                <span id="garis2" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                <h1 id="data-kosong2" class="hidden my-auto mt-3 text-xl">Tidak Ada Data</h1>
                <div class="w-full mx-auto  relative h-[360px] block overflow-y-auto mt-2" id="table2">
                    <table class="w-full table-auto">
                        <thead class="bg-neutral_800 sticky top-0">
                            <tr class="font-semibold ">
                                <th scope="col" class="text-leftrelative">
                                    <div class="flex flex-row gap-x-3 items-center">
                                        <i class="fa-solid fa-magnifying-glass "></i>
                                        <input type="text" id="search2" name="search2" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                    </div>
                                </th>
                                <th scope="col" class="text-left ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900">
                                        <h1 class=" uppercase">nama ps</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">Waktu order</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">lama sewa</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">waktu</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
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
                            <?php
                            $rows = 0;
                            if (empty($sewa)) {
                                echo
                                '<script>
                                document.getElementById("table2").style.display = "none"
                                    
                                document.getElementById("data-kosong2").classList.remove("hidden") 
            
                                document.getElementById("atas2").classList.add("h-[450px]") 

                                if (document.getElementById("atas2").classList.contains("h-[77px]")) {
                                    document.getElementById("data-kosong2").classList.add("hidden")
                                }

                                    </script> ';
                            } else {
                                while ($rows < count($sewa)) { ?>
                                    <tr class="">
                                        <td class="flex flex-row gap-x-3 pb-5">
                                            <div class="form-control ">
                                                <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $rows + 1 ?></h1>
                                            </div>
                                            <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                <img src="<?php echo $sewa[$rows]['img'] ?>" alt="" class="rounded-full w-full h-full object-cover">
                                            </div>
                                            <div class="flex flex-col gap-y-1 ml-2">
                                                <h1 class="font-semibold"><?php echo $sewa[$rows]['username'] ?></h1>
                                                <h2 class="text-neutral_400 text-xs"><?php echo $sewa[$rows]['id_sewa'] ?></h2>
                                            </div>
                                        </td>
                                        <td class="text-center"><?php echo $sewa[$rows]['nama_ps'] ?></td>
                                        <td class="text-center"><?php echo $sewa[$rows]['waktu_order'] ?></td>
                                        <td class="text-center"><?php echo $sewa[$rows]['playtime'] ?> Hari</td>
                                        <td class=" text-center"><?php list($date, $time) = explode(" ", $sewa[$rows]['mulai_sewa']);
                                                                    echo $time; ?>
                                            - <?php list($date, $time) = explode(" ", $sewa[$rows]['akhir_sewa']);
                                                echo $time; ?></td>
                                        <td class="text-center">Rp. <?php echo $sewa[$rows]['bayar'] ?></td>
                                        <td class=" text-center">
                                            <button id="hapus-sewa" value="<?php echo $topup[$row]['id_topup'] ?>" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-2">
                                                <h1 class="text-error_600 font-semibold">hapus</h1>
                                                <svg width="16" class="mx-auto" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- table end -->
<script>
    const open2 = document.getElementById('open2');
    const atas2 = document.getElementById('atas2');
    const table2 = document.getElementById('table2');
    const garis2 = document.getElementById('garis2');
    const plus2 = document.getElementById('plus2');
    const search2 = document.getElementById('search2');
    const data_kosong2 = document.getElementById('data-kosong2');
    const riwayat_sewa = document.getElementById('riwayat-sewa');

    window.addEventListener("load", () => {
        if (localStorage.getItem("open-table-riwayat-sewa") == "false") {
            data_kosong2.classList.add('hidden');
        }
        if (localStorage.getItem('lokasi') !== 'Bojonegoro') {
            riwayat_sewa.classList.add('hidden');
        } else {
            riwayat_sewa.classList.remove('hidden');
        }
    });

    <?php if (empty($sewa)) { ?>
        data_kosong2.classList.remove('hidden');
        table2.classList.add('hidden');
        open2.addEventListener("click", () => {
            if (localStorage.getItem("open-table-riwayat-sewa") == "false") {
                data_kosong2.classList.remove('hidden');
                table2.classList.add('hidden');
            } else {
                data_kosong2.classList.add('hidden');
                table2.classList.add('hidden');
            }
        });

    <?php } ?>

    const openTable2 = () => {
        open2.addEventListener("click", function() {
            if (atas2.classList.contains('h-[77px]')) {
                localStorage.setItem("open-table-riwayat-sewa", "true");
            } else {
                localStorage.setItem("open-table-riwayat-sewa", "false");
            }
            openTab();
        });

        function openTab() {
            if (localStorage.getItem("open-table-riwayat-sewa") == "false") {
                garis2.classList.add('hidden');
                plus2.classList.add('hidden');
                table2.classList.add('hidden');
                atas2.classList.remove('h-[450px]');
                atas2.classList.add('h-[77px]');
            } else {

                setTimeout(() => {
                    table2.classList.remove('hidden');
                }, 150);
                garis2.classList.remove('hidden');
                plus2.classList.remove('hidden');
                garis2.classList.add('ease-in-out');
                table2.classList.add('ease-in-out');
                atas2.classList.add('h-[450px]');
                atas2.classList.remove('h-[77px]');

            }
        }
        if (localStorage.getItem("open-table-riwayat-sewa") !== null) {
            openTab();
        }
        if (atas2.classList.contains("h-[450px]")) {
            open2.checked = true;
        }
    }
    openTable2();

    const searchRiwayatSewa = () => {
        const input = document.getElementById('search2');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('table2');
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
    }
    search2.addEventListener('keyup', searchRiwayatSewa);
</script>
<?php
require_once 'components/riwayat/modals/sewa.php';
require_once 'components/riwayat/modals/semuaSewa.php';

?>