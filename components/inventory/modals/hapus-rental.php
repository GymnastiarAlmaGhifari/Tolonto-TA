 <!-- modal Delete  start -->
 <section>
     <div id="modal_overlay_delete_ps_rental" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">
         <!-- modal -->
         <div id="modal_delete_ps_rental" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_050 h-[300px] xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
             <svg width="53" class="mx-auto" height="60" viewBox="0 0 53 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M16.5625 0V3.33333H0V10H3.3125V53.3333C3.3125 55.1014 4.01049 56.7971 5.25292 58.0474C6.49535 59.2976 8.18044 60 9.9375 60H43.0625C44.8196 60 46.5047 59.2976 47.7471 58.0474C48.9895 56.7971 49.6875 55.1014 49.6875 53.3333V10H53V3.33333H36.4375V0H16.5625ZM9.9375 10H43.0625V53.3333H9.9375V10ZM16.5625 16.6667V46.6667H23.1875V16.6667H16.5625ZM29.8125 16.6667V46.6667H36.4375V16.6667H29.8125Z" fill="#E53935" />
             </svg>
             <h1 class="font-semibold mx-auto text-xl mb-2 text-neutral_900">Apakah Anda Yakin ?</h1>
             <h2 class="mx-auto xs:px-5 sm:px-0 text-neutral_900">Apakah anda benar ingin menghapus ps sewa <span class="font-semibold text-error_600" id="namaPsRental" name="namaPsRental"></span> ?</h2>
             <h2 class="mx-auto text-base font-medium text-error_600 -mt-4"> proses ini tidak bisa dikembalikan</h2>
             <form action="inventory.php" method="post" class="flex flex-col items-center justify-center gap-2 mt-2" enctype="multipart/form-data">
                 <input type="hidden" name="id-rental-hapus" id="id-rental-hapus" value="">
                 <div class="flex flex-row xs:gap-6 md:gap-[42px] mt-2 items-center justify-center w-full">
                     <button type="button" onclick="openModalDeletePsRental(false)" name="Batal-Rental-Ps" id="Batal-Rental-Ps" value="Batal-Rental-Ps" class=" bg-neutral_050 hover:bg-neutral_200 focus:bg-neutral_400 text-neutral_900 border border-neutral_600 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">
                         Batal
                     </button>
                     <button type="button" name="Konfirmasi-delete-ps-rental" id="Konfirmasi-delete-ps-rental" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl shadow-elevation-light-2 hover:bg-error_300 focus:bg-error_800">Konfirmasi</button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!-- modal_delete  end -->
 <script>
     const modal_overlay_delete_ps_rental = document.querySelector('#modal_overlay_delete_ps_rental');
     const modal_delete_ps_rental = document.querySelector('#modal_delete_ps_rental');
     const hapusRental = document.querySelectorAll('#hapusRental');
     const konfirmasiDeleteRental = document.querySelector('#Konfirmasi-delete-ps-rental');
    var delrental = '';

     const openModalDeletePsRental = (value) => {
         const modalClDeletePsRental = modal_delete_ps_rental.classList
         const overlayClDeletePsRental = modal_overlay_delete_ps_rental

         if (value) {
             overlayClDeletePsRental.classList.remove('hidden')
             setTimeout(() => {
                 modalClDeletePsRental.remove('opacity-0')
                 modalClDeletePsRental.remove('-translate-y-full')
                 modalClDeletePsRental.remove('scale-150')
             }, 100);
         } else {
             modalClDeletePsRental.add('-translate-y-full')
             setTimeout(() => {
                 modalClDeletePsRental.add('opacity-0')
                 modalClDeletePsRental.add('scale-150')
             }, 100);
             setTimeout(() => overlayClDeletePsRental.classList.add('hidden'), 300);
         }
     }
     openModalDeletePsRental(false)
     // foreach modals with jquery openmodal delete true 
     hapusRental.forEach((button) => {
         button.addEventListener('click', () => {
             openModalDeletePsRental(true)
             const id = button.value
                delrental = id;
             var xhr = new XMLHttpRequest();
             // path getuser.php in main dir
             var url = "..\\..\\..\\getps.php";
             xhr.open("POST", url, true);
             xhr.setRequestHeader("Content-Type", "application/json");
             xhr.onreadystatechange = function() {
                 if (xhr.readyState === 4 && xhr.status === 200) {
                     var json = JSON.parse(xhr.responseText);
                     document.getElementById("namaPsRental").innerHTML = json.nama_ps;
                     konfirmasiDeleteRental.value = json.id_ps;
                 }
             };
             var data = JSON.stringify({
                 "id": id,
                 "table": "ps"
             });
             xhr.send(data);
         })
     })

     konfirmasiDeleteRental.addEventListener('click', () => {
         const id = document.getElementById('Konfirmasi-delete-ps-rental').value;
         var xhr = new XMLHttpRequest();
         // path getuser.php in main dir
         var url = "..\\..\\..\\delps.php";
         xhr.open("POST", url, true);
         xhr.setRequestHeader("Content-Type", "application/json");
         xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                 var json = JSON.parse(xhr.responseText);
                 if (json.status == "success") {
                     Swal.fire({
                         icon: 'success',
                         title: 'Berhasil',
                         text: 'Berhasil hapus ' + delrental + '',
                         showConfirmButton: false,
                         timer: 1000,
                         //open modals false dan reload
                            didOpen: () => {
                                setTimeout(() => {
                                    openModalDeletePsRental(false)
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
                         text: 'Gagal menghapus ' + delrental + '',
                         showConfirmButton: false,
                            timer: 1000,
                            // open modal delet admin set to false
                            didOpen: () => {
                                setTimeout(() => {
                                        openModalDeletePsRental(false)
                                }, 1500);
                            },
                            
                     });
                 }
             }
         };
         var data = JSON.stringify({
             "id": id,
             "table": "ps"
         });
         xhr.send(data);
     })
 </script>