<!-- modal Rental tambah start -->
<section>
    <div id="modal_overlay_sewa" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">

        <!-- modal -->
        <div id="modal_sewa" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[578px]  xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <div class="flex flex-row justify-between items-center -mt-6">
                <div class="flex flex-row justify-start ml-[23px] mt-4 gap-3 mb-3">
                    <svg class="mx-auto my-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#fff" />
                    </svg>
                    <h1 class="text-neutral_050 font-base font-noto-sans text-xl">ID <span id="id_sewa"></span></h1>
                </div>
                <button onclick="openModalSewa(false)" class="bg-neutral_050 w-[30px] h-[30px] rounded-full mr-6 relative">
                    <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="#E53935" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 6L18 18" stroke="#E53935" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <span class="w-11/12 h-0.5 mx-auto -mt-6 bg-neutral_600"></span>
            <form action="servis.php" method="post" class="flex flex-col items-center justify-center gap-4 -mt-2" enctype="multipart/form-data">
            <div class="flex flex-row xs:gap-6 md:gap-7  justify-center items-center w-full">
                <div class="relative z-0 w-5/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">ID PS</h1>
                    <input disabled type="text" id="id_ps_sewa" name="id_ps_sewa" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                    <div class="relative z-0 w-5/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Nama User</h1>
                    <input disabled type="text" id="nama_user_sewa" name="nama_user_sewa" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                </div>
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Pilihan Kirim</h1>
                    <input disabled type="text" id="pilihan_kirim" name="pilihan_kirim" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Alamat User</h1>
                    <textarea name="alamat_user" id="alamat_user" readonly class="resize-none rounded-2xl h-[67px] w-full bg-neutral_050 pl-3 pt-2 cursor-default text-neutral_900"></textarea>
                </div>
                <div class="relative z-0 w-11/12 -mt-1">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Deskripsi</h1>
                    <textarea name="deskripsi" id="deskripsi" readonly class="resize-none rounded-2xl h-[67px] w-full bg-neutral_050 pl-3 pt-2 cursor-default text-neutral_900">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat obcaecati odio expedita quos. Corrupti pariatur iusto corporis reprehenderit aperiam. Eveniet molestias quibusdam nemo dignissimos esse, animi, quasi quis blanditiis quod, debitis unde id excepturi.
                    </textarea>
                </div>
                <div class="flex flex-row gap-[42px] items-center justify-center w-full">
                    <a href="https://maps.google.com/?q=-7.154825,111.875869" type="button" target="_blank" name="map" id="map" class="bg-error_600 text-neutral_050  w-5/12 h-12 rounded-2xl flex flex-row gap-3 justify-center items-center shadow-elevation-light-2 hover:bg-error_300 focus:bg-error_800"">
                        <svg width="18" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.75 11.875C7.9212 11.875 7.12634 11.5458 6.54029 10.9597C5.95424 10.3737 5.625 9.5788 5.625 8.75C5.625 7.9212 5.95424 7.12634 6.54029 6.54029C7.12634 5.95424 7.9212 5.625 8.75 5.625C9.5788 5.625 10.3737 5.95424 10.9597 6.54029C11.5458 7.12634 11.875 7.9212 11.875 8.75C11.875 9.16038 11.7942 9.56674 11.6371 9.94589C11.4801 10.325 11.2499 10.6695 10.9597 10.9597C10.6695 11.2499 10.325 11.4801 9.94589 11.6371C9.56674 11.7942 9.16038 11.875 8.75 11.875ZM8.75 0C6.42936 0 4.20376 0.921872 2.56282 2.56282C0.921872 4.20376 0 6.42936 0 8.75C0 15.3125 8.75 25 8.75 25C8.75 25 17.5 15.3125 17.5 8.75C17.5 6.42936 16.5781 4.20376 14.9372 2.56282C13.2962 0.921872 11.0706 0 8.75 0Z" fill="#fff" />
                        </svg>
                        <h1>Lokasi Customer</h1>
                    </a>
                    <a href="https://wa.me/620895387390033/?text-Hello" type="button" target="_blank" name="whatsapp" id="whatsapp" class="bg-[#4FCF2F] text-neutral_050 shadow-elevation-light-2  hover:bg-[#81FF62] focus:bg-[#4FCF2F]/80 w-5/12 h-12 rounded-2xl flex flex-row gap-3 justify-center items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.988 0C5.436 0 0.0960002 5.34 0.0960002 11.892C0.0960002 13.992 0.648 16.032 1.68 17.832L0 24L6.3 22.344C8.04 23.292 9.996 23.796 11.988 23.796C18.54 23.796 23.88 18.456 23.88 11.904C23.88 8.724 22.644 5.736 20.4 3.492C18.156 1.236 15.168 0 11.988 0ZM12 2.004C14.64 2.004 17.112 3.036 18.984 4.908C20.844 6.78 21.876 9.264 21.876 11.904C21.876 17.352 17.436 21.78 11.988 21.78C10.212 21.78 8.472 21.312 6.96 20.4L6.6 20.196L2.856 21.18L3.852 17.532L3.612 17.148C2.628 15.6 2.1 13.764 2.1 11.892C2.112 6.444 6.54 2.004 12 2.004ZM7.776 6.396C7.584 6.396 7.26 6.468 6.984 6.768C6.72 7.068 5.94 7.8 5.94 9.252C5.94 10.716 7.008 12.12 7.14 12.324C7.308 12.528 9.252 15.528 12.24 16.8C12.948 17.124 13.5 17.304 13.932 17.436C14.64 17.664 15.288 17.628 15.804 17.556C16.38 17.472 17.556 16.836 17.808 16.14C18.06 15.444 18.06 14.856 17.988 14.724C17.904 14.604 17.712 14.532 17.412 14.4C17.112 14.232 15.648 13.512 15.384 13.416C15.108 13.32 14.94 13.272 14.712 13.56C14.52 13.86 13.944 14.532 13.776 14.724C13.596 14.928 13.428 14.952 13.14 14.808C12.828 14.652 11.868 14.34 10.74 13.332C9.852 12.54 9.264 11.568 9.084 11.268C8.94 10.98 9.072 10.8 9.216 10.668C9.348 10.536 9.54 10.32 9.66 10.14C9.816 9.972 9.864 9.84 9.96 9.648C10.056 9.444 10.008 9.276 9.936 9.132C9.864 9 9.264 7.512 9.012 6.924C8.772 6.348 8.532 6.42 8.34 6.408C8.172 6.408 7.98 6.396 7.776 6.396Z" fill="#FAFAFA" />
                        </svg>
                        <h1>WhatsApp Customer</h1>
                    </a>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>
