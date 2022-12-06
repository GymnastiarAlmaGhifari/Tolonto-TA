<?php
$Sadmin = new ControllerSuperAdmin();
$lok = $Sadmin->lokasi();

$user_data = $user->get_data(Session::get('username'));

$text = "";

if (Location::in(1, "dashboardSuperAdmin")) {
    $text = "Dashboard Super Admin";
} elseif (Location::in(1, 'inventorySuperAdmin')) {
    $text = "Inventory Super Admin";
} elseif (Location::in(1, 'bookingSuperAdmin')) {
    $text = "Booking Super Admin";
}

?>
<div class="container">
    <div class=" w-screen h-[60px] fixed z-40 bg-primary_500 flex items-center  justify-between pr-20 ml-12">

        <h1 id="tempat" class="font-noto-sans text-lg text-neutral_900 ml-[20px] xs:ml-[48px]  font-semibold">
            <?php echo $text; ?>
        </h1>
        <div class="flex items-center xs:gap-x-5">
            <!-- dropdown start -->

            <!-- select start -->

            <!-- select end -->



            <div class="dropdown dropdown-bottom">
                <label tabindex="0" id="lok" class="btn btn-ghost capitalize font-semibold font-noto-sans gap-2 -mr-4 text-neutral_900">
                    <svg width="18" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 11.875C7.9212 11.875 7.12634 11.5458 6.54029 10.9597C5.95424 10.3737 5.625 9.5788 5.625 8.75C5.625 7.9212 5.95424 7.12634 6.54029 6.54029C7.12634 5.95424 7.9212 5.625 8.75 5.625C9.5788 5.625 10.3737 5.95424 10.9597 6.54029C11.5458 7.12634 11.875 7.9212 11.875 8.75C11.875 9.16038 11.7942 9.56674 11.6371 9.94589C11.4801 10.325 11.2499 10.6695 10.9597 10.9597C10.6695 11.2499 10.325 11.4801 9.94589 11.6371C9.56674 11.7942 9.16038 11.875 8.75 11.875ZM8.75 0C6.42936 0 4.20376 0.921872 2.56282 2.56282C0.921872 4.20376 0 6.42936 0 8.75C0 15.3125 8.75 25 8.75 25C8.75 25 17.5 15.3125 17.5 8.75C17.5 6.42936 16.5781 4.20376 14.9372 2.56282C13.2962 0.921872 11.0706 0 8.75 0Z" fill="#303030" />
                    </svg>
                    <h1 id="lokasi" name="lokasi">Bojonegoro</h1>
                    <i class="fa-solid fa-caret-down "></i>
                </label>
                <ul tabindex="0" class="dropdown-content p-2  cursor-pointer space-y-2 shadow-elevation-light-4 bg-neutral_600 rounded-lg w-52 text-neutral_050">
                    <?php
                    $row = 0;
                    while ($row < count($lok)) { ?>
                        <li id="list-lok" class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                            <a><?php echo $lok[$row]['nama_lok'] ?></a>
                        </li>
                        <!-- <li class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base"><a>Tuban</a></li>
                            <li class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base "><a>Bojonegoro</a></li> -->
                    <?php $row++;
                    } ?>
                </ul>
            </div>
            <div id="lokasi-user" class="hidden">
                <svg width="18" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 11.875C7.9212 11.875 7.12634 11.5458 6.54029 10.9597C5.95424 10.3737 5.625 9.5788 5.625 8.75C5.625 7.9212 5.95424 7.12634 6.54029 6.54029C7.12634 5.95424 7.9212 5.625 8.75 5.625C9.5788 5.625 10.3737 5.95424 10.9597 6.54029C11.5458 7.12634 11.875 7.9212 11.875 8.75C11.875 9.16038 11.7942 9.56674 11.6371 9.94589C11.4801 10.325 11.2499 10.6695 10.9597 10.9597C10.6695 11.2499 10.325 11.4801 9.94589 11.6371C9.56674 11.7942 9.16038 11.875 8.75 11.875ZM8.75 0C6.42936 0 4.20376 0.921872 2.56282 2.56282C0.921872 4.20376 0 6.42936 0 8.75C0 15.3125 8.75 25 8.75 25C8.75 25 17.5 15.3125 17.5 8.75C17.5 6.42936 16.5781 4.20376 14.9372 2.56282C13.2962 0.921872 11.0706 0 8.75 0Z" fill="#303030" />
                </svg>
                <?php echo $user_data['lok']; ?>
            </div>
            <!-- dropdown end -->
            <div class="text-neutral_900 font-noto-sans font-semibold xs:hidden xl:block md:block sm:hidden 2xl:block">
                <span id="hours">00</span>
                <span>:</span>
                <span id="minutes">00</span>
                <span>:</span>
                <span id="seconds">00</span>
            </div>
            <div class="cursor-pointer relative">
                <div class="rounded-full bg-error_500 absolute w-[24px] left-[12px] bottom-3 text-center">
                    <span class="text-neutral_050">99</span>
                </div>
                <svg width="23" height="27" viewBox="0 0 23 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.5 21.25V22.5H0V21.25L2.5 18.75V11.25C2.5 7.375 5.0375 3.9625 8.75 2.8625C8.75 2.7375 8.75 2.625 8.75 2.5C8.75 1.83696 9.01339 1.20107 9.48223 0.732233C9.95107 0.263392 10.587 0 11.25 0C11.913 0 12.5489 0.263392 13.0178 0.732233C13.4866 1.20107 13.75 1.83696 13.75 2.5C13.75 2.625 13.75 2.7375 13.75 2.8625C17.4625 3.9625 20 7.375 20 11.25V18.75L22.5 21.25ZM13.75 23.75C13.75 24.413 13.4866 25.0489 13.0178 25.5178C12.5489 25.9866 11.913 26.25 11.25 26.25C10.587 26.25 9.95107 25.9866 9.48223 25.5178C9.01339 25.0489 8.75 24.413 8.75 23.75" fill="#303030" />
                </svg>
            </div>
            <span class="bg-neutral_600 h-[40px] w-0.5"></span>
            <div class="flex items-center justify-start">
                <div class="dropdown dropdown-bottom">
                    <label tabindex="0" class="btn btn-ghost h-full capitalize font-semibold font-noto-san gap-2 -mr-5 -ml-4 text-neutral_900">
                        <?php echo $user_data['username'] ?>
                        <img src="https://melmagazine.com/wp-content/uploads/2021/01/66f-1.jpg" alt="" class="rounded-full w-[48px] h-[48px]">
                    </label>
                    <ul tabindex="0" class="dropdown-content p-2  cursor-pointer space-y-2 shadow-elevation-light-4 bg-neutral_600 rounded-lg w-32 text-neutral_050 -right-5 mt-1">
                        <li class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                            <i class="fa-regular fa-user mr-1"></i>
                            <a>Profile</a>
                        </li>

                        <li id="logout" class=" active:bg-error_500  pl-2 hover:bg-error_300 rounded-sm h-12 pt-3 font-noto-sans text-base ">

                            <button type="submit" name="logout">
                                <i class="fa-solid fa-arrow-right-from-bracket mr-1"></i>
                                <a>
                                    Logout
                                </a>
                            </button>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const lokasi = document.getElementById('lokasi');
    const list_lok = document.querySelectorAll('#list-lok');
    const lokasiUser = document.getElementById('lokasi-user');
    const tempat = document.getElementById('tempat');

    // query selector all for list_lok if clicked then set lokasi with text list_lok
    list_lok.forEach((list) => {
        list.addEventListener('click', () => {
            lokasi.innerHTML = list.innerHTML;
        });
    });




    // if window location in pages/lokasi

    <?php if (Location::in(1, 'dashboard')) { ?>
        // set tempat with text dashboard
        tempat.innerHTML = 'Dashboard';
        lokasi.classList.add('hidden');
        lokasiUser.classList.remove('hidden');
        lokasiUser.classList.add('flex');
        lokasiUser.classList.add('items-center');
        lokasiUser.classList.add('justify-center');
        lokasiUser.classList.add('gap-2');
        lokasiUser.classList.add('font-semibold');
        lokasiUser.classList.add('text-neutral_900');
        lokasiUser.classList.add('font-noto-sans');
    <?php } ?>
</script>
<script>
    const clock = () => {
        const today = new Date();
        const h = today.getHours();
        const m = today.getMinutes();
        const s = today.getSeconds();

        document.getElementById("hours").innerHTML = h;
        document.getElementById("minutes").innerHTML = m;
        document.getElementById("seconds").innerHTML = s;
    };
    setInterval(clock, 10);
</script>