<!-- table start -->
<section class="mt-12 mb-8 text-neutral_050  ml-16">
    <div class="container px-6 max-w-full ">
        <div id="atas3" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
            <div class="flex flex-wrap flex-col ">
                <div class=" flex flex-row justify-between items-center -mb-3">
                    <div class="flex gap-4">
                        <h1 class="capitalize font-semibold">Sewa Aktif</h1>
                        <h2>6</h2>
                    </div>
                    <span id="open3" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                        <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                        <span id="plus3" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                    </span>
                </div>
                <span id="garis3" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                <div class="w-full mx-auto  relative h-[360px] block overflow-y-auto mt-2" id="table3">
                    <table class="w-full table-auto">
                        <thead class="bg-neutral_800 sticky top-0">
                            <tr class="font-semibold ">
                                <th scope="col" class="text-left relative">
                                    <div class="flex flex-row gap-x-3 items-center">
                                        <i class="fa-solid fa-magnifying-glass "></i>
                                        <input type="text" id="search3" name="search3" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                    </div>
                                </th>
                                <th scope="col" class="text-left  ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900">
                                        <h1 class=" uppercase">nama ps</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left  ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">play time</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left  ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">waktu</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left ">
                                    <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                        <h1 class="uppercase">total</h1>
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </th>
                                <th scope="col" class="text-left  ">
                                    <button onclick="showItems()" id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 drop">
                                        <h1 class="capitalize font-normal">option</h1>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-hidden">
                            <!-- list 1 start -->
                            <tr class="">
                                <td class="flex flex-row gap-x-3 pb-5">
                                    <div class="form-control ">
                                        <h1 class="font-semibold font-noto-sans text-xl my-auto">1</h1>
                                    </div>
                                    <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                        <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" alt="" class="rounded-full w-full h-full object-cover">
                                    </div>
                                    <div class="flex flex-col gap-y-1 ml-2">
                                        <h1 class="font-semibold">john</h1>
                                        <h2 class="text-neutral_400 text-xs">rent-001</h2>
                                    </div>
                                </td>
                                <td class="text-center">PS No.1</td>
                                <td class="text-center">2 Jam</td>
                                <td class=" text-center">10.00 - 12.00</td>
                                <td class="text-center">Rp.8000</td>
                                <td class=" text-center">
                                    <div class="dropdown dropdown-hover dropdown-right dropdown-end">
                                        <label tabindex="0" class="btn m-1 hover:bg-neutral_600 bg-transparent">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </label>
                                        <ul tabindex="0" class="dropdown-content -mb-1  shadow-elevation-light-4 bg-neutral_050 rounded-lg w-12 text-neutral_050">
                                            <li class="cursor-pointer active:bg-primary_500 active:text-neutral_900 hover:bg-neutral_500 rounded-sm h-8 font-noto-sans text-base">
                                                <button>
                                                    <svg class="mx-auto my-1.5" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.06 6L12 6.94L2.92 16H2V15.08L11.06 6ZM14.66 0C14.41 0 14.15 0.1 13.96 0.29L12.13 2.12L15.88 5.87L17.71 4.04C18.1 3.65 18.1 3 17.71 2.63L15.37 0.29C15.17 0.09 14.92 0 14.66 0ZM11.06 3.19L0 14.25V18H3.75L14.81 6.94L11.06 3.19Z" fill="#303030" />
                                                    </svg>
                                                </button>
                                            </li>
                                            <li class="cursor-pointer active:bg-primary_500 active:text-neutral_900  hover:bg-neutral_500 rounded-sm h-8 font-noto-sans text-base">
                                                <button>
                                                    <svg class="mx-auto my-1.5" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- list 1 end -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- table end -->
<script>
    const open3 = document.getElementById('open3');
    const atas3 = document.getElementById('atas3');
    const table3 = document.getElementById('table3');
    const garis3 = document.getElementById('garis3');
    const plus3 = document.getElementById('plus3');

    const openTable3 = () => {
        open3.addEventListener("click", function() {
            if (atas3.classList.contains('h-[77px]')) {
                localStorage.setItem("open-table-riwayat-aktif", "true");
            } else {
                localStorage.setItem("open-table-riwayat-aktif", "false");
            }
            openTab();
        });

        function openTab() {
            if (localStorage.getItem("open-table-riwayat-aktif") == "false") {
                garis3.classList.add('hidden');
                plus3.classList.add('hidden');
                table3.classList.add('hidden');
                atas3.classList.remove('h-[450px]');
                atas3.classList.add('h-[77px]');
            } else {
                setTimeout(() => {
                    table3.classList.remove('hidden');
                    garis3.classList.remove('hidden');
                    plus3.classList.remove('hidden');
                    garis3.classList.add('ease-in-out');
                    table3.classList.add('ease-in-out');
                    atas3.classList.add('h-[450px]');
                    atas3.classList.remove('h-[77px]');
                }, 100);
            }
        }
        if (localStorage.getItem("open-table-riwayat-aktif") !== null) {
            openTab();
        }
        if (atas3.classList.contains("h-[450px]")) {
            open3.checked = true;
        }
    }
    openTable3();
</script>