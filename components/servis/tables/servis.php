<!-- table start -->
<?php
if (isset($_POST['edit_konfirmasi'])) {
    $id = $_POST['id-servis-edit'];
    $status = $_POST['status'];
    $bayar = Rupiah::clear($_POST['bayar']);
    $perbaikan = $_POST['detail_perbaikan'];
    $est_selesai = Tanggal::ChangeFormatToDb($_POST['tgl-servis-edit']);

    if ($servis->update_admservis(
        [
            'bayar' => $bayar,
            'perbaikan' => $perbaikan,
            'update_time' => date('Y-m-d H:i:s')
        ], $id )
    ) {
        if ($servis->update_servis(
            [
                'status' => $status,
                'est_selesai' => $est_selesai
            ], $id
        )) {
            Redirect::to('servis');
            // alert disini
        } else {
            // ganti alert gagal update servis
            echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Data gagal diubah',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                location.href = 'servis';
            });
            </script>";
        }
    } else {
        //ini juga
        echo "<script>
        Swal.fire({
            icon: 'error',
            text: 'Data gagal diubah',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            location.href = 'servis';
        });
        </script>";

    }
}
?>
<section class="mt-24 text-neutral_050  ml-16">
    <div class="container px-6 max-w-full ">
        <div id="atas" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
            <div class="flex flex-wrap flex-col ">
                <div class=" flex flex-row justify-between items-center -mb-3">
                    <div class="flex gap-4">
                        <h1 class="capitalize font-semibold">Service</h1>
                        <h2><?php echo $jumlah_servis ?></h2>
                    </div>
                    <span id="open" class="w-[36px] h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                        <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                        <span id="plus" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                    </span>
                </div>
                <span id="garis" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                <h1 id="data-kosong" class="hidden my-auto mt-3 text-xl">Tidak Ada Data</h1>
                <div class="w-full mx-auto  relative h-[360px] block overflow-y-auto mt-2" id="table">
                    <table id="table" class="w-full  table-auto">
                        <thead class="bg-neutral_800 sticky -top-[1.4px]">
                            <tr class="font-semibold ">
                                <th scope="col" class="text-left pl-4 relative">
                                    <div class="flex flex-row gap-x-3 items-center">
                                        <i class="fa-solid fa-magnifying-glass "></i>
                                        <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Cari Nama Barang">
                                    </div>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        NAMA BARANG
                                    </h1>
                                </th>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        KERUSAKAN
                                    </h1>
                                </th>
                                <th scope="col" class="text-left pl-4  ">
                                <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        WAKTU SERVICE
                                    </h1>
                                </th>
                                </th>
                                <th scope="col" class="text-left pl-4 ">
                                <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        STATUS
                                    </h1>
                                </th>
                                <th scope="col" class="text-left pl-4 ">
                                <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                        ESTIMASI JADI
                                    </h1>
                                </th>
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
                                document.getElementById("table").style.display = "none"
                                    
                                document.getElementById("data-kosong").classList.remove("hidden") 
            
                                document.getElementById("atas").classList.add("h-[450px]") 

                                if (document.getElementById("atas").classList.contains("h-[77px]")) {
                                    document.getElementById("data-kosong").classList.add("hidden")
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
                                                                                    $valid_date = date('H:i:s d/m/y', strtotime($date));
                                                                                    echo $valid_date;
                                                                                    ?></td>
                                        <td class="pl-4 text-center"><?php echo $service[$rows]['status'] ?></td>
                                        <td id="est_jadi" class="text-center"><?php if (empty($service[$rows]['est_selesai'])) {
                                            echo '-' ;
                                        } else {
                                        echo Tanggal::tgl_indo($service[$rows]['est_selesai']); } ?>
                                        
                                        </td>
                                        <td class="pl-4  text-center">
                                            <div class="h-[36px] w-[91px] bg-neutral_050 rounded-full p-2 flex flex-row items-center justify-center mx-auto gap-2 ">
                                                <button id="infoServis" name="infoServis" type="submit" value="<?php echo $service[$rows]['id_servis'] ?>" class=" hover:bg-neutral_900/20  w-[35px] h-[28px] rounded-3xl">
                                                    <svg class="mx-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#303030" />
                                                    </svg>
                                                    <input type="hidden" name="inputpost">
                                                </button>
                                                <span class="w-0.5 h-6 bg-neutral_900"></span>
                                                <button id="editServis" value="<?php echo $service[$rows]['id_servis'] ?>" class="hover:bg-neutral_900/20 w-[35px] h-[28px] rounded-3xl">
                                                    <svg class="mx-auto" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 0C0.89 0 0 0.89 0 2V16C0 16.5304 0.210714 17.0391 0.585786 17.4142C0.960859 17.7893 1.46957 18 2 18H16C16.5304 18 17.0391 17.7893 17.4142 17.4142C17.7893 17.0391 18 16.5304 18 16V9H16V16H2V2H9V0H2ZM14.78 1C14.61 1 14.43 1.07 14.3 1.2L13.08 2.41L15.58 4.91L16.8 3.7C17.06 3.44 17.06 3 16.8 2.75L15.25 1.2C15.12 1.07 14.95 1 14.78 1ZM12.37 3.12L5 10.5V13H7.5L14.87 5.62L12.37 3.12Z" fill="#303030" />
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
    const waktu_submit = document.querySelectorAll('#waktu_submit');
    const est_jadi = document.querySelectorAll('#est_jadi');
    const search = document.getElementById('search');
    const data_kosong = document.getElementById('data-kosong');
    const tidak_ditemukan = document.getElementById('tidak_ditemukan');

    window.addEventListener("load", () => {
        if (localStorage.getItem("open-table-sewa") == "false") {
            data_kosong.classList.add('hidden');
        }
    });

    <?php if (empty($service)) { ?>
        data_kosong.classList.remove('hidden');
        table.classList.add('hidden');
        open.addEventListener("click", () => {
            if (localStorage.getItem("open-table-sewa") == "false") {
                data_kosong.classList.remove('hidden');
                table.classList.add('hidden');
            } else {
                data_kosong.classList.add('hidden');
                table.classList.add('hidden');
            }
        });

    <?php } ?>


    waktu_submit.forEach((waktu) => {
        waktu.innerHTML = waktu.innerHTML.replace(' ', ' - ');
    });



    const openTable = () => {
        open.addEventListener("click", function() {
            if (atas.classList.contains('h-[77px]')) {
                localStorage.setItem("open-table-sewa", "true");
            } else {
                localStorage.setItem("open-table-sewa", "false");
            }
            openTab();
        });

        function openTab() {
            if (localStorage.getItem("open-table-sewa") == "false") {
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
        if (localStorage.getItem("open-table-sewa") !== null) {
            openTab();
        }
        if (atas.classList.contains("h-[450px]")) {
            open.checked = true;
        }
    }
    openTable();

    const searchServis = () => {
        const input = document.getElementById('search');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('table');
        const tr = table.getElementsByTagName('tr');
        for (let i = 0; i < tr.length; i++) {
            const td = tr[i].getElementsByTagName('td')[1];
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
    search.addEventListener('keyup', searchServis);

</script>
<?php require_once 'components/servis/modals/info.php'; ?>
<?php require_once 'components/servis/modals/edit.php'; ?>