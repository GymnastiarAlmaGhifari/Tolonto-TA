            <!-- table start -->
            <section id="booking_sewa" class="mt-12 text-neutral_050  ml-16">
                <div class="container px-6 max-w-full ">
                    <div id="atas2" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
                        <div class="flex flex-wrap flex-col ">
                            <div class=" flex flex-row justify-between items-center -mb-3">
                                <div class="flex gap-4">
                                    <h1 class="capitalize font-semibold">Sewa Aktif dan Pending</h1>
                                    <h2><?php echo $jumlah_sewa ?></h2>
                                </div>
                                <span id="open2" class="w-[36px] h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                                    <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                                    <span id="plus2" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                                </span>
                            </div>
                            <span id="garis2" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                            <h1 id="data-kosong2" class="hidden my-auto mt-3 text-xl">Tidak Ada Data</h1>
                            <div class="w-full mx-auto  relative h-[360px] block overflow-y-auto mt-2" id="table2">
                                <table class="w-full table-auto">
                                    <thead class="bg-neutral_800 sticky -top-[1.4px]">
                                        <tr class="font-semibold ">
                                            <th scope="col" class="relative">
                                                <div class="flex flex-row gap-x-3 items-center">
                                                    <i class="fa-solid fa-magnifying-glass "></i>
                                                    <input type="text" id="search2" name="search2" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Cari ID Sewa">
                                                </div>
                                            </td>
                                            <th scope="col" class=" ">
                                            <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        NAMA PS
                                    </h1>
                                            </td>
                                            <th scope="col" class=" ">
                                            <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        WAKTU ORDER
                                    </h1>
                                </th>
                                            </td>
                                            <th scope="col" class=" ">
                                            <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        STATUS
                                    </h1>
                                            </td>
                                            <th scope="col" class=" ">
                                            <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        LAMA SEWA
                                    </h1>
                                </th>
                                            </td>
                                            <th scope="col" class=" ">
                                            <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        WAKTU RENTAL
                                    </h1>
                                </th>
                                            </td>
                                            <th scope="col" class="">
                                            <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        TOTAL
                                    </h1>
                                            </td>
                                            <th scope="col" class=" ">
                                            <h1 class="bg-transparent text-neutral_050 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        OPTIONS
                                    </h1>
                                            </td>
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
                                                        <div class="flex flex-row justify-center items-center w-10 ">
                                                            <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $rows + 1 ?></h1>
                                                        </div>
                                                        <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                            <img src="img/user/<?php echo FormatID::convert($sewa[$rows]['user_id']) ?>/<?php echo $sewa[$rows]['img'] ?>" alt="" class="rounded-full w-full h-full object-cover">
                                                        </div>
                                                        <div class="flex flex-col gap-y-1 ml-2">
                                                            <h1 class="font-semibold"><?php echo $sewa[$rows]['username'] ?></h1>
                                                            <h2 class="text-neutral_400 text-xs"><?php echo $sewa[$rows]['id_sewa'] ?></h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><?php echo $sewa[$rows]['nama_ps'] ?></td>
                                                    <td class="text-center"><?php echo $sewa[$rows]['waktu_order'] ?></td>
                                                    <td class="pl-4 text-center"><?php echo $sewa[$rows]['status'] ?></td>
                                                    <td class="text-center"><?php echo $sewa[$rows]['playtime'] ?> Hari</td>
                                                    <td class=" text-center"><?php //list($date, $time) = explode(" ", $sewa[$rows]['mulai_sewa']);
                                                                                echo $sewa[$rows]['mulai_sewa'] ; ?>
                                                        - <?php //list($date, $time) = explode(" ", $sewa[$rows]['akhir_sewa']);
                                                            echo $sewa[$rows]['akhir_sewa']; ?></td>
                                                    <td class="text-center"><?php echo $sewa[$rows]['payment_method'] ?> - <?php echo Rupiah::to($sewa[$rows]['bayar']) ?></td>
                                                    <td class="pl-4  text-center">
                                                        <div class="h-[36px] w-[91px] bg-neutral_050 rounded-full p-2 flex flex-row items-center justify-center mx-auto gap-2 ">
                                                             <button id="info_sewa" name="info_sewa" type="submit" value="<?php echo $sewa[$rows]['id_sewa'] ?>" class=" hover:bg-neutral_900/20  w-[35px] h-[28px] rounded-3xl">
                                                                <svg class="mx-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#303030" />
                                                                </svg>
                                                            <input type="hidden" name="inputpost">
                                                            <?php if ($sewa[$rows]['status']=='pending') { ?>
                                                            </button>
                                                                 <span class="w-0.5 h-6 bg-neutral_900"></span>
                                                             <button id="aktif_sewa" value="<?php echo $sewa[$rows]['id_sewa'] ?>" class="hover:bg-neutral_900/20 w-[35px] h-[28px] rounded-3xl">
                                                             <svg width="19" class="mx-auto" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.915 2.87059L13.1931 4.57647C15.2475 5.81176 16.625 8.03529 16.625 10.5882C16.625 12.4604 15.8743 14.2558 14.5381 15.5796C13.2019 16.9034 11.3897 17.6471 9.5 17.6471C7.61033 17.6471 5.79806 16.9034 4.46186 15.5796C3.12567 14.2558 2.375 12.4604 2.375 10.5882C2.375 8.03529 3.7525 5.81177 5.795 4.56471L4.085 2.87059C1.615 4.56471 0 7.38824 0 10.5882C0 13.0844 1.00089 15.4783 2.78249 17.2434C4.56408 19.0084 6.98044 20 9.5 20C12.0196 20 14.4359 19.0084 16.2175 17.2434C17.9991 15.4783 19 13.0844 19 10.5882C19 7.38824 17.385 4.56471 14.915 2.87059ZM10.6875 0H8.3125V11.7647H10.6875" fill="#4FCF2F"/>
                                                            </svg>

                                                            </button>
                                                            <?php } else if ($sewa[$rows]['status']=='aktif') { ?>
                                                                </button>
                                                                 <span class="w-0.5 h-6 bg-neutral_900"></span>
                                                             <button id="mati_sewa" class="hover:bg-neutral_900/20 w-[35px] h-[28px] rounded-3xl" value="<?php echo $sewa[$rows]['id_sewa'] ?>" >
                                                             <svg width="19" class="mx-auto" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.915 2.87059L13.1931 4.57647C15.2475 5.81176 16.625 8.0353 16.625 10.5882C16.625 12.4604 15.8743 14.2558 14.5381 15.5796C13.2019 16.9034 11.3897 17.6471 9.5 17.6471C7.61033 17.6471 5.79806 16.9034 4.46186 15.5796C3.12567 14.2558 2.375 12.4604 2.375 10.5882C2.375 8.0353 3.7525 5.81177 5.795 4.56471L4.085 2.87059C1.615 4.56471 0 7.38824 0 10.5882C0 13.0844 1.00089 15.4783 2.78249 17.2434C4.56408 19.0084 6.98044 20 9.5 20C12.0196 20 14.4359 19.0084 16.2175 17.2434C17.9991 15.4783 19 13.0844 19 10.5882C19 7.38824 17.385 4.56471 14.915 2.87059ZM10.6875 0H8.3125V11.7647H10.6875" fill="#E53935"/>
                                                                </svg>
                                                            </button>
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php $rows++;
                                            }
                                        } ?>
                                        <!-- list 1 end -->
                                    </tbody>
                                </table>
                                <h1 id="tidak_ditemukan2" class="hidden mt-7 ml-2 text-lg">Data Tidak Ditemukan</h1>
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
                const tidak_ditemukan2 = document.getElementById('tidak_ditemukan2');
                const booking_sewa = document.getElementById('booking_sewa');                        

                window.addEventListener("load", () => {
                    if (localStorage.getItem("open-table2") == "false") {
                        data_kosong2.classList.add('hidden');
                    }
                    if (localStorage.getItem('lokasi') !== 'Bojonegoro') {
                        booking_sewa.classList.add('hidden');
                    } else {
                        booking_sewa.classList.remove('hidden');
                    }
                });

                <?php if (empty($sewa)) { ?>
                    data_kosong2.classList.remove('hidden');
                    table2.classList.add('hidden');
                    open2.addEventListener("click", () => {
                        if (localStorage.getItem("open-table2") == "false") {
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
                                }, 150);
                                garis2.classList.remove('hidden');
                                plus2.classList.remove('hidden');
                                garis2.classList.add('ease-in-out');
                                table2.classList.add('ease-in-out');
                                atas2.classList.add('h-[450px]');
                                atas2.classList.remove('h-[77px]');
                            
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

                const searchBookingSewa = () => {
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
                    if (tr[1].style.display == "none") {
                        tidak_ditemukan2.classList.remove('hidden');
                    } else {
                        tidak_ditemukan2.classList.add('hidden');
                    }
                }
                search2.addEventListener('keyup', searchBookingSewa);
            </script>

<?php require_once 'components/booking/modals/sewa.php' ?>
<?php require_once 'components/booking/modals/aktifSewa.php' ?>
<?php require_once 'components/booking/modals/matiSewa.php' ?>