<!-- modal_sewa tambah end -->

<script>
    const modal_overlay_sewa = document.querySelector('#modal_overlay_sewa');
    const modal_sewa = document.querySelector('#modal_sewa');
    const info_sewa = document.querySelectorAll('#info_sewa');
    const id_sewa = document.querySelector('#id_sewa');


    const openModalSewa = (value) => {
        const modalClSewa = modal_sewa.classList
        const overlayClSewa = modal_overlay_sewa

        if (value) {
            overlayClSewa.classList.remove('hidden')
            setTimeout(() => {
                modalClSewa.remove('opacity-0')
                modalClSewa.remove('-translate-y-full')
                modalClSewa.remove('scale-150')
            }, 100);
        } else {
            modalClSewa.add('-translate-y-full')
            setTimeout(() => {
                modalClSewa.add('opacity-0')
                modalClSewa.add('scale-150')
            }, 100);
            setTimeout(() => overlayClSewa.classList.add('hidden'), 300);
        }
    }
    openModalSewa(false)

    info_sewa.forEach((item) => {
        item.addEventListener('click', () => {
            openModalSewa(true)
            const id = item.value
            id_sewa.innerHTML = id

            const id_ps_sewa = document.getElementById('id_ps_sewa');
            const nama_user_sewa = document.getElementById('nama_user_sewa');
            const pilihan_kirim = document.getElementById('pilihan_kirim');
            const alamat_user = document.getElementById('alamat_user');
            const map = document.getElementById('map');
            const whatsapp = document.getElementById('whatsapp');
            //  gunakan varibale id untuk mengirim season ke php
            //  gunakan variable id untuk mengambil data dari database        

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
                    pilihan_kirim.value = json.pil_kirim;
                    alamat_user.value = json.alamat;
                    whatsapp.href = "https://wa.me/62"+json.hp+"/?text-Hello";
                    map.href = "https://www.google.com/maps/search/?api=1&query="+json.latitude+","+json.longitude;

                }
            };
            var data = JSON.stringify({
                "id": id
            });
            xhr.send(data);
            // format ke dalam bentuk database
        })
    })


</script>
