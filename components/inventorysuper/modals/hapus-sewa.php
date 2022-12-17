 <!-- modal Delete  start -->
 <section>
     <div id="modal_overlay_delete_ps_sewa" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0 z-50">
         <!-- modal -->
         <div id="modal_delete_ps_sewa" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_050 h-[300px] w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
             <svg width="53" class="mx-auto" height="60" viewBox="0 0 53 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M16.5625 0V3.33333H0V10H3.3125V53.3333C3.3125 55.1014 4.01049 56.7971 5.25292 58.0474C6.49535 59.2976 8.18044 60 9.9375 60H43.0625C44.8196 60 46.5047 59.2976 47.7471 58.0474C48.9895 56.7971 49.6875 55.1014 49.6875 53.3333V10H53V3.33333H36.4375V0H16.5625ZM9.9375 10H43.0625V53.3333H9.9375V10ZM16.5625 16.6667V46.6667H23.1875V16.6667H16.5625ZM29.8125 16.6667V46.6667H36.4375V16.6667H29.8125Z" fill="#E53935" />
             </svg>
             <h1 class="font-semibold mx-auto text-xl">Apakah Anda Yakin ?</h1>
             <h2 class="mx-auto">Apakah anda benar ingin menghapus ps sewa <span class="font-semibold text-error_600" id="getName" name="getName"></span> ?</h2>
             <h2 class="mx-auto text-base font-medium text-error_600 -mt-4"> proses ini tidak bisa dikembalikan</h2>
             <form action="inventorySuperAdmin.php" method="post" class="flex flex-col items-center justify-center gap-2 mt-2" enctype="multipart/form-data">
                 <input type="hidden" name="id-sewa-hapus" id="id-sewa-hapus" value="">
                 <div class="flex flex-row gap-[42px] mt-2 items-center justify-center w-full">
                     <button type="button" onclick="openModalDeletePsSewa(false)" name="Batal-Rental-Ps" id="Batal-Rental-Ps" value="Batal-Rental-Ps" class="bg-neutral_050 text-neutral_900 border border-neutral_600 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">
                         Batal
                     </button>
                     <button type="submit" name="Konfirmasi-delete-ps-sewa" id="Konfirmasi-delete-ps-sewa" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">Konfirmasi</button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!-- modal_delete  end -->
 <script>
     const modal_overlay_delete_ps_sewa = document.querySelector('#modal_overlay_delete_ps_sewa');
     const modal_delete_ps_sewa = document.querySelector('#modal_delete_ps_sewa');
     const hapusSewa = document.querySelectorAll('#hapusSewa');
     const konfirmasiDeletePsSewa = document.querySelector('#Konfirmasi-delete-ps-sewa');

     const openModalDeletePsSewa = (value) => {
         const modalClDeletePsSewa = modal_delete_ps_sewa.classList
         const overlayClDeletePsSewa = modal_overlay_delete_ps_sewa

         if (value) {
             overlayClDeletePsSewa.classList.remove('hidden')
             setTimeout(() => {
                 modalClDeletePsSewa.remove('opacity-0')
                 modalClDeletePsSewa.remove('-translate-y-full')
                 modalClDeletePsSewa.remove('scale-150')
             }, 100);
         } else {
             modalClDeletePsSewa.add('-translate-y-full')
             setTimeout(() => {
                 modalClDeletePsSewa.add('opacity-0')
                 modalClDeletePsSewa.add('scale-150')
             }, 100);
             setTimeout(() => overlayClDeletePsSewa.classList.add('hidden'), 300);
         }
     }
     openModalDeletePsSewa(false)
     // foreach modals with jquery openmodal delete true 
     hapusSewa.forEach((button) => {
         button.addEventListener('click', () => {
             openModalDeletePsSewa(true)
             const id = button.value

             var xhr = new XMLHttpRequest();
             // path getuser.php in main dir
             var url = "..\\..\\..\\getps.php";
             xhr.open("POST", url, true);
             xhr.setRequestHeader("Content-Type", "application/json");
             xhr.onreadystatechange = function() {
                 if (xhr.readyState === 4 && xhr.status === 200) {
                     var json = JSON.parse(xhr.responseText);
                     console.log(json.status + ", " + json.nama_ps);
                     document.getElementById("getName").innerHTML = json.username;
                     konfirmasiDeletePsSewa.value = json.id_ps;
                 }
             };
             var data = JSON.stringify({
                 "id": id,
                 "table": "ps_sewa"
             });
             xhr.send(data);
         })
     })

     konfirmasiDeletePsSewa.addEventListener('click', () => {
         const id = document.getElementById('Konfirmasi-delete-ps-sewa').value
         console.log(id)
         var xhr = new XMLHttpRequest();
         // path getuser.php in main dir
         var url = "..\\..\\..\\delps.php";
         xhr.open("POST", url, true);
         xhr.setRequestHeader("Content-Type", "application/json");
         xhr.onreadystatechange = function() {
             if (xhr.readyState === 4 && xhr.status === 200) {
                 var json = JSON.parse(xhr.responseText);
                 console.log(json.status);
                 if (json.status == "success") {
                     openModalDeletePsSewa(false)
                     location.reload()
                 }
             }
         };
         var data = JSON.stringify({
             "id": id,
             "table": "ps_sewa"
         });
         xhr.send(data);
     })
 </script>