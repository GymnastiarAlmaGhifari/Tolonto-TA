<?php
if (isset($_POST['Konfirmasi-delete-semua-sewa'])) {
    if ($riwayat->del_allsewa($_SESSION['loksend'])) // jika berhasil refresh page tanpa submit ulang
    {
        Redirect::to('riwayat');
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            text: 'Gagal Menghapus Semua Riwayat Sewa',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            location.href = 'servis';
        });
        </script>";
    }
}
?>

<!-- modal Delete  start -->
<section>
    <div id="modal_overlay_delete_semua_sewa" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_delete_semua_sewa" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_050 h-[300px]  xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <svg width="53" class="mx-auto" height="60" viewBox="0 0 53 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5625 0V3.33333H0V10H3.3125V53.3333C3.3125 55.1014 4.01049 56.7971 5.25292 58.0474C6.49535 59.2976 8.18044 60 9.9375 60H43.0625C44.8196 60 46.5047 59.2976 47.7471 58.0474C48.9895 56.7971 49.6875 55.1014 49.6875 53.3333V10H53V3.33333H36.4375V0H16.5625ZM9.9375 10H43.0625V53.3333H9.9375V10ZM16.5625 16.6667V46.6667H23.1875V16.6667H16.5625ZM29.8125 16.6667V46.6667H36.4375V16.6667H29.8125Z" fill="#E53935" />
            </svg>
            <h1 class="font-semibold mx-auto text-xl">Apakah Anda Yakin ?</h1>
            <h2 class="mx-auto xs:px-5 sm:px-0 ">Apakah anda benar ingin menghapus semua riwayat<span class="font-semibold text-error_600"> sewa </span>?</h2>
            <h2 class="mx-auto text-base font-medium text-error_600 -mt-4"> proses ini tidak bisa dikembalikan</h2>
            <form action="riwayat.php" method="post" class="flex flex-col items-center justify-center gap-2 mt-2" enctype="multipart/form-data">
                <div class="flex flex-row xs:gap-6 md:gap-[42px] mt-2 items-center justify-center w-full">
                    <button type="button" onclick="openModalDeleteSemuaSewa(false)" name="Batal-Delete-Admin" id="Batal-Delete-Admin" value="Batal-Delete-Admin" class="bg-neutral_050 hover:bg-neutral_200 focus:bg-neutral_400 text-neutral_900 border border-neutral_600 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">
                        Batal
                    </button>
                    <button type="submit" name="Konfirmasi-delete-semua-sewa" id="Konfirmasi-delete-semua-sewa" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl shadow-elevation-light-2 hover:bg-error_300 focus:bg-error_800">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- modal_delete  end -->
<script>
    const modal_overlay_delete_semua_sewa = document.querySelector('#modal_overlay_delete_semua_sewa');
    const modal_delete_semua_sewa = document.querySelector('#modal_delete_semua_sewa');
    const hapus_semua_sewa = document.querySelectorAll('#hapus-semua-sewa');
    const konfirmasiDeleteSemuaSewa = document.querySelector('#Konfirmasi-delete-semua-sewa');
    var del_semua_sewa = '';

    const openModalDeleteSemuaSewa = (value) => {
        const modalClDeleteSemuaSewa = modal_delete_semua_sewa.classList
        const overlayClDeleteSemuaSewa = modal_overlay_delete_semua_sewa

        if (value) {
            overlayClDeleteSemuaSewa.classList.remove('hidden')
            setTimeout(() => {
                modalClDeleteSemuaSewa.remove('opacity-0')
                modalClDeleteSemuaSewa.remove('-translate-y-full')
                modalClDeleteSemuaSewa.remove('scale-150')
            }, 100);
        } else {
            modalClDeleteSemuaSewa.add('-translate-y-full')
            setTimeout(() => {
                modalClDeleteSemuaSewa.add('opacity-0')
                modalClDeleteSemuaSewa.add('scale-150')
            }, 100);
            setTimeout(() => overlayClDeleteSemuaSewa.classList.add('hidden'), 300);
        }
    }
    openModalDeleteSemuaSewa(false)
    // foreach modals with jquery openmodal delete true 
    hapus_semua_sewa.forEach((button) => {
        button.addEventListener('click', () => {

            openModalDeleteSemuaSewa(true)
            const id = button.value;
            del_semua_sewa = id;
            var xhr = new XMLHttpRequest();
            // path getuser.php in main dir
            var url = "..\\..\\..\\getuser.php";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    //  console.log(json.status + ", " + json.username + ", " + json.level + ", " + json.lokasi + ", " + json.img + ", " + json.id_admin);
                    konfirmasiDeleteSemuaSewa.value = json.id_admin;
                    
                }
            };
            var data = JSON.stringify({
                "id": id
            });
            xhr.send(data);
            // isi value dari button delete admin
            //  document.getElementById("getTopup").value = button.value;
            //  //  set inner html getTopup dengan button value


        })
    })

    konfirmasiDeleteSemuaSewa.addEventListener('click', () => {
        const id = document.getElementById("Konfirmasi-delete-semua-sewa").value;


        var xhr = new XMLHttpRequest();
        // path getuser.php in main dir
        var url = "..\\..\\..\\delallsewa.php";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                 var json = JSON.parse(xhr.responseText);
                 if (json.status == "success") {
                     Swal.fire({
                         icon: 'success',
                         title: 'Berhasil',
                         text: 'Berhasil hapus ' + del_semua_sewa + '',
                         showConfirmButton: false,
                         timer: 1000,
                         //open modals false dan reload
                            didOpen: () => {
                                setTimeout(() => {
                                    openModalDeleteSemuaSewa(false)
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
                         text: 'Gagal menghapus ' + del_semua_sewa + '',
                         showConfirmButton: false,
                            timer: 1000,
                            // open modal delet admin set to false
                            didOpen: () => {
                                setTimeout(() => {
                                        openModalDeleteSemuaSewa(false)
                                }, 1500);
                            },
                            
                     });
                 }
             }
        };
        xhr.send();
    })
</script>