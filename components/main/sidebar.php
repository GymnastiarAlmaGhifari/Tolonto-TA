<!-- sidebar -->
<?php

if (Location::in(1, 'dashboardSuperAdmin')) {
    $active = "bg-primary_600 rounded-2xl";
    if (isset($_POST['inventory'])) {
        Redirect::to('inventorySuperAdmin');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('bookingSuperAdmin');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servisSuperAdmin');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayatSuperAdmin');
    }
    if (isset($_POST['user'])) {
        Redirect::to('userSuperAdmin');
    }
}
if (Location::in(1, 'inventorySuperAdmin')) {
    $active2 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboardSuperAdmin');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('bookingSuperAdmin');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servisSuperAdmin');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayatSuperAdmin');
    }
    if (isset($_POST['user'])) {
        Redirect::to('userSuperAdmin');
    }
}
if (Location::in(1, 'bookingSuperAdmin')) {
    $active3 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboardSuperAdmin');
    }
    if (isset($_POST['inventory'])) {
        Redirect::to('inventorySuperAdmin');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servisSuperAdmin');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayatSuperAdmin');
    }
    if (isset($_POST['user'])) {
        Redirect::to('userSuperAdmin');
    }
}
if (Location::in(1, 'servisSuperAdmin')) {
    $active4 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboardSuperAdmin');
    }
    if (isset($_POST['inventory'])) {
        Redirect::to('inventorySuperAdmin');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('bookingSuperAdmin');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayatSuperAdmin');
    }
    if (isset($_POST['user'])) {
        Redirect::to('userSuperAdmin');
    }
}
if (Location::in(1, 'riwayatSuperAdmin')) {
    $active5 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboardSuperAdmin');
    }
    if (isset($_POST['inventory'])) {
        Redirect::to('inventorySuperAdmin');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('bookingSuperAdmin');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servisSuperAdmin');
    }
    if (isset($_POST['user'])) {
        Redirect::to('userSuperAdmin');
    }
}
if (Location::in(1, 'userSuperAdmin')) {
    $active6 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboardSuperAdmin');
    }
    if (isset($_POST['inventory'])) {
        Redirect::to('inventorySuperAdmin');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('bookingSuperAdmin');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servisSuperAdmin');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayatSuperAdmin');
    }
}
if (Location::in(1, 'dashboard')) {
    $active = "bg-primary_600 rounded-2xl";
    if (isset($_POST['inventory'])) {
        Redirect::to('inventory');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('booking');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servis');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayat');
    }
    if (isset($_POST['user'])) {
        Redirect::to('user');
    }
}
if (Location::in(1, 'inventory')) {
    $active2 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboard');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('booking');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servis');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayat');
    }
    if (isset($_POST['user'])) {
        Redirect::to('user');
    }
}
if (Location::in(1, 'booking')) {
    $active3 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboard');
    }
    if (isset($_POST['inventory'])) {
        Redirect::to('inventory');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servis');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayat');
    }
    if (isset($_POST['user'])) {
        Redirect::to('user');
    }
}
if (Location::in(1, 'servis')) {
    $active4 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboard');
    }
    if (isset($_POST['inventory'])) {
        Redirect::to('inventory');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('booking');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayat');
    }
    if (isset($_POST['user'])) {
        Redirect::to('user');
    }
}
if (Location::in(1, 'history')) {
    $active5 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboard');
    }
    if (isset($_POST['inventory'])) {
        Redirect::to('inventory');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('booking');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servis');
    }
    if (isset($_POST['user'])) {
        Redirect::to('user');
    }
}
if (Location::in(1, 'user')) {
    $active6 = "bg-primary_600 rounded-2xl";
    if (isset($_POST['dashboard'])) {
        Redirect::to('dashboard');
    }
    if (isset($_POST['inventory'])) {
        Redirect::to('inventory');
    }
    if (isset($_POST['booking'])) {
        Redirect::to('booking');
    }
    if (isset($_POST['servis'])) {
        Redirect::to('servis');
    }
    if (isset($_POST['history'])) {
        Redirect::to('riwayat');
    }
}
?>

