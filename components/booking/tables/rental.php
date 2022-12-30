<section class="mt-24 text-neutral_050  ml-16">
    <div class="container px-6 max-w-full">
        <div id="atas" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
            <div class="flex flex-wrap flex-col ">
                <div class=" flex flex-row justify-between items-center -mb-3">
                    <div class="flex gap-4 items-center">
                        <h1 class="capitalize font-semibold">Rental Aktif dan Pending</h1>
                        <h2><?php echo $jumlah_rent ?></h2>
                        <h1 id="text-data" class="text-2xl pl-4 ml-4 gap-4 hidden">Tidak Ada Data</h1>
                    </div>
                    <span id="open" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                        <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                        <span id="plus" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                    </span>
                </div>
                <span id="garis" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                <h1 id="data-kosong" class="hidden my-auto mt-3 text-xl">Tidak Ada Data</h1>
                <div class="w-full mx-auto  relative h-[360px] block overflow-y-auto mt-2" id="table">
                    <table id="table" class="w-full table-auto">
                        <thead class="bg-neutral_800 sticky -top-[1.4px]">
                            <tr class="font-semibold ">
                                <th scope="col" class="relative">
                                    <div class="flex flex-row gap-x-3 items-center">
                                        <i class="fa-solid fa-magnifying-glass "></i>
                                        <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Cari ID Rental">
                                    </div>
                                </th>
                                <th scope="col" class=" ">
                                    <button class="flex flex-row items-center mx-auto gap-x-4 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900">
                                        <h1 class=" uppercase">nama ps</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class=" ">
                                    <button class="flex flex-row items-center mx-auto gap-x-4 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">waktu order</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class=" ">
                                    <button class="flex flex-row items-center mx-auto gap-x-4 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">Status</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class=" ">
                                    <button class="flex flex-row items-center mx-auto gap-x-4 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">play time</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                    </td>
                                <th scope="col" class=" ">
                                    <button class="flex flex-row items-center mx-auto gap-x-4 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">waktu</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="">
                                    <button class="flex flex-row items-center mx-auto gap-x-4 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">total</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class=" ">
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
                            $row = 0;
                            if (empty($rent)) {
                                echo
                                '<script>
                                            document.getElementById("table").style.display = "none"
                                                
                                            document.getElementById("data-kosong").classList.remove("hidden") 
                        
                                            document.getElementById("atas").classList.add("h-[450px]") 
            
                                            if (document.getElementById("atas").classList.contains("h-[77px]")) {
                                                document.getElementById("data-kosong").classList.add("hidden")
                                            }
            
                                                </script> ';
                            } else {
                                while ($row < count($rent)) { ?>
                                    <tr class="">
                                        <td class="flex flex-row gap-x-3 pb-5">
                                            <div class="flex flex-row justify-center items-center w-10 ">
                                                <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $row + 1 ?></h1>
                                            </div>
                                            <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                <img src="<?php echo $rent[$row]['img'] ?>" alt="" class="rounded-full w-full h-full object-cover">
                                            </div>
                                            <div class="flex flex-col gap-y-1 ml-2">
                                                <h1 class="font-semibold"><?php echo $rent[$row]['username'] ?></h1>
                                                <h2 class="text-neutral_400 text-xs"><?php echo $rent[$row]['id_rental'] ?></h2>
                                            </div>
                                        </td>
                                        <td class="text-center"><?php echo $rent[$row]['nama_ps'] ?></td>
                                        <td class="text-center"><?php echo $rent[$row]['waktu_order'] ?></td>
                                        <td class="text-center"><?php echo $rent[$row]['status'] ?></td>
                                        <td class="text-center"><?php echo $rent[$row]['playtime'] ?> Jam</td>
                                        <td class=" text-center"><?php echo date('H:i:s d/m/y', strtotime($rent[$row]['mulai_rental'])) ?>
                                             - <?php echo date('H:i:s d/m/y', strtotime($rent[$row]['selesai_rental'])) ?></td>
                                        <td class="text-center"><?php echo Rupiah::to($rent[$row]['bayar']) ?></td>
                                        <td class="text-center flex flex-row justify-center whitespace-nowrap">
                                            <?php if ($rent[$row]['status']=='incoming') { ?>
                                                <button id="aktif_rental" value="<?php echo $rent[$row]['id_rental'] ?>" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center hover:bg-neutral_050/90 focus:bg-neutral_050/75 gap-2">
                                                    <h1 class="text-neutral_900 font-semibold">Aktifkan</h1>
                                                    <svg width="19" class="mx-auto" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M14.915 2.87059L13.1931 4.57647C15.2475 5.81176 16.625 8.03529 16.625 10.5882C16.625 12.4604 15.8743 14.2558 14.5381 15.5796C13.2019 16.9034 11.3897 17.6471 9.5 17.6471C7.61033 17.6471 5.79806 16.9034 4.46186 15.5796C3.12567 14.2558 2.375 12.4604 2.375 10.5882C2.375 8.03529 3.7525 5.81177 5.795 4.56471L4.085 2.87059C1.615 4.56471 0 7.38824 0 10.5882C0 13.0844 1.00089 15.4783 2.78249 17.2434C4.56408 19.0084 6.98044 20 9.5 20C12.0196 20 14.4359 19.0084 16.2175 17.2434C17.9991 15.4783 19 13.0844 19 10.5882C19 7.38824 17.385 4.56471 14.915 2.87059ZM10.6875 0H8.3125V11.7647H10.6875" fill="#4FCF2F"/>
                                                  </svg>
                                                </button>
                                                
                                                <?php } else if ($rent[$row]['status'] =='ongoing') { ?>
                                                    <button id="mati_rental" value="<?php echo $rent[$row]['id_rental'] ?>" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center hover:bg-neutral_050/90 focus:bg-neutral_050/75 gap-2">
                                                        <h1 class="text-neutral_900 font-semibold">Matikan</h1>
                                                        <svg width="19" class="mx-auto" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.915 2.87059L13.1931 4.57647C15.2475 5.81176 16.625 8.0353 16.625 10.5882C16.625 12.4604 15.8743 14.2558 14.5381 15.5796C13.2019 16.9034 11.3897 17.6471 9.5 17.6471C7.61033 17.6471 5.79806 16.9034 4.46186 15.5796C3.12567 14.2558 2.375 12.4604 2.375 10.5882C2.375 8.0353 3.7525 5.81177 5.795 4.56471L4.085 2.87059C1.615 4.56471 0 7.38824 0 10.5882C0 13.0844 1.00089 15.4783 2.78249 17.2434C4.56408 19.0084 6.98044 20 9.5 20C12.0196 20 14.4359 19.0084 16.2175 17.2434C17.9991 15.4783 19 13.0844 19 10.5882C19 7.38824 17.385 4.56471 14.915 2.87059ZM10.6875 0H8.3125V11.7647H10.6875" fill="#E53935"/>
                                                                </svg>
                                                    </button>
                                                    
                                                            <?php } ?>
                                          </td>
                                    </tr>
                            <?php $row++;
                                }
                            } ?>
                        </tbody>
                    </table>
                    <h1 id="tidak_ditemukan" class="hidden mt-7 ml-2 text-lg">Data Tidak Ditemukan</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- table end -->

