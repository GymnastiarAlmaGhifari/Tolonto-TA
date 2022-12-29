<?php

?>

<!-- modal Delete  start -->
<section>
    <div id="modal_overlay_logout" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_logout" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_050 h-[300px] xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <svg class="mx-auto" width="54" height="60" viewBox="0 0 54 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M39 45V36H18V24H39V15L54 30L39 45ZM33 0C34.5913 0 36.1174 0.632141 37.2426 1.75736C38.3679 2.88258 39 4.4087 39 6V12H33V6H6V54H33V48H39V54C39 55.5913 38.3679 57.1174 37.2426 58.2426C36.1174 59.3679 34.5913 60 33 60H6C4.4087 60 2.88258 59.3679 1.75736 58.2426C0.632141 57.1174 0 55.5913 0 54V6C0 4.4087 0.632141 2.88258 1.75736 1.75736C2.88258 0.632141 4.4087 0 6 0H33Z" fill="#E53935" />
            </svg>

            <h1 class="font-semibold mx-auto text-xl text-neutral_900">Apakah Anda Yakin ?</h1>
            <h2 class="mx-auto text-neutral_900">Apakah anda benar ingin <span class="font-semibold text-error_600" id="getName" name="getName">Logout</span>?</h2>
            <h2 class="mx-auto text-base font-medium text-error_600 -mt-4"> proses ini tidak bisa dikembalikan</h2>
            <form action="logout.php" method="post" class="flex flex-col items-center justify-center gap-2 mt-2" enctype="multipart/form-data">
                <div class="flex flex-row xs:gap-6 md:gap-[42px] mt-2 items-center justify-center w-full">
                    <button type="button" onclick="openModalLogout(false)" name="Batal-Logout" id="Batal-Logout" value="Batal-Logout" class="bg-neutral_050 text-neutral_900 border border-neutral_600 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">
                        Batal
                    </button>
                    <button type="submit" name="Konfirmasi-logout" id="Konfirmasi-logout" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl shadow-elevation-light-2">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- modal_delete  end -->
<script>
    const modal_overlay_logout = document.querySelector('#modal_overlay_logout');
    const modal_logout = document.querySelector('#modal_logout');
    const logout = document.getElementById('#logout');
    const konfirmasiLogout = document.querySelector('#Konfirmasi-logout');


    const openModalLogout = (value) => {
        const modalClLogout = modal_logout.classList
        const overlayClLogout = modal_overlay_logout

        if (value) {
            overlayClLogout.classList.remove('hidden')
            setTimeout(() => {
                modalClLogout.remove('opacity-0')
                modalClLogout.remove('-translate-y-full')
                modalClLogout.remove('scale-150')
            }, 100);
        } else {
            modalClLogout.add('-translate-y-full')
            setTimeout(() => {
                modalClLogout.add('opacity-0')
                modalClLogout.add('scale-150')
            }, 100);
            setTimeout(() => overlayClLogout.classList.add('hidden'), 300);
        }
    }
    openModalLogout(false)
    // foreach modals with jquery openmodal delete true 
    logout.addEventListener('click', () => {
        openModalLogout(true)
    })
</script>