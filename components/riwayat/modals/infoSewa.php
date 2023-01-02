<!-- modal Delete  start -->
<section>
    <div id="modal_overlay_info_sewa" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_info_sewa" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[600px]  xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <div class="flex flex-row justify-between items-center pt-3 -mt-6">
                <div class="flex flex-row justify-start ml-[23px] mt-4 gap-3 mb-3">
                    <svg class="mx-auto my-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#fff" />
                    </svg>
                    <h1 class="text-neutral_050 font-base font-noto-sans text-xl">ID <span id="id_sewa_info"></span></h1>
                </div>
                <button onclick="openModalInfoSewa(false)" title="tutup modal" class="bg-neutral_050 hover:bg-neutral_200 focus:bg-neutral_400 w-[30px] h-[30px] rounded-full mr-6 relative">
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
                        <h1 class="text-neutral_050 font-medium mb-2 ml-3">ID PS</h1>
                        <input disabled type="text" id="id_ps_sewa" name="id_ps_sewa" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                    </div>
                    <div class="relative z-0 w-5/12 ">
                        <h1 class="text-neutral_050 font-medium mb-2 ml-3">Nama User</h1>
                        <input disabled type="text" id="nama_user_sewa" name="nama_user_sewa" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                    </div>
                </div>
                <div class="flex flex-row xs:gap-6 md:gap-[42px]  justify-center items-center w-full">
                    <div class="relative z-0 w-5/12 ">
                        <h1 class="text-neutral_050 font-medium mb-2 ml-3">Lama Sewa</h1>
                        <input disabled type="text" id="lama_sewa" name="lama_sewa" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                    </div>
                    <div class="relative z-0 w-5/12 ">
                        <h1 class="text-neutral_050 font-medium mb-2 ml-3">Waktu Sewa</h1>
                        <input disabled type="text" id="waktu_sewa" name="waktu_sewa" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                    </div>
                </div>
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Pilihan Kirim</h1>
                    <input disabled type="text" id="pilihan_kirim" name="pilihan_kirim" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Alamat User</h1>
                    <textarea name="alamat_user" id="alamat_user" readonly class="resize-none rounded-2xl h-[67px] w-full bg-neutral_050 pl-3  pr-16 pt-2 cursor-default text-neutral_900"></textarea>
                    <a href="https://maps.google.com/?q=-7.154825,111.875869" title="lihat lokasi customer" type="button" target="_blank" name="map" id="map" class="btn btn-ghost absolute flex flex-row gap-3 justify-center items-center  right-3 top-10">
                        <svg width="18" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.75 11.875C7.9212 11.875 7.12634 11.5458 6.54029 10.9597C5.95424 10.3737 5.625 9.5788 5.625 8.75C5.625 7.9212 5.95424 7.12634 6.54029 6.54029C7.12634 5.95424 7.9212 5.625 8.75 5.625C9.5788 5.625 10.3737 5.95424 10.9597 6.54029C11.5458 7.12634 11.875 7.9212 11.875 8.75C11.875 9.16038 11.7942 9.56674 11.6371 9.94589C11.4801 10.325 11.2499 10.6695 10.9597 10.9597C10.6695 11.2499 10.325 11.4801 9.94589 11.6371C9.56674 11.7942 9.16038 11.875 8.75 11.875ZM8.75 0C6.42936 0 4.20376 0.921872 2.56282 2.56282C0.921872 4.20376 0 6.42936 0 8.75C0 15.3125 8.75 25 8.75 25C8.75 25 17.5 15.3125 17.5 8.75C17.5 6.42936 16.5781 4.20376 14.9372 2.56282C13.2962 0.921872 11.0706 0 8.75 0Z" fill="#303030" />
                        </svg>
                    </a>
                </div>
                <div class="relative z-0 w-11/12 -mt-1">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Deskripsi</h1>
                    <textarea name="deskripsi" id="deskripsi" readonly class="resize-none rounded-2xl h-[67px] w-full bg-neutral_050 pl-3 pt-2 cursor-default text-neutral_900">
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- modal_delete  end -->
<script>
    const modal_overlay_info_sewa = document.querySelector('#modal_overlay_info_sewa');
    const modal_info_sewa = document.querySelector('#modal_info_sewa');
    const info_sewa = document.querySelectorAll('#sewa_info');
    const id_sewa_info = document.querySelector('#id_sewa_info');

    const openModalInfoSewa = (value) => {
        const modalClInfoSewa = modal_info_sewa.classList
        const overlayClInfoSewa = modal_overlay_info_sewa

        if (value) {
            overlayClInfoSewa.classList.remove('hidden')
            setTimeout(() => {
                modalClInfoSewa.remove('opacity-0')
                modalClInfoSewa.remove('-translate-y-full')
                modalClInfoSewa.remove('scale-150')
            }, 100);
        } else {
            modalClInfoSewa.add('-translate-y-full')
            setTimeout(() => {
                modalClInfoSewa.add('opacity-0')
                modalClInfoSewa.add('scale-150')
            }, 100);
            setTimeout(() => overlayClInfoSewa.classList.add('hidden'), 300);
        }
    }
    openModalInfoSewa(false)
    // foreach modals with jquery openmodal delete true 
    info_sewa.forEach((button) => {
        button.addEventListener('click', () => {
            const id_ps_sewa = document.getElementById('id_ps_sewa');
            const nama_user_sewa = document.getElementById('nama_user_sewa');
            const lama_sewa = document.getElementById('lama_sewa');
            const waktu_sewa = document.getElementById('waktu_sewa');   
            const pilihan_kirim = document.getElementById('pilihan_kirim');
            const alamat_user = document.getElementById('alamat_user');
            const map = document.getElementById('map');
            const deskripsi = document.getElementById('deskripsi');
            
            openModalInfoSewa(true)
            const id = button.value;
            id_sewa_info.innerHTML = id;

            var xhr = new XMLHttpRequest();
            // path getuser.php in main dir
            var url = "..\\..\\..\\getsewa.php";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    id_ps_sewa.value = json.id_ps;
                    nama_user_sewa.value = json.nama;
                    lama_sewa.value = json.lama_sewa + " Hari";
                    waktu_sewa.value = json.waktu_sewa;
                    if (json.pil_kirim == 'ambil') {
                        pilihan_kirim.value = "Ambil Sendiri";
                    } else {
                        pilihan_kirim.value = "Kirim";
                    }
                    alamat_user.value = json.alamat;
                    deskripsi.value = json.deskripsi;
                    map.href = "https://www.google.com/maps/search/?api=1&query="+json.latitude+","+json.longitude;

                }
            };
            var data = JSON.stringify({
                "id": id
            });
            xhr.send(data);
        })
    })
</script>