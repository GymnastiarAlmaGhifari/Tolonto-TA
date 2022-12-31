<!-- modal Delete  start -->
<section>
    <div id="modal_overlay_delete_topup" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_delete_topup" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_050 h-[300px]  xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <svg width="53" class="mx-auto" height="60" viewBox="0 0 53 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5625 0V3.33333H0V10H3.3125V53.3333C3.3125 55.1014 4.01049 56.7971 5.25292 58.0474C6.49535 59.2976 8.18044 60 9.9375 60H43.0625C44.8196 60 46.5047 59.2976 47.7471 58.0474C48.9895 56.7971 49.6875 55.1014 49.6875 53.3333V10H53V3.33333H36.4375V0H16.5625ZM9.9375 10H43.0625V53.3333H9.9375V10ZM16.5625 16.6667V46.6667H23.1875V16.6667H16.5625ZM29.8125 16.6667V46.6667H36.4375V16.6667H29.8125Z" fill="#E53935" />
            </svg>
            <h1 class="font-semibold mx-auto text-xl text-neutral_900">Apakah Anda Yakin ?</h1>
            <h2 class="mx-auto xs:px-5 sm:px-0 text-neutral_900">Apakah anda benar ingin menghapus riwayat topup </h2>
            <h2 class="mx-auto text-base font-medium -mt-4 text-neutral_900"><span class="font-semibold text-neutral_900" id="getTopup" name="getTopup"></span> ?</h2>
            <h2 class="mx-auto text-base font-medium text-error_600 -mt-4"> proses ini tidak bisa dikembalikan</h2>
            <form action="riwayat.php"  method="post" class="flex flex-col items-center justify-center gap-2 mt-2" enctype="multipart/form-data">
                <input type="hidden" id="id_topup" name="id_topup">
                <div class="flex flex-row xs:gap-6 md:gap-[42px] mt-2 items-center justify-center w-full">
                        <button type="button" onclick="openModalDeleteTopup(false)"  class="bg-neutral_050 hover:bg-neutral_200 focus:bg-neutral_400 text-neutral_900 border border-neutral_600 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">
                        Batal
                        </button>
                    <button type="button" name="Konfirmasi-delete-topup" id="Konfirmasi-delete-topup" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl shadow-elevation-light-2 hover:bg-error_300 focus:bg-error_800">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- modal_delete  end -->
<script>
    const modal_overlay_delete_topup = document.querySelector('#modal_overlay_delete_topup');
    const modal_delete_topup = document.querySelector('#modal_delete_topup');
    const hapus_topup = document.querySelectorAll('#hapus-topup');
    const konfirmasiDeleteTopup = document.querySelector('#Konfirmasi-delete-topup');
    const id_topup = document.querySelector('#id_topup');
    const getTopup = document.querySelector('#getTopup');
    var topup_hapus = "";

    const openModalDeleteTopup = (value) => {
        const modalClDeleteTopup = modal_delete_topup.classList
        const overlayClDeleteTopup = modal_overlay_delete_topup

        if (value) {
            overlayClDeleteTopup.classList.remove('hidden')
            setTimeout(() => {
                modalClDeleteTopup.remove('opacity-0')
                modalClDeleteTopup.remove('-translate-y-full')
                modalClDeleteTopup.remove('scale-150')
            }, 100);
        } else {
            modalClDeleteTopup.add('-translate-y-full')
            setTimeout(() => {
                modalClDeleteTopup.add('opacity-0')
                modalClDeleteTopup.add('scale-150')
            }, 100);
            setTimeout(() => overlayClDeleteTopup.classList.add('hidden'), 300);
        }
    }
    openModalDeleteTopup(false)
    // foreach modals with jquery openmodal delete true 
    hapus_topup.forEach((button) => {
        button.addEventListener('click', () => {

            openModalDeleteTopup(true)
            const id = button.value;
            id_topup.value = id;
            topup_hapus = id;
            getTopup.innerHTML = id;
            konfirmasiDeleteTopup.value = id;
        })
        
    })
    
    konfirmasiDeleteTopup.addEventListener('click', () => {
        const id = document.getElementById("Konfirmasi-delete-topup").value;

         konfirmasiDeleteTopup.value = id;

         var xhr = new XMLHttpRequest();
         // path getuser.php in main dir
         var url = "..\\..\\..\\deltopup.php";
         xhr.open("POST", url, true);
         xhr.setRequestHeader("Content-Type", "application/json");
         xhr.onreadystatechange = function() {
             if (xhr.readyState === 4 && xhr.status === 200) {
                 var json = JSON.parse(xhr.responseText);
                 if (json.status == "success") {
                     Swal.fire({
                         icon: 'success',
                         title: 'Berhasil',
                         text: 'Berhasil Menghapus ' + topup_hapus + '',
                         showConfirmButton: false,
                         timer: 1000,
                         //open modals false dan reload
                            didOpen: () => {
                                setTimeout(() => {
                                    openModalDeleteTopup(false);
                                }, 1500);
                                setTimeout(() => {
                                    location.reload();
                                }, 1600);
                            },

                     });
                 } else {
                     //  tidak dapat menghapus diri sendiri
                     Swal.fire({
                         icon: 'error',
                         text: 'Gagal Menghapus ' + topup_hapus + '',
                         showConfirmButton: false,
                            timer: 1000,
                            // open modal delet admin set to false
                            didOpen: () => {
                                setTimeout(() => {
                                        openModalDeleteTopup(false);
                                }, 1500);
                            },
                            
                     });
                 }
             }
         };
         var data = JSON.stringify({
             "id": id
         });
         xhr.send(data);
    })

</script>