<script>
    const open = document.getElementById('open');
    const atas = document.getElementById('atas');
    const table = document.getElementById('table');
    const garis = document.getElementById('garis');
    const plus = document.getElementById('plus');
    const data_kosong = document.getElementById('data-kosong');
    const search = document.getElementById('search');
    const tidak_ditemukan = document.getElementById('tidak_ditemukan');

    window.addEventListener("load", () => {
        if (localStorage.getItem("open-table") == "false") {
            data_kosong.classList.add('hidden');
        }
    });

    <?php if (empty($rent)) { ?>
        data_kosong.classList.remove('hidden');
        table.classList.add('hidden');
        open.addEventListener("click", () => {
            if (localStorage.getItem("open-table") == "false") {
                data_kosong.classList.remove('hidden');
                table.classList.add('hidden');
            } else {
                data_kosong.classList.add('hidden');
                table.classList.add('hidden');
            }
        });

    <?php } ?>

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
                }, 150);
                garis.classList.remove('hidden');
                plus.classList.remove('hidden');
                garis.classList.add('ease-in-out');
                table.classList.add('ease-in-out');
                atas.classList.add('h-[450px]');
                atas.classList.remove('h-[77px]');

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

    const searchRental = () => {
        const input = document.getElementById('search');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('table');
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
            tidak_ditemukan.classList.remove('hidden');
        } else {
            tidak_ditemukan.classList.add('hidden');
        }
    }
    search.addEventListener('keyup', searchRental);
</script>
<?php require_once 'components/booking/modals/aktifRental.php' ?>
<?php require_once 'components/booking/modals/matiRental.php' ?>