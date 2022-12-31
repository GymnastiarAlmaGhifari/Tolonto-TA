<?php
$Sadmin = new ControllerSuperAdmin();

$lok = $Sadmin->lokasi();
$notifrent = $Sadmin->listnotif_rental('Babat');

$user_data = $user->get_data(Session::get('username'));

if (Location::in(1, "dashboard") && $user->is_superAdmin(Session::get('username'))) {
    $text = "Dashboard Super Admin";
} elseif (Location::in(1, 'inventory')) {
    $text = "Inventory Super Admin";
} elseif (Location::in(1, 'booking')) {
    $text = "Booking Super Admin";
} elseif (Location::in(1, 'servis')) {
    $text = "Servis Super Admin";
} elseif (Location::in(1, 'riwayat')) {
    $text = "Riwayat Super Admin";
} elseif (Location::in(1, 'user')) {
    $text = "User Super Admin";
} elseif (Location::in(1, 'profile')) {
    $text = "Profile Super Admin";
}



// save to seasson
$lokasi = "<script>document.write(localStorage.getItem('lokasi'));</script>";
?>


<div class="container">
    <div class=" w-screen h-[60px] fixed z-20 bg-primary_500 flex items-center  justify-between pr-20 ml-12">

        <h1 id="tempat" class="font-noto-sans xs:text-base md:text-lg text-sm text-neutral_900 cursor-default sm:ml-[48px] ml-10 font-semibold">
            <?php echo $text; ?>
        </h1>
        <div class="flex items-center xs:gap-x-5">
            <div id="lokasi-drop" class="dropdown dropdown-bottom">
                <label tabindex="0" id="lok" class="btn btn-ghost capitalize font-semibold font-noto-sans gap-2 -mr-4 text-neutral_900">
                    <svg class="hidden xs:block " width="18" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 11.875C7.9212 11.875 7.12634 11.5458 6.54029 10.9597C5.95424 10.3737 5.625 9.5788 5.625 8.75C5.625 7.9212 5.95424 7.12634 6.54029 6.54029C7.12634 5.95424 7.9212 5.625 8.75 5.625C9.5788 5.625 10.3737 5.95424 10.9597 6.54029C11.5458 7.12634 11.875 7.9212 11.875 8.75C11.875 9.16038 11.7942 9.56674 11.6371 9.94589C11.4801 10.325 11.2499 10.6695 10.9597 10.9597C10.6695 11.2499 10.325 11.4801 9.94589 11.6371C9.56674 11.7942 9.16038 11.875 8.75 11.875ZM8.75 0C6.42936 0 4.20376 0.921872 2.56282 2.56282C0.921872 4.20376 0 6.42936 0 8.75C0 15.3125 8.75 25 8.75 25C8.75 25 17.5 15.3125 17.5 8.75C17.5 6.42936 16.5781 4.20376 14.9372 2.56282C13.2962 0.921872 11.0706 0 8.75 0Z" fill="#303030" />
                    </svg>
                    <h1 id="lokasi" name="lokasi" class="hidden sm:block"></h1>
                    <div class="hidden sm:block">
                        <i class="fa-solid fa-caret-down "></i>
                    </div>
                </label>
                <ul tabindex="0" class="dropdown-content p-2  cursor-pointer space-y-2 shadow-elevation-light-4 bg-neutral_600 rounded-lg w-52 text-neutral_050 -left-12 sm:left-0">
                    <?php
                    $row = 0;
                    while ($row < count($lok)) { ?>
                        <li id="list-lok" name="list_lok" class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                            <input class="hidden" name="lok"><?php echo $lok[$row]['id_loc'] ?></input>
                        </li>
                    <?php $row++;
                    } ?> 
                </ul>
            </div>
            <div id="lokasi-user" class="hidden">
                <svg width="18" class="hidden xs:block" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 11.875C7.9212 11.875 7.12634 11.5458 6.54029 10.9597C5.95424 10.3737 5.625 9.5788 5.625 8.75C5.625 7.9212 5.95424 7.12634 6.54029 6.54029C7.12634 5.95424 7.9212 5.625 8.75 5.625C9.5788 5.625 10.3737 5.95424 10.9597 6.54029C11.5458 7.12634 11.875 7.9212 11.875 8.75C11.875 9.16038 11.7942 9.56674 11.6371 9.94589C11.4801 10.325 11.2499 10.6695 10.9597 10.9597C10.6695 11.2499 10.325 11.4801 9.94589 11.6371C9.56674 11.7942 9.16038 11.875 8.75 11.875ZM8.75 0C6.42936 0 4.20376 0.921872 2.56282 2.56282C0.921872 4.20376 0 6.42936 0 8.75C0 15.3125 8.75 25 8.75 25C8.75 25 17.5 15.3125 17.5 8.75C17.5 6.42936 16.5781 4.20376 14.9372 2.56282C13.2962 0.921872 11.0706 0 8.75 0Z" fill="#303030" />
                </svg>
                <h1 id="lokas" name="lokas" class="hidden xs:block" value="<?php echo $user_data['lok']; ?>">
                    <?php echo $user_data['lok']; ?>
                </h1>
            </div>
            <!-- dropdown end -->
            <div class="text-neutral_900 font-noto-sans font-semibold hidden md:block">
                <span id="hours">00</span>
                <span>:</span>
                <span id="minutes">00</span>
                <span>:</span>
                <span id="seconds">00</span>
            </div>
            <div id="notif-drop" class="dropdown dropdown-bottom">
                <label tabindex="0" id="lok" class="btn btn-ghost capitalize font-semibold font-noto-sans gap-2 -mr-3  md:-ml-3 -ml-4 text-neutral_900">
                    <div class="relative w-full">
                        <!-- abang abang tukang bakso -->
                        <div id="abang_abang" class="hidden w-[24px] h-[24px] rounded-full bg-error_500 absolute left-[12px] bottom-3 flex items-center justify-center">
                            <span id="notif_number" class="text-neutral_050 mx-auto"></span>
                        </div>
                        <!-- abang abang tukang bakso -->
                        <svg width="23" height="27" viewBox="0 0 23 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.5 21.25V22.5H0V21.25L2.5 18.75V11.25C2.5 7.375 5.0375 3.9625 8.75 2.8625C8.75 2.7375 8.75 2.625 8.75 2.5C8.75 1.83696 9.01339 1.20107 9.48223 0.732233C9.95107 0.263392 10.587 0 11.25 0C11.913 0 12.5489 0.263392 13.0178 0.732233C13.4866 1.20107 13.75 1.83696 13.75 2.5C13.75 2.625 13.75 2.7375 13.75 2.8625C17.4625 3.9625 20 7.375 20 11.25V18.75L22.5 21.25ZM13.75 23.75C13.75 24.413 13.4866 25.0489 13.0178 25.5178C12.5489 25.9866 11.913 26.25 11.25 26.25C10.587 26.25 9.95107 25.9866 9.48223 25.5178C9.01339 25.0489 8.75 24.413 8.75 23.75" fill="#303030" />
                        </svg>
                    </div>
                </label>
                <ul tabindex="0" class="dropdown-content p-2 max-h-96 overflow-y-auto cursor-pointer space-y-2 shadow-elevation-light-4 bg-neutral_600 rounded-lg w-80 sm:w-96 z-50 text-neutral_050 -right-1 -mr-16 sm:-mr-20 overflow-x-hidden cursor-default">
                    <div class="relative w-full pb-2 cursor-default">
                        <div class="flex flex-row gap-3 items-center relative w-full ml-4 mt-2">
                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.1429 16.1905V17.1429H0V16.1905L1.90476 14.2857V8.57143C1.90476 5.61905 3.83809 3.01905 6.66667 2.18095C6.66667 2.08571 6.66667 2 6.66667 1.90476C6.66667 1.39959 6.86735 0.915104 7.22456 0.557892C7.58177 0.20068 8.06625 0 8.57143 0C9.0766 0 9.56109 0.20068 9.9183 0.557892C10.2755 0.915104 10.4762 1.39959 10.4762 1.90476C10.4762 2 10.4762 2.08571 10.4762 2.18095C13.3048 3.01905 15.2381 5.61905 15.2381 8.57143V14.2857L17.1429 16.1905ZM10.4762 18.0952C10.4762 18.6004 10.2755 19.0849 9.9183 19.4421C9.56109 19.7993 9.0766 20 8.57143 20C8.06625 20 7.58177 19.7993 7.22456 19.4421C6.86735 19.0849 6.66667 18.6004 6.66667 18.0952" fill="#FAFAFA" />
                            </svg>
                            <h1 class="font-noto-sans text-neutral_050 font-bold">Notifikasi</h1>
                        </div>
                        <span class="bg-primary_500 w-full h-[4px]  mt-2 px-2 rounded-full absolute"></span>
                    </div>
                    <li id="list-notif" name="list_notif"></li>
                </ul>
            </div>
            <span class=" bg-neutral_600 h-[40px] w-0.5 hidden md:block"></span>
            <div class="flex items-center justify-start">
                <div class="dropdown dropdown-bottom">
                    <label tabindex="0" class="btn btn-ghost h-full capitalize font-semibold font-noto-san gap-2 -mr-7  md:-ml-3 -ml-4 text-neutral_900 ">
                        <h1 class="hidden md:block"> <?php echo $user_data['username'];
                                                        ?></h1>
                        <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                            <img src="<?php echo $user_data['img']; ?>" alt="Gambar Profile" class="rounded-full w-full h-full object-cover">
                        </div>
                    </label>
                    <ul tabindex="0" class="dropdown-content p-2  cursor-pointer space-y-2 shadow-elevation-light-4 bg-neutral_600 rounded-lg w-32 text-neutral_050 -right-5 mt-1">
                        <li id="profile" class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-12 pt-3 font-noto-sans text-base">
                            <i class="fa-regular fa-user mr-1"></i>
                            <a>Profile </a>
                        </li>
                        <li onclick="openModalLogout(true)" class=" active:bg-error_500  pl-2 hover:bg-error_300 rounded-sm h-12 pt-3 font-noto-sans text-base ">
                            <button type="button" id="logout" name="logout">
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
    const lokas = document.getElementById('lokas');
    const lokasi_drop = document.getElementById('lokasi-drop');
    // const logout = document.getElementById('logout');
    const profile = document.getElementById('profile');
    const notif_drop = document.getElementById('notif-drop');
    const nama_notif = document.getElementById('nama_notif');
    const detail_notif = document.getElementById('detail_notif');
    const list_notif = document.getElementById('list-notif');
    const abang_abang = document.getElementById('abang_abang');


    notif_drop.addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        // path getuser.php in main dir
        var url = "..\\..\\..\\isinotif.php";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var json = JSON.parse(xhr.responseText);
                //   console.log(json.status + ", " + json.username + ", " + json.level + ", " + json.lokasi + ", " + json.img + ", " + json.id_admin);
                console.log('clicked');
                console.log(json[0]);
                if (json == 0) {
                    list_notif.innerHTML = ` <li class=" active:bg-primary_500 active:text-neutral_900 pl-2 hover:bg-neutral_500 rounded-sm h-20 pt-3 font-noto-sans text-base pb-1">
                        <div class="flex flex-col gap-2 justify-center border-b-2">
                        
                        <h1 id="nama_notif" >Tidak ada Notifikasi</h1>
                            </div>
                        </li>`;
                } else {
                    var row = 0;
                    list_notif.innerHTML = "";
                    while (row < json.length) {
                        // hapus list_notif
                        if (json[row].status == "incoming") {
                            const date = new Date(json[row].waktu_order); // dateFromDb is a string in ISO format, e.g. "2022-12-30T00:00:00.000Z"

                            const options = {
                                hour: '2-digit',
                                minute: '2-digit',
                                second: '2-digit',
                                hourCycle: 'h24',
                            };

                            const formattedDate = new Intl.DateTimeFormat('en-US', options).format(date);
                            // formattedDate will be a string in the format "H:i:s d/m/y", e.g. "00:00:00 30/12/2022"
                            // buat list_notif baru
                            list_notif.innerHTML += ` <li onclick="redirect_to()" class="bg-neutral_050 active:bg-primary_500 active:text-neutral_900  hover:bg-neutral_200 rounded-sm  py-2 font-noto-sans text-base  mt-3 cursor-pointer">
                        <div class="flex flex-col w-full font-noto-sans relative">

                            <div class="flex flex-row justify-between px-3">
                                            <div class="flex flex-row items-center gap-x-2">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#303030"/>
                                            </svg>
                                                <h1 class="text-neutral_900 font-bold">Rental Baru</h1>
                                            </div>
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900 ">${formattedDate}</h1>
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4375 15L9.375 12.75L10.245 11.865L11.4375 13.0575L14.13 10.365L15 11.4225M12.375 1.125L11.25 0L10.125 1.125L9 0L7.875 1.125L6.75 0L5.625 1.125L4.5 0L3.375 1.125L2.25 0L1.125 1.125L0 0V15L1.125 13.875L2.25 15L3.375 13.875L4.5 15L5.625 13.875L6.75 15L7.695 14.055C7.5675 13.635 7.5 13.1925 7.5 12.75C7.5 12.24 7.59 11.73 7.755 11.25H2.25V9.75H8.6475C9.5025 8.7975 10.7175 8.25 12 8.25C12.51 8.25 13.02 8.34 13.5 8.505V0L12.375 1.125ZM11.25 8.25H2.25V6.75H11.25V8.25ZM11.25 5.25H2.25V3.75H11.25V5.25Z" fill="#303030"/>
                                                </svg>
                                            </div>
                            </div>
                           
                            <span class="bg-neutral_600 mx-3 mt-1 h-0.5"></span>

                            <div class="flex flex-row justify-between px-3">
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900">ID ${json[row].id}</h1>
                                            </div>
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900">${json[row].playtime} jam</h1>
                                                <i class="fa-regular fa-clock text-neutral_900"></i>
                                            </div>
                            </div>
                             <div class="flex flex-row justify-between px-3">
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900">${json[row].nama_ps}</h1>
                                            </div>
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900">${json[row].username}</h1>
                                                <i class="fas fa-user text-neutral_900"></i>
                                            </div>
                             </div>
                        </div>
                        </li>`;
                        } else {
                            const date = new Date(json[row].waktu_order); // dateFromDb is a string in ISO format, e.g. "2022-12-30T00:00:00.000Z"

                            const options = {
                                hour: '2-digit',
                                minute: '2-digit',
                                second: '2-digit',
                                hourCycle: 'h24',
                            };

                            const formattedDate = new Intl.DateTimeFormat('en-US', options).format(date);
                            // formattedDate will be a string in the format "H:i:s d/m/y", e.g. "00:00:00 30/12/2022"
                            // buat list_notif baru
                            list_notif.innerHTML += ` <li onclick="redirect_to()" class="bg-neutral_050 active:bg-primary_500 active:text-neutral_900  hover:bg-neutral_200 rounded-sm  py-2 font-noto-sans text-base  mt-3 cursor-pointer">
                        <div class="flex flex-col w-full font-noto-sans relative">

                            <div class="flex flex-row justify-between px-3">
                                            <div class="flex flex-row items-center gap-x-2">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#303030"/>
                                            </svg>
                                                <h1 class="text-neutral_900 font-bold">Sewa Baru</h1>
                                            </div>
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900 ">${formattedDate}</h1>
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4375 15L9.375 12.75L10.245 11.865L11.4375 13.0575L14.13 10.365L15 11.4225M12.375 1.125L11.25 0L10.125 1.125L9 0L7.875 1.125L6.75 0L5.625 1.125L4.5 0L3.375 1.125L2.25 0L1.125 1.125L0 0V15L1.125 13.875L2.25 15L3.375 13.875L4.5 15L5.625 13.875L6.75 15L7.695 14.055C7.5675 13.635 7.5 13.1925 7.5 12.75C7.5 12.24 7.59 11.73 7.755 11.25H2.25V9.75H8.6475C9.5025 8.7975 10.7175 8.25 12 8.25C12.51 8.25 13.02 8.34 13.5 8.505V0L12.375 1.125ZM11.25 8.25H2.25V6.75H11.25V8.25ZM11.25 5.25H2.25V3.75H11.25V5.25Z" fill="#303030"/>
                                                </svg>
                                            </div>
                            </div>
                           
                            <span class="bg-neutral_600 mx-3 mt-1 h-0.5"></span>

                            <div class="flex flex-row justify-between px-3">
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900">ID ${json[row].id}</h1>
                                            </div>
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900">${json[row].playtime} jam</h1>
                                                <i class="fa-regular fa-clock text-neutral_900"></i>
                                            </div>
                            </div>
                             <div class="flex flex-row justify-between px-3">
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900">${json[row].nama_ps}</h1>
                                            </div>
                                            <div class="flex flex-row items-center gap-x-2">
                                                <h1 class="text-neutral_900">${json[row].username}</h1>
                                                <i class="fas fa-user text-neutral_900"></i>
                                            </div>
                             </div>
                        </div>
                        </li>`;
                        }
                        row++;
                    }
                }
            };
            //  var data = JSON.stringify({
            //      "id": id
            //  });
        };
        xhr.send();
    });


    profile.addEventListener('click', function() {
        window.location.href = 'profile.php';
    });

    function loadDoc() {


        setInterval(function() {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 0) {
                        abang_abang.classList.add('hidden');
                    } else {
                        abang_abang.classList.remove('hidden');
                        document.getElementById("notif_number").innerHTML = this.responseText;
                    }
                }
            };
            xhttp.open("GET", "notifikasi.php", true);
            xhttp.send();

        }, 2000);


    }
    loadDoc();

    const redirect_to = () => {
        window.location.href = 'booking.php';
    }

    // trim lokas menjadi htmlnya saja
    var res = lokas.innerHTML.trim();


    // query selector all for list_lok if clicked then set lokasi with text list_lok
    list_lok.forEach((list) => {
        //set default lokasi row 1
        lokasi.innerHTML = list_lok[1].innerHTML;
        if (localStorage.getItem('lokasi') == null) {
            localStorage.setItem('lokasi', list_lok[1].innerHTML);
        } else {
            lokasi.innerHTML = localStorage.getItem('lokasi');
        }
        list.addEventListener('click', () => {
            lokasi.innerHTML = list.innerHTML;
            //set local 
            // if local storage is empty then set lokasi with text list_lok if not then set lokasi with list.innerHTML
            if (localStorage.getItem('lokasi') == null) {
                localStorage.setItem('lokasi', list_lok[1].innerHTML);
            } else {
                localstore = list.innerHTML;
                var resloc = localstore.replace('<input class="hidden" name="lok">', " ");

                function trim(resloc) {
                    return resloc.replace(/^\s+|\s+$/g, '');
                }
                localStorage.setItem('lokasi', trim(resloc));
            }
            lok = list.innerHTML;
            var res = lok.replace('<input class="hidden" name="lok">', " ");

            function trim(res) {
                return res.replace(/^\s+|\s+$/g, '');
            }
            var xhr = new XMLHttpRequest();
            var url = "getlok.php";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    console.log(json.email + ", " + json.password);
                }
            };
            var data = JSON.stringify({
                "loksend": trim(res)
            });
            xhr.send(data);
            //wait 1s befor reload page
            setTimeout(function() {
                location.reload();
            }, 10);

        });
    });

    // if window location in pages/lokasi
    <?php if (Location::in(1, 'dashboard') && !$user->is_superAdmin(Session::get('username'))) { ?>
        tempat.innerHTML = 'Dashboard';
        lokasi_drop.classList.add('hidden');
        lokasiUser.classList.remove('hidden');
        lokasiUser.classList.add('flex');
        lokasiUser.classList.add('items-center');
        lokasiUser.classList.add('justify-center');
        lokasiUser.classList.add('gap-2');
        lokasiUser.classList.add('font-semibold');
        lokasiUser.classList.add('text-neutral_900');
        lokasiUser.classList.add('font-noto-sans');
    <?php } ?>
    <?php if (Location::in(1, 'booking') && !$user->is_superAdmin(Session::get('username'))) { ?>
        // set tempat with text dashboard
        tempat.innerHTML = 'Booking';
        lokasi_drop.classList.add('hidden');
        lokasiUser.classList.remove('hidden');
        lokasiUser.classList.add('flex');
        lokasiUser.classList.add('items-center');
        lokasiUser.classList.add('justify-center');
        lokasiUser.classList.add('gap-2');
        lokasiUser.classList.add('font-semibold');
        lokasiUser.classList.add('text-neutral_900');
        lokasiUser.classList.add('font-noto-sans');
    <?php } ?>
    <?php if (Location::in(1, 'inventory')  && !$user->is_superAdmin(Session::get('username'))) { ?>
        // set tempat with text dashboard
        tempat.innerHTML = 'Inventory';
        lokasi_drop.classList.add('hidden');
        lokasiUser.classList.remove('hidden');
        lokasiUser.classList.add('flex');
        lokasiUser.classList.add('items-center');
        lokasiUser.classList.add('justify-center');
        lokasiUser.classList.add('gap-2');
        lokasiUser.classList.add('font-semibold');
        lokasiUser.classList.add('text-neutral_900');
        lokasiUser.classList.add('font-noto-sans');
    <?php } ?>
    <?php if (Location::in(1, 'user') && !$user->is_superAdmin(Session::get('username'))) { ?>
        // set tempat with text dashboard
        tempat.innerHTML = 'User';
        lokasi_drop.classList.add('hidden');
        lokasiUser.classList.remove('hidden');
        lokasiUser.classList.add('flex');
        lokasiUser.classList.add('items-center');
        lokasiUser.classList.add('justify-center');
        lokasiUser.classList.add('gap-2');
        lokasiUser.classList.add('font-semibold');
        lokasiUser.classList.add('text-neutral_900');
        lokasiUser.classList.add('font-noto-sans');
    <?php } ?>
    <?php if (Location::in(1, 'riwayat') && !$user->is_superAdmin(Session::get('username'))) { ?>
        // set tempat with text dashboard
        tempat.innerHTML = 'History';
        lokasi_drop.classList.add('hidden');
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