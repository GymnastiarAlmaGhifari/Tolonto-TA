<div id="basicModal" x-data="{ open: false }" @open-me="open=true" @close-me="open=false">
    <div @keydown.window.escape="open = false" x-show="open" class="relative z-50" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">

        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-neutral_900/75 transition-opacity"></div>


        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center sm:p-0">

                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-neutral_800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-sm sm:w-full">
                    <div class="flex flex-col gap-2 justify-center items-center py-4">
                        <form action="../inventorySuperAdmin.php" method="post">
                            <div class="flex flex-col gap-2 justify-center items-center">
                                <h1 class="text-neutral_050 font-semibold text-xl">Tambah PS</h1>
                                <div class="flex flex-col gap-2 justify-center items-center">
                                    <label for="nama" class="text-neutral_050 font-semibold text-lg">Nama PS</label>
                                    <input type="text" name="nama" id="nama" class="w-[300px] h-[40px] outline-none pl-2 text-neutral_050 bg-neutral_900 rounded-xl shadow-elevation-dark-4">
                                </div>
                                <div class="flex flex-col gap-2 justify-center items-center">
                                    <label for="lokasi" class="text-neutral_050 font-semibold text-lg">jenis PS</label>
                                    <input type="text" name="jenis" id="jenis" class="w-[300px] h-[40px] outline-none pl-2 text-neutral_050 bg-neutral_900 rounded-xl shadow-elevation-dark-4">
                                </div>
                                <div class="flex flex-col gap-2 justify-center items-center">
                                    <label for="jumlah" class="text-neutral_050 font-semibold text-lg">Jumlah PS</label>
                                    <input type="text" name="jumlah" id="jumlah" class="w-[300px] h-[40px] outline-none pl-2 text-neutral_050 bg-neutral_900 rounded-xl shadow-elevation-dark-4">
                                </div>
                                <div class="flex flex-col gap-2 justify-center items-center">

                                    <!-- input image -->
                                    <label for="image" class="text-neutral_050 font-semibold text-lg">Gambar PS</label>
                                    <input type="file" name="image" id="image" class="text-neutral_050">
                                    <?php
                                    // Upload.php
                                    if (isset($_POST['image'])) {
                                        Upload::uploadimage();
                                    }
                                    ?>

                                    </input>

                                </div>
                                <div class="flex flex-row gap-2 justify-center items-center">
                                    <button type="submit" @click="open = false" name="tambah" class="w-[100px] h-[40px]
                                    bg-neutral_900 rounded-xl shadow-elevation-dark-4 text-neutral_050 font-semibold text-lg">Tambah</button>
                                    <button type="button" @click="open = false" class="w-[100px] h-[40px]
                                    bg-neutral_900 rounded-xl shadow-elevation-dark-4 text-neutral_050 font-semibold text-lg">Batal</button>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
<script>
    function openModal(id) {

        document.getElementById(id).dispatchEvent(new CustomEvent('open-me', {
            detail: {}
        }));
    }

    function closeModal(id) {
        document.getElementById(id).dispatchEvent(new CustomEvent('close-me', {
            detail: {}
        }));
    }

    openModal('basicModal');
    // set 3 second

    // openModal('basicModal');
</script>