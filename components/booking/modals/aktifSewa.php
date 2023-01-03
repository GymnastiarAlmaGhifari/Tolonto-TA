

<!-- modal Delete  start -->
<section>
    <div id="modal_overlay_aktif_sewa" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_aktif_sewa" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_050 h-[300px] xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <svg width="57" class="mx-auto" height="60" viewBox="0 0 57 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M44.3294 8.61176L39.2118 13.7294C45.3176 17.4353 49.4118 24.1059 49.4118 31.7647C49.4118 37.3811 47.1807 42.7674 43.2093 46.7387C39.238 50.7101 33.8516 52.9412 28.2353 52.9412C22.6189 52.9412 17.2326 50.7101 13.2613 46.7387C9.28991 42.7674 7.05882 37.3811 7.05882 31.7647C7.05882 24.1059 11.1529 17.4353 17.2235 13.6941L12.1412 8.61176C4.8 13.6941 0 22.1647 0 31.7647C0 39.2532 2.97478 46.4349 8.26993 51.7301C13.5651 57.0252 20.7468 60 28.2353 60C35.7238 60 42.9055 57.0252 48.2007 51.7301C53.4958 46.4349 56.4706 39.2532 56.4706 31.7647C56.4706 22.1647 51.6706 13.6941 44.3294 8.61176ZM31.7647 0H24.7059V35.2941H31.7647" fill="#4FCF2F" />
            </svg>
            <h1 class="font-semibold text-neutral_900 mx-auto text-xl">Apakah Anda Yakin ?</h1>
            <h2 class="mx-auto xs:px-5 sm:px-0 text-neutral_900">Apakah anda benar ingin mengaktifkan sewa dengan ID</h2>
            <h2 class="text-neutral_900 -mt-4 mx-auto"><span class="font-bold text-neutral_900 text-lg" id="getAktifSewa" name="getAktifSewa"></span> ?</h2>
            <form id="aktifSewa" action="aktifSewa.php" method="post" class="flex flex-col items-center justify-center gap-2 mt-2" enctype="multipart/form-data">
                <div class="flex flex-row xs:gap-6 md:gap-[42px] mt-2 items-center justify-center w-full">
                    <button type="button" title="batal" onclick="openModalAktifSewa(false)" name="Batal-Delete-Admin" id="Batal-Delete-Admin" value="Batal-Delete-Admin" class="bg-neutral_050 hover:bg-neutral_200 focus:bg-neutral_400 text-neutral_900 border border-neutral_600 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">
                        Batal
                    </button>
                    <button type="submit" title="konfrmasi aktifkan sewa" name="Konfirmasi-aktif" id="Konfirmasi-aktif" class="bg-[#4FCF2F] hover:bg-[#81FF62] focus:bg-[#4FCF2F]/80 text-neutral_050 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- modal_delete  end -->
<script>
    const modal_overlay_aktif_sewa = document.querySelector('#modal_overlay_aktif_sewa');
    const modal_aktif_sewa = document.querySelector('#modal_aktif_sewa');
    const aktif_sewa = document.querySelectorAll('#aktif_sewa');
    const konfirmasiAktif = document.querySelector('#Konfirmasi-aktif');
    const aktifSewa = document.querySelector('#aktifSewa');

    aktifSewa.addEventListener('submit', (e) => {
        e.preventDefault();
        const id = document.querySelector('#getAktifSewa').innerHTML;
        var idadmin = '<?php echo $_SESSION['id_admin'] ?>';

        var xhr = new XMLHttpRequest();
        var url = "..\\..\\..\\aktifsewa.php";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var json = JSON.parse(xhr.responseText);
                if (json.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Berhasil Mengaktifkan sewa dengan ID ' + id,
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getHtmlContainer()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            openModalAktifSewa(false);
                            location.reload();
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Mengaktifkan sewa dengan ID ' + id,
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getHtmlContainer()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            openModalAktifSewa(false);
                            location.reload();
                        }
                    })
                }
            }
        };
        var dataaktifsewa = JSON.stringify({
            "id": id,
            "idadmin": idadmin
        });
        xhr.send(dataaktifsewa);
    })

    const openModalAktifSewa = (value) => {
        const modalClAktifSewa = modal_aktif_sewa.classList
        const overlayClAktifSewa = modal_overlay_aktif_sewa

        if (value) {
            overlayClAktifSewa.classList.remove('hidden')
            setTimeout(() => {
                modalClAktifSewa.remove('opacity-0')
                modalClAktifSewa.remove('-translate-y-full')
                modalClAktifSewa.remove('scale-150')
            }, 100);
        } else {
            modalClAktifSewa.add('-translate-y-full')
            setTimeout(() => {
                modalClAktifSewa.add('opacity-0')
                modalClAktifSewa.add('scale-150')
            }, 100);
            setTimeout(() => overlayClAktifSewa.classList.add('hidden'), 300);
        }
    }
    openModalAktifSewa(false)
    // foreach modals with jquery openmodal delete true 
    aktif_sewa.forEach((aktif_sewa) => {
        aktif_sewa.addEventListener('click', () => {
            openModalAktifSewa(true)
            const getAktifSewa = document.querySelector('#getAktifSewa');
            getAktifSewa.innerHTML = aktif_sewa.value;

        })
    })
</script>