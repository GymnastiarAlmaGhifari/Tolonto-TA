<!-- modal Delete  start -->
<section>
    <div id="modal_overlay_info_servis" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_info_servis" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[500px]  xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <div class="flex flex-row justify-between items-center pt-3 -mt-6">
                <div class="flex flex-row justify-start ml-[23px] mt-4 gap-3 mb-3">
                    <svg class="mx-auto my-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#fff" />
                    </svg>
                    <h1 class="text-neutral_050 font-base font-noto-sans text-xl">ID <span id="id_servis_info"></span></h1>
                </div>
                <button onclick="openModalInfoServis(false)" title="tutup modal" class="bg-neutral_050 hover:bg-neutral_200 focus:bg-neutral_400 w-[30px] h-[30px] rounded-full mr-6 relative">
                    <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="#E53935" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 6L18 18" stroke="#E53935" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <span class="w-11/12 h-0.5 mx-auto -mt-6 bg-neutral_600"></span>
            <div class="flex flex-col items-center justify-center gap-4 -mt-2">
                <div class="flex flex-row xs:gap-6 md:gap-[42px]  justify-center items-center w-full">
                <div class="relative z-0 w-5/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Nama Barang</h1>
                    <input disabled type="text" id="namabarangservis" name="namabarangservis" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                    <div class="relative z-0 w-5/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Nama Admin</h1>
                    <input disabled type="text" id="nama_admin" name="nama_user_admin" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                </div>
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Tanggal Jadi</h1>
                    <input disabled type="text" id="tanggaljadi" name="tanggaljadi" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Detail Kerusakan</h1>
                    <textarea name="detailkerusakan" id="detailkerusakan" readonly class="resize-none rounded-2xl h-[67px] w-full bg-neutral_050 pl-3 pt-2 cursor-default text-neutral_900"></textarea>
                </div>
                <div class="relative z-0 w-11/12 -mt-1">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Perbaikan</h1>
                    <textarea name="perbaikan" id="perbaikan" readonly class="resize-none rounded-2xl h-[67px] w-full bg-neutral_050 pl-3 pt-2 cursor-default text-neutral_900">
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- modal_delete  end -->
<script>
    const modal_overlay_info_servis = document.querySelector('#modal_overlay_info_servis');
    const modal_info_servis = document.querySelector('#modal_info_servis');
    const info_servis = document.querySelectorAll('#infoServis');
    const id_servis_info = document.querySelector('#id_servis_info');

    const openModalInfoServis = (value) => {
        const modalClInfoServis = modal_info_servis.classList
        const overlayClInfoServis = modal_overlay_info_servis

        if (value) {
            overlayClInfoServis.classList.remove('hidden')
            setTimeout(() => {
                modalClInfoServis.remove('opacity-0')
                modalClInfoServis.remove('-translate-y-full')
                modalClInfoServis.remove('scale-150')
            }, 100);
        } else {
            modalClInfoServis.add('-translate-y-full')
            setTimeout(() => {
                modalClInfoServis.add('opacity-0')
                modalClInfoServis.add('scale-150')
            }, 100);
            setTimeout(() => overlayClInfoServis.classList.add('hidden'), 300);
        }
    }
    openModalInfoServis(false)
    // foreach modals with jquery openmodal delete true 
    info_servis.forEach((button) => {
        button.addEventListener('click', () => {
            const nama_barang = document.querySelector('#namabarangservis');
            const nama_admin = document.querySelector('#nama_admin');
            const tanggal_jadi = document.querySelector('#tanggaljadi');
            const detailkerusakan = document.querySelector('#detailkerusakan');
            const perbaikan = document.querySelector('#perbaikan');

            openModalInfoServis(true)
            const id = button.value;
            id_servis_info.innerHTML = id;

            var xhr = new XMLHttpRequest();
            // path getuser.php in main dir
            var url = "..\\..\\..\\getservis.php";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    nama_barang.value = json.nama_barang;
                    nama_admin.value = json.nama_admin;
                    tanggal_jadi.value = json.selesai;
                    detailkerusakan.value = json.detail;
                    perbaikan.value = json.perbaikan;
                }
            };
            var data = JSON.stringify({
                "id": id
            });
            xhr.send(data);
        })
    })
</script>