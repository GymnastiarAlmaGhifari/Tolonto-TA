<!-- modal Rental tambah start -->
<section>
    <div id="modal_overlay_deleteadmin" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0 z-50">

        <!-- modal -->
        <div id="modal_deleteadmin" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_050 h-[300px] w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <svg width="53" class="mx-auto" height="60" viewBox="0 0 53 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5625 0V3.33333H0V10H3.3125V53.3333C3.3125 55.1014 4.01049 56.7971 5.25292 58.0474C6.49535 59.2976 8.18044 60 9.9375 60H43.0625C44.8196 60 46.5047 59.2976 47.7471 58.0474C48.9895 56.7971 49.6875 55.1014 49.6875 53.3333V10H53V3.33333H36.4375V0H16.5625ZM9.9375 10H43.0625V53.3333H9.9375V10ZM16.5625 16.6667V46.6667H23.1875V16.6667H16.5625ZM29.8125 16.6667V46.6667H36.4375V16.6667H29.8125Z" fill="#E53935" />
            </svg>
            <h1>Apakah Anda Yakin</h1>
            <input class="" id="getName" name="getName"></input>
            <h2 class="mx-auto">Apakah anda benar ingin menghapus akun agim? proses ini tidak bisa dikembalikan </h2>


            <form action="userSuperAdmin.php" method="post" class="flex flex-col items-center justify-center gap-4 mt-2" enctype="multipart/form-data">
                <div class="flex flex-row gap-[42px] mt-2 items-center justify-center w-full">
                    <button type="button" onclick="openModalDeleteadmin(false)" name="Batal-Admin" id="Batal-Admin" value="Batal-Admin" class="bg-neutral_050 text-neutral_900 border border-neutral_600 w-5/12 h-12 rounded-2xl">
                        Batal
                    </button>
                    <button type="submit" name="Konfirmasi-Admin" id="Konfirmasi-Admin" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl">Konfirmasi</button>
                </div>
            </form>

        </div>

    </div>
</section>
<!-- modal_deleteadmin tambah end -->
<script>
    const modal_overlay_deleteadmin = document.querySelector('#modal_overlay_deleteadmin');
    const modal_deleteadmin = document.querySelector('#modal_deleteadmin');
    const deleteAdmin = document.querySelectorAll('#deleteAdmin');


    const openModalDeleteadmin = (value) => {
        const modalClDeleteadmin = modal_deleteadmin.classList
        const overlayClDeleteadmin = modal_overlay_deleteadmin

        if (value) {
            overlayClDeleteadmin.classList.remove('hidden')
            setTimeout(() => {
                modalClDeleteadmin.remove('opacity-0')
                modalClDeleteadmin.remove('-translate-y-full')
                modalClDeleteadmin.remove('scale-150')
            }, 100);
        } else {
            modalClDeleteadmin.add('-translate-y-full')
            setTimeout(() => {
                modalClDeleteadmin.add('opacity-0')
                modalClDeleteadmin.add('scale-150')
            }, 100);
            setTimeout(() => overlayClDeleteadmin.classList.add('hidden'), 300);
        }
    }
    openModalDeleteadmin(false)
    // foreach modals with jquery openmodal delete true 
    deleteAdmin.forEach((button) => {
        button.addEventListener('click', () => {
            openModalDeleteadmin(true)
            // isi value dari button delete admin
            document.getElementById("getName").value = button.value;

            console.log(button.value);
        })
    })
</script>