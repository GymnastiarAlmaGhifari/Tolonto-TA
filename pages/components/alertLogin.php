<div id="basicModal" x-data="{ open: false }" @open-me="open=true" @close-me="open=false">
    <div @keydown.window.escape="open = false" x-show="open" class="relative z-10" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">

        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-neutral_900/75 transition-opacity"></div>


        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center sm:p-0">

                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-neutral_050 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-sm sm:w-full" @click.away="open = false">
                    <div class="flex flex-col gap-2 justify-center items-center py-4">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-neutral_900" id="modal-title">
                                <?php echo $error ?>
                            </h3>
                        </div>
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center rounded-full bg-transparent sm:mx-0 h-32 w-32">
                            <svg class="h-28 w-28 text-error_600" x-description="Heroicon name: outline/exclamation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div class="w-full flex flex-row justify-center mr-2.5">
                            <button type="button" class="w-10/12 py-2 inline-flex justify-center rounded-md border border-transparent shadow-sm bg-error_600 text-base font-medium text-white hover:bg-error_700 focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg focus:ring-error_500 sm:ml-3  sm:text-sm text-neutral_050" @click="open = false">
                                Ok
                            </button>
                        </div>
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
    setTimeout(() => {
        closeModal('basicModal');
    }, 3000);

    // openModal('basicModal');
</script>