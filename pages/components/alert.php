<div id="basicModal" x-data="{ open: false }" @open-me="open=true" @close-me="open=false">
    <div @keydown.window.escape="open = false" x-show="open" class="relative z-10" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">

        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-neutral_900 bg-opacity-75 transition-opacity"></div>


        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-neutral_050 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full" @click.away="open = false">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-error_100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-error_600" x-description="Heroicon name: outline/exclamation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-neutral_900" id="modal-title">
                                    <?php echo $error ?>
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-neutral_500">
                                        Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-neutral_050 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-error_600 text-base font-medium text-white hover:bg-error_700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-error_500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                            Deactivate
                        </button>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-neutral_300 shadow-sm px-4 py-2 bg-white text-base font-medium text-neutral_700 hover:bg-neutral_050 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teriary_500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                            Cancel
                        </button>
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


<div id="sidebar" class="container flex flex-col w-[55px] h-screen bg-primary_500 fixed items-center gap-y-12 z-40">
    <div onclick="openSidebar()" id="sidebarToggle" class="space-y-1.5 mt-5 mb-8 cursor-pointer">
        <span class="block w-7 h-1 bg-neutral_900 rounded-4xl"></span>
        <span class="block w-7 h-1 bg-neutral_900 rounded-4xl"></span>
        <span class="block w-7 h-1 bg-neutral_900 rounded-4xl"></span>
    </div>
    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M21.1593 21.9591H3.84071C2.87184 21.9591 2.08331 21.2333 2.08331 20.3417V10.0841C2.08527 9.83661 2.14576 9.59314 2.25984 9.37355C2.37391 9.15396 2.53834 8.96449 2.73968 8.82062L11.3989 2.43621C11.7202 2.2067 12.1052 2.08331 12.5 2.08331C12.8948 2.08331 13.2797 2.2067 13.601 2.43621L22.2603 8.82062C22.4616 8.96449 22.626 9.15396 22.7401 9.37355C22.8542 9.59314 22.9147 9.83661 22.9166 10.0841V20.3417C22.9166 21.2333 22.1326 21.9591 21.1593 21.9591ZM3.87543 20.1669H21.1245V10.2095L12.5369 3.87438C12.5122 3.86656 12.4856 3.86656 12.4608 3.87438L3.87543 10.2095V20.1669Z" fill="#303030" />
    </svg>
    <div class="cursor-pointer active:bg-teriary_300 w-full">
        <svg class="m-auto" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.1063 13.0068C16.115 13.6002 15.7002 14.0473 15.1268 14.0629C14.5725 14.0786 14.1403 13.6569 14.1229 13.0826C14.1046 12.4682 14.5351 12.0055 15.1242 12.0055C15.6801 12.0055 16.0975 12.4316 16.1063 13.0068ZM10.0289 10.6905C9.72824 10.667 9.33958 10.8221 9.15048 10.626C8.94656 10.4143 9.09819 10.0204 9.08077 9.70665C9.05288 9.20732 8.75746 8.88228 8.31477 8.87705C7.88777 8.87182 7.58103 9.21255 7.5575 9.71014C7.54268 10.0125 7.6795 10.3803 7.49824 10.599C7.31698 10.8177 6.9292 10.653 6.63552 10.6905C6.59195 10.6957 6.54838 10.6966 6.50568 10.7027C5.99153 10.7803 5.73272 11.0434 5.73795 11.4818C5.74317 11.9201 6.04992 12.2077 6.56581 12.253C6.87778 12.2809 7.28213 12.1162 7.48256 12.3271C7.69867 12.5554 7.53223 12.9649 7.56098 13.2943C7.58713 13.6046 7.69519 13.8625 8.00106 13.9845C8.12739 14.0425 8.26713 14.0651 8.40529 14.0497C8.54345 14.0344 8.67483 13.9817 8.78535 13.8974C9.04678 13.6926 9.08425 13.3919 9.08251 13.0765C9.07641 12.2573 9.08251 12.2556 9.87987 12.2539C10.053 12.2546 10.2253 12.2302 10.3914 12.1815C10.7591 12.0709 10.8533 11.7789 10.9143 11.4844C10.9108 11.0129 10.5883 10.7341 10.0289 10.6905ZM17.2173 8.87705C16.6283 8.87182 16.2239 9.28924 16.223 9.90272C16.223 10.4988 16.6439 10.9389 17.213 10.9389C17.782 10.9389 18.1785 10.4927 18.1716 9.88007C18.1646 9.26745 17.8056 8.88315 17.2173 8.87705ZM22.1845 18.1674C20.4887 20.5203 17.057 20.3294 15.6 17.8101C15.5912 17.7985 15.5845 17.7856 15.5799 17.7718C15.3237 16.7949 14.6701 16.5866 13.7299 16.6711C12.7216 16.7583 11.6986 16.7243 10.6842 16.6781C10.1709 16.6546 9.89991 16.8184 9.7143 17.2881C9.4442 17.9833 8.98249 18.5876 8.38275 19.031C7.11132 19.9896 5.32227 20.0767 4.00205 19.2628C3.32476 18.8324 2.78723 18.2143 2.45489 17.4839C2.12255 16.7534 2.00974 15.9421 2.13021 15.1488C2.45206 13.1915 2.7559 11.2314 3.04173 9.26832C3.23432 7.9542 3.86524 6.99214 5.08524 6.39956C6.38716 5.7669 7.76839 5.50721 9.18882 5.37476C10.2999 5.27106 11.4145 5.23446 12.6214 5.20831C14.6004 5.285 16.677 5.28848 18.6866 5.89674C19.3542 6.09267 19.987 6.39201 20.5619 6.78386C21.3706 7.3442 21.8142 8.13981 21.9649 9.09491C22.249 10.8822 22.4878 12.6765 22.7928 14.4603C23.0193 15.7779 22.9984 17.0389 22.1845 18.1674ZM21.3619 15.4084C21.1004 13.5732 20.8198 11.7414 20.5541 9.90708C20.3345 8.38643 19.7393 7.70846 18.2369 7.37557C16.5242 6.99737 14.7777 6.793 13.024 6.76556C10.8332 6.71983 8.64514 6.9461 6.51004 7.43918C5.37717 7.70061 4.70355 8.46747 4.53798 9.59162C4.25651 11.4966 3.97939 13.4024 3.67526 15.303C3.59775 15.7313 3.61982 16.1717 3.73975 16.5901C4.24867 18.2955 6.44119 18.8454 7.70564 17.5957C8.15443 17.1522 8.39756 16.5918 8.62675 16.035C8.90822 15.3474 9.40407 15.1165 10.096 15.1287C10.9082 15.1427 11.7212 15.1287 12.536 15.1287C13.3778 15.1287 14.2196 15.1287 15.0632 15.1287C15.6688 15.1287 16.1272 15.3283 16.3468 15.9505C16.4609 16.2755 16.6431 16.5788 16.8034 16.8864C17.2295 17.7021 17.8822 18.2084 18.8182 18.2676C20.4416 18.3704 21.5902 17.0206 21.3636 15.4084H21.3619Z" fill="#303030" />
        </svg>
    </div>
    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.58 13.6643L10.8779 13.0874L8.92583 11.1353L3.14526 16.9159C2.81264 17.2381 2.54747 17.6234 2.36517 18.0491C2.18288 18.4749 2.0871 18.9326 2.08342 19.3958C2.07974 19.8589 2.16824 20.3181 2.34375 20.7467C2.51925 21.1753 2.77828 21.5647 3.10573 21.8922C3.43318 22.2197 3.82251 22.4789 4.25107 22.6545C4.67962 22.8301 5.13883 22.9187 5.60195 22.9151C6.06507 22.9115 6.52286 22.8158 6.94865 22.6336C7.37444 22.4514 7.75973 22.1863 8.08209 21.8538L12.223 17.7129L11.0191 16.509C10.6527 16.1433 10.4125 15.6702 10.3335 15.1586C10.2546 14.647 10.3409 14.1235 10.58 13.6643ZM6.82815 20.5932C6.50679 20.9146 6.07092 21.0951 5.61645 21.0951C5.16198 21.0951 4.72612 20.9146 4.40475 20.5932C4.08339 20.2718 3.90285 19.836 3.90285 19.3815C3.90285 18.927 4.08339 18.4912 4.40475 18.1698L8.60678 13.9689C8.47493 14.635 8.50647 15.3232 8.69872 15.9745C8.89096 16.6257 9.23818 17.2207 9.71065 17.7085L6.82815 20.5932ZM11.2025 6.75318L10.9802 8.67633L13.1367 10.8329L13.7148 10.5339C14.1741 10.2975 14.6966 10.2132 15.2069 10.2931C15.7172 10.3731 16.1889 10.6131 16.554 10.9786L19.6343 14.0578L20.2424 13.6476C21.4123 12.8573 22.2704 11.6841 22.6692 10.3298C23.068 8.97547 22.9827 7.52451 22.4279 6.22626C22.3555 6.05825 22.243 5.91051 22.1004 5.79593C21.9578 5.68134 21.7893 5.60338 21.6096 5.56885C21.4299 5.53432 21.2446 5.54426 21.0696 5.59782C20.8947 5.65137 20.7355 5.7469 20.6059 5.87609L19.5176 6.9655H18.0413L18.0358 5.49035L19.1252 4.40093C19.2547 4.27157 19.3505 4.11247 19.4043 3.93753C19.4581 3.76259 19.4682 3.57714 19.4337 3.39739C19.3993 3.21763 19.3214 3.04905 19.2067 2.90638C19.0921 2.76371 18.9443 2.65128 18.7761 2.57894C17.662 2.09738 16.4287 1.96273 15.2369 2.19256C14.0451 2.42239 12.9503 3.00602 12.0951 3.86734C11.7327 4.23004 11.4171 4.63674 11.1558 5.07792L10.9335 5.44922L11.0902 5.85163C11.1996 6.13834 11.2382 6.44726 11.2025 6.75207V6.75318ZM12.89 5.66154C13.0283 5.46944 13.1818 5.28878 13.3491 5.12128C13.8297 4.63647 14.4197 4.27417 15.0695 4.06486C15.7193 3.85555 16.4099 3.80535 17.0831 3.91847L16.5995 4.40093C16.377 4.62532 16.2523 4.92865 16.2527 5.24467L16.2616 7.5569C16.2648 7.86911 16.3904 8.16759 16.6114 8.38816C16.8323 8.60872 17.1311 8.73375 17.4433 8.73636L19.7488 8.74525C19.9061 8.74597 20.0619 8.71571 20.2074 8.6562C20.353 8.59669 20.4853 8.50909 20.597 8.39842L21.0795 7.92041C21.1924 8.59372 21.1422 9.28428 20.9331 9.93419C20.724 10.5841 20.3621 11.1744 19.8778 11.6555L19.8066 11.7245L17.8057 9.7235C17.415 9.33087 16.9503 9.01957 16.4386 8.80759C15.9268 8.5956 15.3781 8.48714 14.8242 8.48846C14.3783 8.4892 13.9353 8.5601 13.5114 8.69856L12.8444 8.03157L12.9689 6.96439C13.0206 6.52851 12.9939 6.08688 12.89 5.66043V5.66154ZM16.5217 11.9457C16.0821 11.5074 15.4895 11.2566 14.8688 11.2463C14.2481 11.2359 13.6475 11.4667 13.1934 11.8901L10.2365 8.93201L10.5021 6.6698C10.5274 6.45464 10.4935 6.23665 10.404 6.03937C10.3144 5.84209 10.1727 5.67301 9.99412 5.55037L5.26628 2.29436C5.03708 2.13625 4.75969 2.06357 4.48241 2.08896C4.20513 2.11435 3.94555 2.23621 3.74888 2.43331L2.47938 3.7017C2.28239 3.89867 2.16062 4.15842 2.13523 4.43582C2.10985 4.71323 2.18245 4.99077 2.34042 5.22022L5.59644 9.94806C5.7195 10.1262 5.88866 10.2676 6.08582 10.357C6.28299 10.4465 6.50076 10.4808 6.71587 10.4561L8.97919 10.1904L11.9362 13.1452C11.5128 13.599 11.2821 14.1994 11.2924 14.82C11.3028 15.4405 11.5535 16.0329 11.9918 16.4723L17.9846 22.4652C18.1086 22.5896 18.2558 22.6883 18.418 22.7556C18.5801 22.8229 18.754 22.8576 18.9296 22.8576C19.1051 22.8576 19.279 22.8229 19.4411 22.7556C19.6033 22.6883 19.7505 22.5896 19.8745 22.4652L22.518 19.8217C22.6423 19.6978 22.741 19.5505 22.8083 19.3884C22.8756 19.2262 22.9103 19.0524 22.9103 18.8768C22.9103 18.7012 22.8756 18.5274 22.8083 18.3653C22.741 18.2031 22.6423 18.0558 22.518 17.9319L16.5217 11.9457ZM6.85927 8.64743L4.08015 4.61437L4.6571 4.03631L8.69127 6.81543L8.49784 8.45622L6.85927 8.64743ZM18.9273 20.8967L13.2501 15.2184C13.1343 15.1025 13.0693 14.9453 13.0693 14.7815C13.0693 14.6177 13.1343 14.4605 13.2501 14.3446L14.3907 13.203C14.5069 13.0877 14.6639 13.023 14.8276 13.023C14.9912 13.023 15.1483 13.0877 15.2644 13.203L20.9427 18.8813L18.9273 20.8967Z" fill="#303030" />
    </svg>
    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22.9156 7.11885C22.9161 7.10957 22.9161 7.10027 22.9156 7.09099C22.9134 7.055 22.9088 7.0192 22.9016 6.98386C22.8939 6.94756 22.8838 6.91178 22.8716 6.87672C22.8698 6.86936 22.8673 6.86219 22.8641 6.85529C22.8377 6.78394 22.8017 6.71654 22.757 6.65494C22.7524 6.64755 22.7474 6.6404 22.742 6.63351C22.7184 6.60273 22.693 6.5734 22.6659 6.54566L18.4511 2.33188C18.4239 2.30489 18.3949 2.27983 18.3643 2.25688L18.3429 2.24081C18.2809 2.19615 18.2131 2.1601 18.1415 2.13367L18.1222 2.12617C18.0872 2.114 18.0514 2.10434 18.015 2.09724C17.9775 2.09081 17.94 2.08653 17.9079 2.08331H8.94249C8.5066 2.0836 8.08862 2.25681 7.78029 2.56494C7.47196 2.87306 7.29848 3.29093 7.29791 3.72683V10.032C5.77723 10.2492 4.39536 11.0347 3.4306 12.23C2.46585 13.4254 1.98988 14.942 2.09854 16.4743C2.2072 18.0065 2.89243 19.4407 4.01622 20.488C5.14002 21.5353 6.61889 22.1178 8.15502 22.1183H21.2731C21.7088 22.1178 22.1265 21.9444 22.4346 21.6363C22.7427 21.3282 22.9161 20.9105 22.9166 20.4748V7.15635C22.9166 7.14349 22.9166 7.13064 22.9156 7.11885ZM18.7029 5.00285L19.9885 6.28852H18.7029V5.00285ZM3.79553 16.0382C3.79538 15.2144 4.02858 14.4075 4.46811 13.7107C4.90764 13.014 5.53553 12.4561 6.27908 12.1015C7.02262 11.7469 7.8514 11.6102 8.66943 11.7071C9.48747 11.8041 10.2613 12.1308 10.9013 12.6494C11.5414 13.1681 12.0214 13.8574 12.2858 14.6375C12.5503 15.4177 12.5884 16.2568 12.3956 17.0577C12.2029 17.8586 11.7872 18.5885 11.1967 19.1629C10.6063 19.7373 9.86518 20.1328 9.05928 20.3034L9.02178 20.3109C8.97785 20.3205 8.93285 20.327 8.88785 20.3355L8.7925 20.3505L8.71322 20.3612L8.56322 20.3784H8.53429C8.47001 20.3837 8.40466 20.388 8.3393 20.3912C8.2793 20.3912 8.2193 20.3912 8.15824 20.3912C7.0031 20.3904 5.89538 19.9318 5.07768 19.1159C4.25997 18.3 3.79893 17.1933 3.79553 16.0382ZM12.3924 20.3977C13.3074 19.5082 13.9176 18.352 14.1355 17.0946H19.7368C19.9641 17.0946 20.1821 17.0043 20.3428 16.8435C20.5036 16.6828 20.5939 16.4648 20.5939 16.2375C20.5939 16.0101 20.5036 15.7921 20.3428 15.6314C20.1821 15.4706 19.9641 15.3803 19.7368 15.3803H14.1934C14.1934 15.3675 14.1934 15.3546 14.1934 15.3418C14.1859 15.2764 14.1784 15.2111 14.1687 15.1468C14.1634 15.1104 14.157 15.075 14.1505 15.0396C14.1409 14.9796 14.1302 14.9196 14.1184 14.8607C14.1109 14.8222 14.1034 14.7847 14.0948 14.7472C14.082 14.6904 14.0691 14.6336 14.0552 14.5768L14.0262 14.4632C14.0112 14.4075 13.9952 14.3561 13.9791 14.2982C13.9673 14.2607 13.9566 14.2232 13.9437 14.1857C13.9266 14.1311 13.9084 14.0786 13.8891 14.024L13.8505 13.9168C13.8302 13.8622 13.8088 13.8097 13.7863 13.7561C13.7723 13.7218 13.7584 13.6865 13.7434 13.649C13.7198 13.5933 13.6952 13.5418 13.6695 13.484C13.6545 13.4529 13.6405 13.4218 13.6266 13.3908C13.5955 13.3276 13.5623 13.2654 13.5302 13.2033C13.5184 13.1819 13.5088 13.1604 13.497 13.139C13.452 13.0565 13.4048 12.9761 13.3566 12.8958C13.3438 12.8733 13.3288 12.8519 13.3148 12.8304C13.2798 12.7726 13.2441 12.7158 13.2077 12.6601C13.1873 12.629 13.1648 12.599 13.1445 12.569C13.1123 12.5229 13.0802 12.4769 13.0459 12.4308C13.0116 12.3847 12.9966 12.3665 12.972 12.3344C12.9474 12.3022 12.9077 12.2508 12.8745 12.2101L12.7931 12.1137C12.7609 12.0751 12.7266 12.0355 12.6924 11.998C12.6901 11.9939 12.6872 11.9903 12.6838 11.9873H19.7453C19.9726 11.9873 20.1907 11.8969 20.3514 11.7362C20.5121 11.5755 20.6024 11.3575 20.6024 11.1301C20.6024 10.9028 20.5121 10.6848 20.3514 10.5241C20.1907 10.3633 19.9726 10.273 19.7453 10.273H10.2099C10.1741 10.2734 10.1383 10.2759 10.1028 10.2805L10.0257 10.2559L9.90567 10.2195C9.85282 10.203 9.80032 10.188 9.74818 10.1745L9.62711 10.1423L9.46426 10.1048L9.34534 10.0791L9.17177 10.048L9.0582 10.0298L9.02071 10.0234V3.79111H16.9886V7.14778C16.9886 7.3751 17.0789 7.59311 17.2397 7.75385C17.4004 7.91459 17.6184 8.00489 17.8457 8.00489H21.2024V20.3977H12.3924ZM7.29684 16.0382V13.3468C7.29684 13.1195 7.38714 12.9015 7.54788 12.7408C7.70862 12.58 7.92663 12.4897 8.15395 12.4897C8.38127 12.4897 8.59928 12.58 8.76002 12.7408C8.92076 12.9015 9.01106 13.1195 9.01106 13.3468V15.1811H9.82639C10.0537 15.1811 10.2717 15.2714 10.4325 15.4321C10.5932 15.5928 10.6835 15.8109 10.6835 16.0382C10.6835 16.2655 10.5932 16.4835 10.4325 16.6442C10.2717 16.805 10.0537 16.8953 9.82639 16.8953H8.15609C7.92877 16.8953 7.71076 16.805 7.55002 16.6442C7.38928 16.4835 7.29898 16.2655 7.29898 16.0382H7.29684ZM16.4862 6.87993C16.4862 7.10725 16.3959 7.32526 16.2351 7.486C16.0744 7.64674 15.8564 7.73704 15.629 7.73704H10.2035C9.9762 7.73704 9.75819 7.64674 9.59745 7.486C9.43671 7.32526 9.34641 7.10725 9.34641 6.87993C9.34641 6.65261 9.43671 6.4346 9.59745 6.27386C9.75819 6.11312 9.9762 6.02282 10.2035 6.02282H15.6312C15.7437 6.02282 15.8552 6.04499 15.9592 6.08806C16.0632 6.13113 16.1577 6.19427 16.2373 6.27386C16.3168 6.35345 16.38 6.44794 16.4231 6.55193C16.4661 6.65592 16.4883 6.76737 16.4883 6.87993H16.4862Z" fill="#303030" />
    </svg>
    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <rect width="25" height="25" fill="url(#pattern0)" />
        <defs>
            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_467_1080" transform="scale(0.0078125)" />
            </pattern>
            <image id="image0_467_1080" width="128" height="128" xlink:href="data:image/png;base64,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" />
        </defs>
    </svg>
    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M21.1427 13.4525C21.217 12.8199 21.217 12.1808 21.1427 11.5483L22.5362 9.644C22.6241 9.52319 22.6803 9.38234 22.6999 9.23424C22.7195 9.08615 22.7017 8.93552 22.6482 8.79604C22.2511 7.75546 21.6907 6.78481 20.9881 5.9206C20.8937 5.80469 20.7718 5.71425 20.6335 5.65751C20.4951 5.60077 20.3448 5.57954 20.1962 5.59576L17.854 5.85115C17.3415 5.47085 16.7867 5.15134 16.2006 4.89902L15.2485 2.74049C15.1886 2.60438 15.0959 2.4853 14.9785 2.39398C14.8612 2.30266 14.723 2.24197 14.5764 2.21737C13.4765 2.03871 12.355 2.03871 11.2551 2.21737C11.1085 2.24197 10.9703 2.30266 10.853 2.39398C10.7356 2.4853 10.6429 2.60438 10.583 2.74049L9.63202 4.89902C9.3369 5.02623 9.04929 5.17022 8.77062 5.33028C8.49469 5.48918 8.22837 5.66423 7.97307 5.85451L5.63418 5.59464C5.48556 5.57842 5.33524 5.59965 5.19692 5.65639C5.05859 5.71313 4.93666 5.80357 4.84223 5.91948C4.13889 6.78319 3.57912 7.75446 3.18441 8.79604C3.13092 8.93552 3.11316 9.08615 3.13272 9.23424C3.15228 9.38234 3.20856 9.52319 3.29642 9.644L4.68989 11.5483C4.61605 12.1809 4.61605 12.8199 4.68989 13.4525L3.29642 15.3568C3.20856 15.4776 3.15228 15.6184 3.13272 15.7665C3.11316 15.9146 3.13092 16.0653 3.18441 16.2047C3.58135 17.2457 4.14174 18.2168 4.84448 19.0813C4.93902 19.197 5.06101 19.2872 5.19932 19.3438C5.33764 19.4003 5.4879 19.4214 5.63643 19.405L7.98203 19.1507C8.49325 19.5307 9.04697 19.8499 9.63202 20.1018L10.5841 22.2603C10.644 22.3964 10.7367 22.5155 10.8541 22.6068C10.9714 22.6981 11.1096 22.7588 11.2562 22.7834C12.3558 22.9611 13.4768 22.9611 14.5764 22.7834C14.724 22.7597 14.8634 22.6994 14.9817 22.608C15.1001 22.5166 15.1937 22.3971 15.2541 22.2603L16.2062 20.0995C16.7902 19.8457 17.3434 19.5263 17.8551 19.1474L20.2074 19.4039C20.3558 19.4199 20.5059 19.3986 20.644 19.3419C20.7822 19.2851 20.9039 19.1948 20.9982 19.0791C21.7029 18.2156 22.2631 17.2438 22.6572 16.2014C22.7105 16.0621 22.7281 15.9116 22.7086 15.7638C22.689 15.6159 22.6328 15.4752 22.5452 15.3545L21.1427 13.4525ZM19.3225 11.4519C19.4362 12.144 19.4362 12.85 19.3225 13.5421C19.3035 13.6593 19.308 13.779 19.3357 13.8944C19.3634 14.0097 19.4137 14.1185 19.4838 14.2142L20.7955 16.0065C20.5522 16.5565 20.2519 17.0795 19.8994 17.5668L17.687 17.3271C17.5674 17.3133 17.4463 17.3238 17.3308 17.3579C17.2153 17.3919 17.1079 17.4489 17.015 17.5254C16.4734 17.9675 15.864 18.3193 15.2104 18.5672C15.0989 18.6092 14.9968 18.673 14.9103 18.755C14.8237 18.8369 14.7544 18.9353 14.7063 19.0443L13.8102 21.0785C13.2118 21.1413 12.6085 21.1413 12.0101 21.0785L11.114 19.0466C11.0658 18.9377 10.9964 18.8396 10.9099 18.7578C10.8233 18.6761 10.7213 18.6124 10.6099 18.5705C9.95496 18.3234 9.34469 17.9712 8.8031 17.5276C8.70857 17.4509 8.59955 17.394 8.48253 17.3603C8.36552 17.3266 8.24292 17.3169 8.12205 17.3316L5.93102 17.5702C5.75471 17.3263 5.59096 17.0736 5.4404 16.813C5.29002 16.5529 5.15317 16.2852 5.03042 16.011L6.341 14.2187C6.41104 14.1229 6.46137 14.0142 6.48906 13.8988C6.51675 13.7835 6.52125 13.6637 6.5023 13.5466C6.3886 12.8553 6.3886 12.15 6.5023 11.4586C6.52125 11.3415 6.51675 11.2218 6.48906 11.1064C6.46137 10.9911 6.41104 10.8823 6.341 10.7866L5.0293 8.99431C5.27248 8.44456 5.57284 7.92192 5.92543 7.43505L8.13213 7.67476C8.25065 7.68764 8.37054 7.67673 8.4848 7.64269C8.59905 7.60864 8.70536 7.55214 8.7975 7.4765C9.06796 7.25544 9.35605 7.05688 9.6589 6.88282C9.96145 6.70824 10.2776 6.5584 10.6043 6.43475C10.716 6.39286 10.8183 6.32907 10.905 6.24712C10.9918 6.16518 11.0613 6.06674 11.1095 5.95757L12.0056 3.92561C12.604 3.86232 13.2074 3.86232 13.8057 3.92561L14.7018 5.95757C14.75 6.06674 14.8195 6.16518 14.9063 6.24712C14.993 6.32907 15.0953 6.39286 15.207 6.43475C15.8629 6.68128 16.474 7.03356 17.0161 7.47762C17.1082 7.55292 17.2143 7.60914 17.3284 7.64299C17.4424 7.67684 17.5621 7.68764 17.6803 7.67476L19.8848 7.43505C20.0607 7.67819 20.2241 7.93019 20.3743 8.19004C20.5249 8.4504 20.6617 8.71849 20.7843 8.99319L19.4748 10.7854C19.338 10.9787 19.2832 11.2184 19.3225 11.4519ZM16.4997 9.56895C15.7864 8.69361 14.7769 8.11016 13.6623 7.92904C13.1685 7.8495 12.6652 7.8495 12.1714 7.92904C11.4943 8.04013 10.8504 8.3002 10.286 8.69045C9.72165 9.08071 9.25101 9.59142 8.90805 10.1857C8.5651 10.78 8.35838 11.443 8.30285 12.1269C8.24731 12.8108 8.34434 13.4985 8.58691 14.1403C8.58996 14.1503 8.59371 14.16 8.59811 14.1694C8.93507 15.0408 9.52771 15.7899 10.2982 16.3182C11.0687 16.8466 11.9809 17.1296 12.9152 17.13C13.164 17.1304 13.4124 17.1102 13.6579 17.0695C14.4614 16.94 15.2165 16.6009 15.8471 16.0864C16.4778 15.5719 16.9616 14.9002 17.2498 14.1391C17.538 13.3779 17.6204 12.5542 17.4887 11.7511C17.357 10.9479 17.0159 10.1937 16.4997 9.56447V9.56895ZM15.5711 13.5074C15.4631 13.7948 15.3083 14.0624 15.1129 14.2994C14.8468 14.6252 14.5116 14.8879 14.1315 15.0682C13.7514 15.2486 13.3359 15.3421 12.9152 15.3421C12.4945 15.3421 12.079 15.2486 11.6989 15.0682C11.3188 14.8879 10.9835 14.6252 10.7174 14.2994C10.5239 14.0645 10.3699 13.7997 10.2615 13.5153C10.2583 13.5061 10.2546 13.4971 10.2503 13.4884C10.0142 12.8429 10.0177 12.1341 10.2604 11.4911C10.3686 11.2047 10.523 10.9379 10.7174 10.7014C10.9834 10.3752 11.3187 10.1122 11.6989 9.9316C12.0791 9.751 12.4948 9.6573 12.9157 9.6573C13.3367 9.6573 13.7524 9.751 14.1326 9.9316C14.5128 10.1122 14.8481 10.3752 15.1141 10.7014C15.4289 11.0872 15.6369 11.549 15.7171 12.0405C15.7973 12.532 15.7469 13.0359 15.5711 13.5018V13.5074Z" fill="#303030" />
    </svg>
</div>

<script>
    // const sidebar = document.getElementById('sidebar');
    // const sidebarToggle = document.getElementById('sidebarToggle');

    // const openSidebar = () => {
    //     sidebar.classList.toggle('w-[55px]');
    //     sidebar.classList.toggle('w-[200px]');



    //     if (sidebar.classList.contains('w-[200px]')) {
    //         sidebar.classList.remove('items-center');
    //         sidebar.classList.add('items-start');
    //         sidebar.classList.add('pl-3');


    //     } else if (sidebar.classList.contains('w-[55px]')) {
    //         sidebar.classList.add('items-center');
    //         sidebar.classList.remove('items-start');
    //         sidebar.classList.remove('pl-3');

    //     }
    // }
    // openSidebar();
</script>