<!-- table start -->
<section id="riwayat-servis" class="mt-12 mb-8 text-neutral_050  ml-16">
    <div class="container px-6 max-w-full ">
        <div id="atas4" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
            <div class="flex flex-wrap flex-col ">
                <div class=" flex flex-row justify-between items-center -mb-3">
                    <div class="flex gap-4 items-center">
                        <h1 class="capitalize font-semibold">Service</h1>
                        <h2><?php echo $jumlah_servis ?></h2>
                    </div>
                    <div class="flex flex-row gap-2 sm:gap-5">
                        <button id="hapus-semua-servis" title="hapus semua riwayat servis" class="h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-3">
                            <h1 class="text-neutral_900 font-semibold hidden sm:block">Hapus Semua Servis</h1>
                            <svg width="16" class="xs:w-[22px] sm:w-[26px]" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                            </svg>
                        </button>
                        <span id="open4" title="buka/tutup table servis" class="w-[36px] h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                            <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                            <span id="plus4" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                        </span>
                    </div>
                </div>
                <span id="garis4" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                <h1 id="data-kosong4" class="hidden my-auto mt-3 text-xl">Tidak Ada Data</h1>
                <div class="w-full mx-auto  relative h-[360px] block overflow-y-auto mt-2" id="table4">
                    <table class="w-full table-auto">
                        <thead class="bg-neutral_800 sticky -top-[1.4px]">
                            <tr class="font-semibold ">
                                <th scope="col" class="text-left pl-4 relative">
                                    <div class="flex flex-row gap-x-3 items-center">
                                        <i class="fa-solid fa-magnifying-glass "></i>
                                        <input type="text" id="search4" name="search4" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Cari ID Servis">
                                    </div>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        NAMA BARANG
                                    </h1>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        KERUSAKAN
                                    </h1>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        WAKTU SERVICE
                                    </h1>
                                </th>
                                <th scope="col" class="text-left pl-4 ">
                                    <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        BIAYA
                                    </h1>
                                </th>
                                <th scope="col" class="text-left pl-4 ">
                                <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        STATUS
                                    </h1>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                <h1 class="bg-transparent text-neutral_050 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        OPTIONS
                                    </h1>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-hidden">
                            <!-- list 1 start -->
                            <?php
                            $rows = 0;
                            if (empty($service)) {
                                echo
                                '<script>
                                document.getElementById("table4").style.display = "none"
                                    
                                document.getElementById("data-kosong4").classList.remove("hidden") 
            
                                document.getElementById("atas4").classList.add("h-[450px]") 

                                if (document.getElementById("atas4").classList.contains("h-[77px]")) {
                                    document.getElementById("data-kosong4").classList.add("hidden")
                                }

                                    </script> ';
                            } else {
                                while ($rows < count($service)) { ?>
                                    <tr class="">
                                        <td class=" flex flex-row gap-x-3 pb-5">
                                            <div class="flex flex-row justify-center items-center w-10 ">
                                                <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $rows + 1 ?></h1>
                                            </div>
                                            <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                <img src="img/user/<?php echo FormatID::convert($service[$rows]['user_id']) ?>/<?php echo $service[$rows]['img'] ?>" alt="gambar user" class="rounded-full w-full h-full object-cover">
                                            </div>
                                            <div class="flex flex-col gap-y-1 ml-2">
                                                <h1 class="font-semibold"><?php echo $service[$rows]['username'] ?></h1>
                                                <h2 class="text-neutral_400 text-xs"><?php echo $service[$rows]['id_servis'] ?></h2>
                                            </div>
                                        </td>
                                        <td class="pl-4 text-center"><?php echo $service[$rows]['nama_barang'] ?></td>
                                        <td class="pl-4 text-center"><?php echo $service[$rows]['kerusakan'] ?></td>
                                        <td id="waktu_submit" class=" text-center"><?php $date = $service[$rows]['waktu_submit'];
                                                                                    $valid_date = date('H:i:s m/d/y', strtotime($date));
                                                                                    echo $valid_date;

                                                                                    ?></td>
                                        <td class="md:pl-10 xs:pl-8 text-left"><?php echo Rupiah::to($service[$rows]['bayar']) ?></td>
                                        <td class="pl-4 text-center"><?php echo $service[$rows]['status'] ?></td>
                                        <td class="pl-4  text-center">
                                        <div class="h-[36px] w-[91px] bg-neutral_050 rounded-full p-2 flex flex-row items-center justify-center mx-auto gap-2 ">
                                            <button id="infoServis" name="infoServis" type="submit" value="<?php echo $service[$rows]['id_servis'] ?>" class=" hover:bg-neutral_900/20  w-[35px] h-[28px] rounded-3xl">
                                                    <svg class="mx-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#303030" />
                                                    </svg>
                                                </button>
                                            <span class="w-0.5 h-6 bg-neutral_900"></span>
                                                <button id="hapus-servis" title="hapus riwayat servis" value="<?php echo $service[$rows]['id_servis'] ?>"class="hover:bg-neutral_900/20 w-[35px] h-[28px] rounded-3xl">
                                                    <svg width="16" class="mx-auto" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                            <?php $rows++;
                                }
                            } ?>
                            <!-- list 1 end -->
                        </tbody>
                    </table>
                    <h1 id="tidak_ditemukan4" class="hidden mt-7 ml-2 text-lg">Data Tidak Ditemukan</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- table end -->
