<section id="main-ditempat-sewa" class="mt-12  text-neutral_050 xs:ml-[84px] sm:ml-24 flex flex-row gap-8">
    <h1 class="capitalize font-semibold">total PS Sewa</h1>
    <h2 class="text-neutral_300"><?php echo $ju_pssewa ?></h2>
</section>

<!-- list ps -->
<section id="list-ps-sewa" class="mt-8  text-neutral_050 xs:ml-[84px] sm:ml-24 mb-12">
    <div class="container">
        <div class="flex flex-wrap gap-7 flex-row">
            <!-- start -->
            <?php
            $row = 0;
            if (empty($ps_sewa)) {
                echo '<h1 class="text-2xl">Tidak Ada Data</h1>';
            } else {
                while ($row < count($ps_sewa)) {
                    $status = $ps_sewa[$row]['status'];
                    if ($status == 'aktif') {
                        $ikon = 'bg-[#32FC00]';
                    } else {
                        $ikon = 'bg-[#fc1100]';
                    }
            ?>
                    <div class="xs:w-[260px] sm:w-[350px] h-[230px] bg-neutral_800 rounded-xl shadow-elevation-dark-4 flex flex-col">
                        <div class="flex justify-between mt-2 mx-5">
                            <h1><?php echo $ps_sewa[$row]['nama_ps'] ?></h1>
                            <div class="flex flex-row gap-2">
                                <button title="edit ps sewa" id="editSewa" name="editSewa" value="<?php echo $ps_sewa[$row]['id_ps'] ?>" class="w-[30px] h-[30px] bg-neutral_050  rounded-full relative hover:bg-neutral_050/90 focus:bg-neutral_050/75">
                                    <svg class="mx-auto my-1.5" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                    </svg>
                                </button>
                                <button title="hapus ps sewa" id="hapusSewa" name="hapusSewa" value="<?php echo $ps_sewa[$row]['id_ps'] ?>" class=" w-[30px] h-[30px] bg-neutral_050 rounded-full relative hover:bg-neutral_050/90 focus:bg-neutral_050/75">
                                    <svg class="mx-auto my-1.5" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <span class="bg-neutral_600 xs:w-[240px] sm:w-[326.67px] h-0.5 mb-0 mt-2 mx-2"></span>
                        <div class="flex justify-center items-center relative">
                            <img class="h-[110px] m-2" src="<?php echo $ps_sewa[$row]['img'] ?>" alt="">
                        </div>
                        <h1 class="uppercase font-noto-sans font-semibold px-5"><?php echo $ps_sewa[$row]['jenis']; ?></h1>
                        <div class="flex flex-row justify-between px-5">
                            <div class="flex flex-row items-center gap-x-2">
                                <span class="w-3 h-3 rounded-full <?php echo $ikon ?>"></span>
                                <h1><?php echo $ps_sewa[$row]['status'] ?></h1>
                            </div>
                            <div class="flex flex-row items-center gap-x-2">
                                <h1><?php $harga_sewa = Rupiah::to(
                                        $ps_sewa[$row]['harga']
                                    );
                                    echo $harga_sewa ?></h1>
                            </div>
                        </div>
                    </div>
            <?php
                    $row++;
                }
            } ?>
            <!-- end -->
            <div class="xs:w-[260px] sm:w-[350px] h-[230px] bg-transparent rounded-xl  flex items-center justify-center relative">
                <button title="tambah ps sewa" id="tambahSewa" name="tambahSewa" class="flex justify-center items-center h-[150px] w-[150px] shadow-elevation-dark-4 bg-neutral_800 rounded-full hover:bg-neutral_700 focus:bg-neutral_900">
                    <span class="bg-neutral_050 w-20 h-[4px] rounded-full"></span>
                    <span id="plus3" class="bg-neutral_050 w-[4px] h-20 absolute rounded-full"></span>
                </button>
            </div>
        </div>
    </div>
</section>
<SCript>
    const list_ps_sewa = document.querySelector('#list-ps-sewa')
    const main_ditempat_sewa = document.querySelector('#main-ditempat-sewa')
    window.addEventListener('load', () => {
        if (localStorage.getItem('lokasi') !== 'Bojonegoro') {
            list_ps_sewa.classList.add('hidden');
            main_ditempat_sewa.classList.add('hidden');
        } else {
            list_ps_sewa.classList.remove('hidden');
            main_ditempat_sewa.classList.remove('hidden');
        }
    })
</SCript>
<?php require_once 'components/inventory/modals/sewa.php' ?>
<?php require_once 'components/inventory/modals/edit-sewa.php' ?>
<?php require_once 'components/inventory/modals/hapus-sewa.php' ?>