<div class="container">
    <div class="flex flex-wrap ">
        <div id="backdrop" class="hidden z-20 w-screen h-screen bg-black/50 fixed transition duration-300 ease-in-out"></div>
        <div id="sidebar" class="w-[60px] bg-primary_500 z-30 h-screen fixed text-neutral_900 font-noto-sans duration-300">
            <div id="flexing" class="ml-1">
                <button type="button" id="sidebarToggle" class="flex items-center justify-center mx-auto">
                    <div id="putar" class="flex flex-col items-center w-full h-full rounded-full justify-center space-y-1.5 mt-5 mb-8">
                        <span id="span1" class="block w-7 h-1 bg-neutral_900 rounded-4xl"></span>
                        <span id="span2" class="block w-7 h-1 bg-neutral_900 rounded-4xl"></span>
                        <span id="span3" class="block w-7 h-1 bg-neutral_900 rounded-4xl"></span>
                    </div>
                </button>
                <img src="<?php echo $user_data['img']; ?>" id="gambar" width="80px" height="80px" alt="" class="hidden">
                <h1 id="text" class="font-semibold my-auto hidden text-base">Tolonto</h1>
            </div>
            <ul class="mt-16 flex flex-col gap-10">
                <li>
                    <button id="dashboard" name="dashboard" type="submit" class="w-full">
                        <div id="bungkus" class="flex flex-row justify-center items-center gap-8 h-full w-[50px] ml-[5px]  py-3 <?php echo $active ?>">
                            <svg id="svg" class="" width="30" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.1594 21.9591H3.84089C2.87203 21.9591 2.0835 21.2333 2.0835 20.3417V10.0841C2.08545 9.83661 2.14594 9.59314 2.26002 9.37355C2.3741 9.15396 2.53852 8.96449 2.73986 8.82062L11.3991 2.43621C11.7204 2.2067 12.1053 2.08331 12.5002 2.08331C12.895 2.08331 13.2799 2.2067 13.6012 2.43621L22.2605 8.82062C22.4618 8.96449 22.6262 9.15396 22.7403 9.37355C22.8544 9.59314 22.9149 9.83661 22.9168 10.0841V20.3417C22.9168 21.2333 22.1328 21.9591 21.1594 21.9591ZM3.87561 20.1669H21.1247V10.2095L12.5371 3.87438C12.5123 3.86656 12.4857 3.86656 12.461 3.87438L3.87561 10.2095V20.1669Z" fill="#303030" />
                            </svg>
                            <h1 id="text" class="font-medium my-auto hidden text-left">Dashboard</h1>
                        </div>
                    </button>
                </li>
                <li>
                    <button id="inventory" name="inventory" type="submit" class="w-full">
                        <div id="bungkus" class="flex flex-row justify-center items-center gap-8 h-full w-[50px] ml-[5px]  py-3 <?php echo $active2 ?>">
                            <svg id="svg" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.1063 13.0068C16.115 13.6002 15.7002 14.0473 15.1268 14.0629C14.5725 14.0786 14.1403 13.6569 14.1229 13.0826C14.1046 12.4682 14.5351 12.0055 15.1242 12.0055C15.6801 12.0055 16.0975 12.4316 16.1063 13.0068ZM10.0289 10.6905C9.72824 10.667 9.33958 10.8221 9.15048 10.626C8.94656 10.4143 9.09819 10.0204 9.08077 9.70665C9.05288 9.20732 8.75746 8.88228 8.31477 8.87705C7.88777 8.87182 7.58103 9.21255 7.5575 9.71014C7.54268 10.0125 7.6795 10.3803 7.49824 10.599C7.31698 10.8177 6.9292 10.653 6.63552 10.6905C6.59195 10.6957 6.54838 10.6966 6.50568 10.7027C5.99153 10.7803 5.73272 11.0434 5.73795 11.4818C5.74317 11.9201 6.04992 12.2077 6.56581 12.253C6.87778 12.2809 7.28213 12.1162 7.48256 12.3271C7.69867 12.5554 7.53223 12.9649 7.56098 13.2943C7.58713 13.6046 7.69519 13.8625 8.00106 13.9845C8.12739 14.0425 8.26713 14.0651 8.40529 14.0497C8.54345 14.0344 8.67483 13.9817 8.78535 13.8974C9.04678 13.6926 9.08425 13.3919 9.08251 13.0765C9.07641 12.2573 9.08251 12.2556 9.87987 12.2539C10.053 12.2546 10.2253 12.2302 10.3914 12.1815C10.7591 12.0709 10.8533 11.7789 10.9143 11.4844C10.9108 11.0129 10.5883 10.7341 10.0289 10.6905ZM17.2173 8.87705C16.6283 8.87182 16.2239 9.28924 16.223 9.90272C16.223 10.4988 16.6439 10.9389 17.213 10.9389C17.782 10.9389 18.1785 10.4927 18.1716 9.88007C18.1646 9.26745 17.8056 8.88315 17.2173 8.87705ZM22.1845 18.1674C20.4887 20.5203 17.057 20.3294 15.6 17.8101C15.5912 17.7985 15.5845 17.7856 15.5799 17.7718C15.3237 16.7949 14.6701 16.5866 13.7299 16.6711C12.7216 16.7583 11.6986 16.7243 10.6842 16.6781C10.1709 16.6546 9.89991 16.8184 9.7143 17.2881C9.4442 17.9833 8.98249 18.5876 8.38275 19.031C7.11132 19.9896 5.32227 20.0767 4.00205 19.2628C3.32476 18.8324 2.78723 18.2143 2.45489 17.4839C2.12255 16.7534 2.00974 15.9421 2.13021 15.1488C2.45206 13.1915 2.7559 11.2314 3.04173 9.26832C3.23432 7.9542 3.86524 6.99214 5.08524 6.39956C6.38716 5.7669 7.76839 5.50721 9.18882 5.37476C10.2999 5.27106 11.4145 5.23446 12.6214 5.20831C14.6004 5.285 16.677 5.28848 18.6866 5.89674C19.3542 6.09267 19.987 6.39201 20.5619 6.78386C21.3706 7.3442 21.8142 8.13981 21.9649 9.09491C22.249 10.8822 22.4878 12.6765 22.7928 14.4603C23.0193 15.7779 22.9984 17.0389 22.1845 18.1674ZM21.3619 15.4084C21.1004 13.5732 20.8198 11.7414 20.5541 9.90708C20.3345 8.38643 19.7393 7.70846 18.2369 7.37557C16.5242 6.99737 14.7777 6.793 13.024 6.76556C10.8332 6.71983 8.64514 6.9461 6.51004 7.43918C5.37717 7.70061 4.70355 8.46747 4.53798 9.59162C4.25651 11.4966 3.97939 13.4024 3.67526 15.303C3.59775 15.7313 3.61982 16.1717 3.73975 16.5901C4.24867 18.2955 6.44119 18.8454 7.70564 17.5957C8.15443 17.1522 8.39756 16.5918 8.62675 16.035C8.90822 15.3474 9.40407 15.1165 10.096 15.1287C10.9082 15.1427 11.7212 15.1287 12.536 15.1287C13.3778 15.1287 14.2196 15.1287 15.0632 15.1287C15.6688 15.1287 16.1272 15.3283 16.3468 15.9505C16.4609 16.2755 16.6431 16.5788 16.8034 16.8864C17.2295 17.7021 17.8822 18.2084 18.8182 18.2676C20.4416 18.3704 21.5902 17.0206 21.3636 15.4084H21.3619Z" fill="#303030" />
                            </svg>
                            <h1 id="text" class="font-medium my-auto hidden text-left">Inventory</h1>
                        </div>
                    </button>
                </li>
                <li>
                    <button id="booking" name="booking" type="submit" class="w-full">
                        <div id="bungkus" class="flex flex-row justify-center items-center gap-8 h-full w-[50px] ml-[5px]  py-3 <?php echo $active3 ?>">
                            <svg id="svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 16C16.5304 16 17.0391 16.2107 17.4142 16.5858C17.7893 16.9609 18 17.4696 18 18C18 18.5304 17.7893 19.0391 17.4142 19.4142C17.0391 19.7893 16.5304 20 16 20C14.89 20 14 19.1 14 18C14 16.89 14.89 16 16 16ZM0 0H3.27L4.21 2H19C19.2652 2 19.5196 2.10536 19.7071 2.29289C19.8946 2.48043 20 2.73478 20 3C20 3.17 19.95 3.34 19.88 3.5L16.3 9.97C15.96 10.58 15.3 11 14.55 11H7.1L6.2 12.63L6.17 12.75C6.17 12.8163 6.19634 12.8799 6.24322 12.9268C6.29011 12.9737 6.3537 13 6.42 13H18V15H6C4.89 15 4 14.1 4 13C4 12.65 4.09 12.32 4.24 12.04L5.6 9.59L2 2H0V0ZM6 16C6.53043 16 7.03914 16.2107 7.41421 16.5858C7.78929 16.9609 8 17.4696 8 18C8 18.5304 7.78929 19.0391 7.41421 19.4142C7.03914 19.7893 6.53043 20 6 20C4.89 20 4 19.1 4 18C4 16.89 4.89 16 6 16ZM15 9L17.78 4H5.14L7.5 9H15Z" fill="black" />
                            </svg>

                            <h1 id="text" class="font-medium my-auto hidden text-left">Bookings</h1>
                        </div>
                    </button>
                </li>
                <li id="servis-list">
                    <button id="servis" name="servis" type="submit" class="w-full">
                        <div id="bungkus" class="flex flex-row justify-center items-center gap-8 h-full w-[50px] ml-[5px]  py-3 <?php echo $active4 ?>">
                            <svg id="svg" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5801 13.6643L10.8781 13.0874L8.92601 11.1353L3.14544 16.9159C2.81283 17.2381 2.54765 17.6234 2.36536 18.0491C2.18306 18.4749 2.08729 18.9326 2.08361 19.3958C2.07993 19.8589 2.16842 20.3181 2.34393 20.7467C2.51944 21.1753 2.77846 21.5647 3.10591 21.8922C3.43336 22.2197 3.8227 22.4789 4.25125 22.6545C4.6798 22.8301 5.13901 22.9187 5.60213 22.9151C6.06526 22.9115 6.52304 22.8158 6.94883 22.6336C7.37462 22.4514 7.75991 22.1863 8.08227 21.8538L12.2232 17.7129L11.0192 16.509C10.6528 16.1433 10.4127 15.6702 10.3337 15.1586C10.2547 14.647 10.3411 14.1235 10.5801 13.6643ZM6.82833 20.5932C6.50697 20.9146 6.07111 21.0951 5.61663 21.0951C5.16216 21.0951 4.7263 20.9146 4.40494 20.5932C4.08358 20.2718 3.90304 19.836 3.90304 19.3815C3.90304 18.927 4.08358 18.4912 4.40494 18.1698L8.60697 13.9689C8.47511 14.635 8.50665 15.3232 8.6989 15.9745C8.89115 16.6257 9.23837 17.2207 9.71083 17.7085L6.82833 20.5932ZM11.2027 6.75318L10.9803 8.67633L13.1369 10.8329L13.715 10.5339C14.1743 10.2975 14.6968 10.2132 15.2071 10.2931C15.7174 10.3731 16.1891 10.6131 16.5541 10.9786L19.6345 14.0578L20.2426 13.6476C21.4125 12.8573 22.2705 11.6841 22.6694 10.3298C23.0682 8.97547 22.9829 7.52451 22.4281 6.22626C22.3557 6.05825 22.2432 5.91051 22.1006 5.79593C21.958 5.68134 21.7895 5.60338 21.6098 5.56885C21.4301 5.53432 21.2447 5.54426 21.0698 5.59782C20.8948 5.65137 20.7357 5.7469 20.6061 5.87609L19.5178 6.9655H18.0415L18.036 5.49035L19.1254 4.40093C19.2549 4.27157 19.3507 4.11247 19.4045 3.93753C19.4583 3.76259 19.4684 3.57714 19.4339 3.39739C19.3995 3.21763 19.3216 3.04905 19.2069 2.90638C19.0923 2.76371 18.9444 2.65128 18.7763 2.57894C17.6622 2.09738 16.4289 1.96273 15.2371 2.19256C14.0453 2.42239 12.9505 3.00602 12.0953 3.86734C11.7329 4.23004 11.4173 4.63674 11.156 5.07792L10.9336 5.44922L11.0904 5.85163C11.1998 6.13834 11.2383 6.44726 11.2027 6.75207V6.75318ZM12.8901 5.66154C13.0285 5.46944 13.182 5.28878 13.3493 5.12128C13.8299 4.63647 14.4199 4.27417 15.0697 4.06486C15.7195 3.85555 16.4101 3.80535 17.0833 3.91847L16.5997 4.40093C16.3772 4.62532 16.2525 4.92865 16.2529 5.24467L16.2618 7.5569C16.265 7.86911 16.3906 8.16759 16.6115 8.38816C16.8325 8.60872 17.1312 8.73375 17.4435 8.73636L19.749 8.74525C19.9062 8.74597 20.0621 8.71571 20.2076 8.6562C20.3531 8.59669 20.4855 8.50909 20.5972 8.39842L21.0797 7.92041C21.1926 8.59372 21.1424 9.28428 20.9333 9.93419C20.7242 10.5841 20.3623 11.1744 19.878 11.6555L19.8068 11.7245L17.8059 9.7235C17.4151 9.33087 16.9505 9.01957 16.4387 8.80759C15.927 8.5956 15.3783 8.48714 14.8244 8.48846C14.3785 8.4892 13.9355 8.5601 13.5116 8.69856L12.8446 8.03157L12.9691 6.96439C13.0208 6.52851 12.9941 6.08688 12.8901 5.66043V5.66154ZM16.5219 11.9457C16.0822 11.5074 15.4897 11.2566 14.869 11.2463C14.2482 11.2359 13.6477 11.4667 13.1936 11.8901L10.2366 8.93201L10.5023 6.6698C10.5276 6.45464 10.4937 6.23665 10.4041 6.03937C10.3146 5.84209 10.1729 5.67301 9.9943 5.55037L5.26646 2.29436C5.03727 2.13625 4.75987 2.06357 4.48259 2.08896C4.20532 2.11435 3.94573 2.23621 3.74907 2.43331L2.47956 3.7017C2.28257 3.89867 2.1608 4.15842 2.13542 4.43582C2.11003 4.71323 2.18263 4.99077 2.34061 5.22022L5.59662 9.94806C5.71969 10.1262 5.88884 10.2676 6.086 10.357C6.28317 10.4465 6.50094 10.4808 6.71605 10.4561L8.97937 10.1904L11.9364 13.1452C11.513 13.599 11.2823 14.1994 11.2926 14.82C11.303 15.4405 11.5537 16.0329 11.9919 16.4723L17.9848 22.4652C18.1088 22.5896 18.256 22.6883 18.4182 22.7556C18.5803 22.8229 18.7542 22.8576 18.9297 22.8576C19.1053 22.8576 19.2791 22.8229 19.4413 22.7556C19.6034 22.6883 19.7507 22.5896 19.8746 22.4652L22.5181 19.8217C22.6425 19.6978 22.7412 19.5505 22.8085 19.3884C22.8758 19.2262 22.9105 19.0524 22.9105 18.8768C22.9105 18.7012 22.8758 18.5274 22.8085 18.3653C22.7412 18.2031 22.6425 18.0558 22.5181 17.9319L16.5219 11.9457ZM6.85946 8.64743L4.08034 4.61437L4.65728 4.03631L8.69145 6.81543L8.49803 8.45622L6.85946 8.64743ZM18.9275 20.8967L13.2503 15.2184C13.1345 15.1025 13.0695 14.9453 13.0695 14.7815C13.0695 14.6177 13.1345 14.4605 13.2503 14.3446L14.3909 13.203C14.5071 13.0877 14.6641 13.023 14.8278 13.023C14.9914 13.023 15.1484 13.0877 15.2646 13.203L20.9429 18.8813L18.9275 20.8967Z" fill="#303030" />
                            </svg>
                            <h1 id="text" class="font-medium my-auto hidden text-left">Servis</h1>
                        </div>
                    </button>
                </li>
                <li>
                    <button id="history" name="history" type="submit" class="w-full">
                        <div id="bungkus" class="flex flex-row justify-center items-center gap-8 h-full w-[50px] ml-[5px]  py-3 <?php echo $active5 ?>">
                            <svg id="svg" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.9158 7.11891C22.9163 7.10963 22.9163 7.10033 22.9158 7.09106C22.9136 7.05506 22.909 7.01926 22.9018 6.98392C22.894 6.94762 22.884 6.91184 22.8718 6.87678C22.87 6.86942 22.8675 6.86225 22.8643 6.85535C22.8379 6.78401 22.8018 6.7166 22.7572 6.655C22.7526 6.64761 22.7475 6.64046 22.7422 6.63357C22.7186 6.60279 22.6932 6.57346 22.6661 6.54572L18.4513 2.33194C18.4241 2.30495 18.3951 2.27989 18.3645 2.25694L18.3431 2.24087C18.2811 2.19621 18.2133 2.16016 18.1416 2.13373L18.1224 2.12623C18.0874 2.11406 18.0516 2.1044 18.0152 2.0973C17.9777 2.09087 17.9402 2.08659 17.9081 2.08337H8.94268C8.50678 2.08366 8.0888 2.25687 7.78047 2.565C7.47214 2.87312 7.29866 3.29099 7.29809 3.72689V10.032C5.77741 10.2493 4.39554 11.0347 3.43079 12.2301C2.46603 13.4255 1.99006 14.942 2.09872 16.4743C2.20738 18.0066 2.89261 19.4408 4.01641 20.4881C5.1402 21.5353 6.61908 22.1179 8.1552 22.1184H21.2733C21.709 22.1178 22.1267 21.9445 22.4348 21.6364C22.7429 21.3283 22.9163 20.9106 22.9168 20.4749V7.15641C22.9168 7.14355 22.9168 7.1307 22.9158 7.11891ZM18.703 5.00291L19.9887 6.28858H18.703V5.00291ZM3.79572 16.0382C3.79557 15.2145 4.02876 14.4075 4.46829 13.7108C4.90783 13.0141 5.53572 12.4561 6.27926 12.1015C7.0228 11.747 7.85158 11.6102 8.66962 11.7072C9.48766 11.8042 10.2615 12.1309 10.9015 12.6495C11.5415 13.1681 12.0216 13.8574 12.286 14.6376C12.5505 15.4177 12.5885 16.2569 12.3958 17.0578C12.203 17.8587 11.7874 18.5886 11.1969 19.163C10.6065 19.7374 9.86536 20.1328 9.05946 20.3034L9.02196 20.3109C8.97803 20.3206 8.93303 20.327 8.88804 20.3356L8.79268 20.3506L8.7134 20.3613L8.5634 20.3784H8.53448C8.47019 20.3838 8.40484 20.3881 8.33948 20.3913C8.27949 20.3913 8.21949 20.3913 8.15842 20.3913C7.00329 20.3905 5.89557 19.9319 5.07786 19.116C4.26016 18.3001 3.79912 17.1934 3.79572 16.0382ZM12.3926 20.3977C13.3076 19.5082 13.9178 18.352 14.1357 17.0946H19.7369C19.9643 17.0946 20.1823 17.0043 20.343 16.8436C20.5037 16.6828 20.594 16.4648 20.594 16.2375C20.594 16.0102 20.5037 15.7922 20.343 15.6314C20.1823 15.4707 19.9643 15.3804 19.7369 15.3804H14.1936C14.1936 15.3675 14.1936 15.3547 14.1936 15.3418C14.1861 15.2765 14.1786 15.2111 14.1689 15.1468C14.1636 15.1104 14.1571 15.0751 14.1507 15.0397C14.1411 14.9797 14.1303 14.9197 14.1186 14.8608C14.1111 14.8222 14.1036 14.7847 14.095 14.7472C14.0821 14.6904 14.0693 14.6336 14.0554 14.5769L14.0264 14.4633C14.0114 14.4076 13.9954 14.3562 13.9793 14.2983C13.9675 14.2608 13.9568 14.2233 13.9439 14.1858C13.9268 14.1312 13.9086 14.0787 13.8893 14.024L13.8507 13.9169C13.8304 13.8622 13.8089 13.8097 13.7864 13.7562C13.7725 13.7219 13.7586 13.6865 13.7436 13.649C13.72 13.5933 13.6954 13.5419 13.6697 13.484C13.6547 13.453 13.6407 13.4219 13.6268 13.3908C13.5957 13.3276 13.5625 13.2655 13.5304 13.2033C13.5186 13.1819 13.5089 13.1605 13.4972 13.1391C13.4522 13.0566 13.405 12.9762 13.3568 12.8959C13.344 12.8734 13.3289 12.8519 13.315 12.8305C13.28 12.7726 13.2443 12.7159 13.2079 12.6601C13.1875 12.6291 13.165 12.5991 13.1447 12.5691C13.1125 12.523 13.0804 12.4769 13.0461 12.4309C13.0118 12.3848 12.9968 12.3666 12.9722 12.3344C12.9475 12.3023 12.9079 12.2509 12.8747 12.2102L12.7933 12.1137C12.7611 12.0752 12.7268 12.0355 12.6925 11.998C12.6903 11.994 12.6874 11.9904 12.684 11.9873H19.7455C19.9728 11.9873 20.1908 11.897 20.3516 11.7363C20.5123 11.5755 20.6026 11.3575 20.6026 11.1302C20.6026 10.9029 20.5123 10.6849 20.3516 10.5241C20.1908 10.3634 19.9728 10.2731 19.7455 10.2731H10.2101C10.1743 10.2735 10.1385 10.276 10.103 10.2806L10.0259 10.2559L9.90586 10.2195C9.853 10.2031 9.8005 10.1881 9.74836 10.1745L9.6273 10.1424L9.46444 10.1049L9.34552 10.0792L9.17196 10.0481L9.05839 10.0299L9.02089 10.0235V3.79117H16.9888V7.14784C16.9888 7.37516 17.0791 7.59317 17.2399 7.75391C17.4006 7.91465 17.6186 8.00495 17.8459 8.00495H21.2026V20.3977H12.3926ZM7.29702 16.0382V13.3469C7.29702 13.1196 7.38732 12.9016 7.54806 12.7408C7.7088 12.5801 7.92681 12.4898 8.15413 12.4898C8.38145 12.4898 8.59946 12.5801 8.7602 12.7408C8.92094 12.9016 9.01125 13.1196 9.01125 13.3469V15.1811H9.82657C10.0539 15.1811 10.2719 15.2714 10.4326 15.4322C10.5934 15.5929 10.6837 15.8109 10.6837 16.0382C10.6837 16.2656 10.5934 16.4836 10.4326 16.6443C10.2719 16.805 10.0539 16.8954 9.82657 16.8954H8.15628C7.92896 16.8954 7.71095 16.805 7.55021 16.6443C7.38947 16.4836 7.29916 16.2656 7.29916 16.0382H7.29702ZM16.4863 6.87999C16.4863 7.10731 16.396 7.32532 16.2353 7.48606C16.0746 7.6468 15.8565 7.7371 15.6292 7.7371H10.2037C9.97638 7.7371 9.75837 7.6468 9.59763 7.48606C9.43689 7.32532 9.34659 7.10731 9.34659 6.87999C9.34659 6.65267 9.43689 6.43466 9.59763 6.27392C9.75837 6.11318 9.97638 6.02288 10.2037 6.02288H15.6314C15.7439 6.02288 15.8554 6.04505 15.9594 6.08812C16.0634 6.1312 16.1578 6.19433 16.2374 6.27392C16.317 6.35351 16.3802 6.448 16.4232 6.55199C16.4663 6.65598 16.4885 6.76743 16.4885 6.87999H16.4863Z" fill="#303030" />
                            </svg>

                            <h1 id="text" class="font-medium my-auto hidden text-left">History</h1>
                        </div>
                    </button>
                </li>
                <li>
                    <button id="user" name="user" type="submit" class="w-full">
                        <div id="bungkus" class="flex flex-row justify-center items-center gap-8 h-full w-[50px] ml-[5px]  py-3 <?php echo $active6 ?>">
                            <svg id="svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.625 13.875H9.875C6.07812 13.875 3 16.9531 3 20.75C3 21.4402 3.55977 22 4.25 22H19.25C19.9402 22 20.5 21.4402 20.5 20.75C20.5 16.9531 17.4219 13.875 13.625 13.875ZM4.91367 20.125C5.22227 17.6602 7.32812 15.75 9.875 15.75H13.625C16.1703 15.75 18.2773 17.6621 18.5859 20.125H4.91367ZM11.75 12C14.5113 12 16.75 9.76133 16.75 7C16.75 4.23867 14.5113 2 11.75 2C8.98867 2 6.75 4.23867 6.75 7C6.75 9.76172 8.98828 12 11.75 12ZM11.75 3.875C13.473 3.875 14.875 5.27695 14.875 7C14.875 8.72305 13.473 10.125 11.75 10.125C10.027 10.125 8.625 8.72266 8.625 7C8.625 5.27695 10.0273 3.875 11.75 3.875Z" fill="black" />
                            </svg>

                            <h1 id="text" class="font-medium my-auto hidden text-left">User</h1>
                        </div>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar'),
        text = document.querySelectorAll('#text'),
        flexing = document.getElementById('flexing'),
        gambar = document.getElementById('gambar'),
        link = document.getElementById('link'),
        inventory = document.getElementById('inventory'),
        servis_list = document.getElementById('servis-list'),
        // svg = document.querySelectorAll('#svg'),
        bungkus = document.querySelectorAll('#bungkus'),
        sidebarToggle = document.getElementById('sidebarToggle');
    const backdrop = document.getElementById('backdrop');
    const span1 = document.getElementById('span1');
    const span2 = document.getElementById('span2');
    const span3 = document.getElementById('span3');
    const putar = document.getElementById('putar');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        text.forEach((item) => {
            item.classList.toggle('text-active');
        });
        // svg.forEach((item) => {
        //     item.classList.toggle('svg-active');
        // });

        putar.classList.toggle('putar-active');
        span1.classList.toggle('span1-active');
        span2.classList.toggle('span2-active');
        span3.classList.toggle('span3-active');


        bungkus.forEach((item) => {
            item.classList.toggle('bungkus-active');
        });

        // set timout sidebarToggle agar tidak terjadi bug
        // setTimeout(() => {
        sidebarToggle.classList.toggle('toggle-active');
        // }, 100);
        flexing.classList.toggle('flexing-active');
        gambar.classList.toggle('gambar-active');

        backdrop.classList.toggle('hidden')
    })

    backdrop.addEventListener('click', () => {
        sidebarToggle.click();
    });



    <?php if (Location::in(1, 'dashboard')) { ?>
        if (res !== "Bojonegoro") {
            servis_list.classList.add('hidden');
        }
    <?php } ?>
</script>