<script>
    const open4 = document.getElementById('open4');
    const atas4 = document.getElementById('atas4');
    const table4 = document.getElementById('table4');
    const garis4 = document.getElementById('garis4');
    const plus4 = document.getElementById('plus4');
    const search4 = document.getElementById('search4');
    const data_kosong4 = document.getElementById('data-kosong4');
    const riwayat_servis = document.getElementById('riwayat-servis');
    const tidak_ditemukan4 = document.getElementById('tidak_ditemukan4');

    window.addEventListener("load", () => {
        if (localStorage.getItem("open-table-riwayat-servis") == "false") {
            data_kosong4.classList.add('hidden');
        }
        if (localStorage.getItem('lokasi') !== 'Bojonegoro') {
            riwayat_servis.classList.add('hidden');
        } else {
            riwayat_servis.classList.remove('hidden');
        }
    });


    <?php if (empty($service)) { ?>
        data_kosong4.classList.remove('hidden');
        table4.classList.add('hidden');
        open4.addEventListener("click", () => {
            if (localStorage.getItem("open-table-riwayat-servis") == "false") {
                data_kosong4.classList.remove('hidden');
                table4.classList.add('hidden');
            } else {
                data_kosong4.classList.add('hidden');
                table4.classList.add('hidden');
            }
        });

    <?php } ?>


    const openTable4 = () => {
        open4.addEventListener("click", function() {
            if (atas4.classList.contains('h-[77px]')) {
                localStorage.setItem("open-table-riwayat-servis", "true");
            } else {
                localStorage.setItem("open-table-riwayat-servis", "false");
            }
            openTab();
        });

        function openTab() {
            if (localStorage.getItem("open-table-riwayat-servis") == "false") {
                garis4.classList.add('hidden');
                plus4.classList.add('hidden');
                table4.classList.add('hidden');
                atas4.classList.remove('h-[450px]');
                atas4.classList.add('h-[77px]');
            } else {
                setTimeout(() => {
                    table4.classList.remove('hidden');
                }, 150);
                garis4.classList.remove('hidden');
                plus4.classList.remove('hidden');
                garis4.classList.add('ease-in-out');
                table4.classList.add('ease-in-out');
                atas4.classList.add('h-[450px]');
                atas4.classList.remove('h-[77px]');
            }
        }
        if (localStorage.getItem("open-table-riwayat-servis") !== null) {
            openTab();
        }
        if (atas4.classList.contains("h-[450px]")) {
            open4.checked = true;

        }

    }
    openTable4();

    const searchRiwayatServis = () => {
        const input = document.getElementById('search4');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('table4');
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
            tidak_ditemukan4.classList.remove('hidden');
        } else {
            tidak_ditemukan4.classList.add('hidden');
        }
    }
    search4.addEventListener('keyup', searchRiwayatServis);
</script>
<?php
require_once 'components/riwayat/modals/servis.php';
require_once 'components/riwayat/modals/semuaServis.php';
require_once 'components/riwayat/modals/infoServis.php';
?>