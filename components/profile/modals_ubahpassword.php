<!-- modal Ubah Profile start -->
<?php
    $id = $_POST['id_admin'];
    $nama = $_POST['username'];
    $pwbaru = $_POST['password_baru'];
    $kpwbaru = $_POST['konfirmasi_password_baru'];

    if (isset($_POST['konfirmasi-password'])) {
        if ($pwbaru == $kpwbaru) {
            if ($SadminUser->update_admin(
                [
                    'username' => $nama,
                    'password' => password_hash($pwbaru, PASSWORD_DEFAULT),
                    'update_at' => date('Y-m-d H:i:s'),
                ],
                $id
            )) {
                Redirect::to('user');
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    text: 'Gagal Ubah Password',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    location.href = 'servis';
                });
                </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Password tidak sama',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                location.href = 'servis';
            });
            </script>";

        }
    }
?>

<section>
    <div id="modal_overlay_profile" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_profile" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[520px] w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <div class="flex flex-row justify-start ml-[25px]  gap-3 mb-3">
                <svg width="21" height="24" viewBox="0 0 21 24" class="my-auto" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.28571 0C1.01714 0 0 1.01714 0 2.28571V20.5714C0 21.1776 0.240816 21.759 0.66947 22.1877C1.09812 22.6163 1.67951 22.8571 2.28571 22.8571H6.85714V20.6743L9.24572 18.2857H2.28571V16H11.5314L13.8171 13.7143H2.28571V11.4286H16.1029L18.2857 9.24572V6.85714L11.4286 0H2.28571ZM10.2857 1.71429L16.5714 8H10.2857V1.71429ZM18.4571 12.5714C18.2857 12.5714 18.1257 12.6286 18 12.7543L16.8343 13.92L19.2229 16.2971L20.3886 15.1429C20.6286 14.8914 20.6286 14.48 20.3886 14.24L18.9029 12.7543C18.7771 12.6286 18.6171 12.5714 18.4571 12.5714ZM16.16 14.5943L9.14286 21.6229V24H11.52L18.5486 16.9714L16.16 14.5943Z" fill="#FAFAFA" />
                </svg>
                <h1 id="mdoalText" class="text-neutral_050 font-base font-noto-sans text-xl">Ubah Password</h1>
            </div>
            <span class="w-11/12 h-0.5 mx-auto -mt-4 bg-neutral_600"></span>
            <form action="profile.php" method="post" class="flex flex-col items-center justify-center gap-4 mt-2" enctype="multipart/form-data">
                <div class="relative z-0 w-11/12">
                    <input type="hidden" id="id" name="id_admin" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " value="<?php echo $user_data['id_admin']; ?>" />
                    <label for="id" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm"></label>
                    <svg width="24" class="absolute left-5 top-5" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3641 4.18529C18.1054 2.51807 16.3654 1.80474 14.28 2.0456C10.21 2.51373 7.99626 6.93336 10.0813 10.4413C10.2909 10.7941 10.2438 10.9592 9.98357 11.2174C7.86643 13.3168 5.75642 15.4233 3.65354 17.537C3.5147 17.669 3.38524 17.8106 3.26609 17.9606C2.90957 18.4345 2.9006 18.8061 3.30425 19.2253C4.11387 20.0666 4.94006 20.8921 5.78283 21.7019C6.21655 22.1191 6.69364 22.0859 7.07561 21.6805C7.42924 21.3046 7.41507 20.8709 7.01489 20.4256C6.73557 20.1147 6.44006 19.8184 6.14744 19.5191C5.19904 18.5464 5.20482 18.5539 6.19429 17.6336C6.40045 17.4416 6.51871 17.4601 6.70029 17.6446C7.20168 18.154 7.70653 18.6609 8.23278 19.1452C8.71681 19.592 9.17945 19.5923 9.57009 19.1892C9.95552 18.7916 9.92545 18.3255 9.47264 17.8559C9.00104 17.3664 8.53783 16.867 8.03992 16.4053C7.77766 16.1621 7.8138 16.0166 8.04628 15.7879C9.17723 14.6749 10.2986 13.5525 11.4105 12.4208C11.6193 12.208 11.7532 12.2352 11.9819 12.3809C12.8533 12.9435 13.8723 13.2345 14.9095 13.2168C17.2646 13.0853 19.0689 12.1062 20.0358 9.85173C20.8995 7.83608 20.6702 5.91527 19.3641 4.18529ZM14.9401 11.3825C12.8085 11.3911 11.0985 9.70079 11.115 7.59001C11.1324 5.35952 12.9606 3.81258 14.8933 3.83109C17.0278 3.85277 18.6866 5.46506 18.6968 7.58163C18.7069 9.69819 17.0524 11.3738 14.9413 11.3825H14.9401Z" fill="#303030" />
                    </svg>
                </div>
                <div class="relative z-0 w-11/12">
                    <input type="text" id="username" name="username" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " value="<?php echo $user_data['username']; ?>" />
                    <label for="username" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">username</label>
                    <svg width="24" class="absolute left-5 top-5" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3641 4.18529C18.1054 2.51807 16.3654 1.80474 14.28 2.0456C10.21 2.51373 7.99626 6.93336 10.0813 10.4413C10.2909 10.7941 10.2438 10.9592 9.98357 11.2174C7.86643 13.3168 5.75642 15.4233 3.65354 17.537C3.5147 17.669 3.38524 17.8106 3.26609 17.9606C2.90957 18.4345 2.9006 18.8061 3.30425 19.2253C4.11387 20.0666 4.94006 20.8921 5.78283 21.7019C6.21655 22.1191 6.69364 22.0859 7.07561 21.6805C7.42924 21.3046 7.41507 20.8709 7.01489 20.4256C6.73557 20.1147 6.44006 19.8184 6.14744 19.5191C5.19904 18.5464 5.20482 18.5539 6.19429 17.6336C6.40045 17.4416 6.51871 17.4601 6.70029 17.6446C7.20168 18.154 7.70653 18.6609 8.23278 19.1452C8.71681 19.592 9.17945 19.5923 9.57009 19.1892C9.95552 18.7916 9.92545 18.3255 9.47264 17.8559C9.00104 17.3664 8.53783 16.867 8.03992 16.4053C7.77766 16.1621 7.8138 16.0166 8.04628 15.7879C9.17723 14.6749 10.2986 13.5525 11.4105 12.4208C11.6193 12.208 11.7532 12.2352 11.9819 12.3809C12.8533 12.9435 13.8723 13.2345 14.9095 13.2168C17.2646 13.0853 19.0689 12.1062 20.0358 9.85173C20.8995 7.83608 20.6702 5.91527 19.3641 4.18529ZM14.9401 11.3825C12.8085 11.3911 11.0985 9.70079 11.115 7.59001C11.1324 5.35952 12.9606 3.81258 14.8933 3.83109C17.0278 3.85277 18.6866 5.46506 18.6968 7.58163C18.7069 9.69819 17.0524 11.3738 14.9413 11.3825H14.9401Z" fill="#303030" />
                    </svg>
                </div>
                <div class="relative z-0 w-11/12">
                    <input type="text" id="password_baru" name="password_baru" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                    <label for="password_baru" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Password Baru</label>
                    <svg width="24" class="absolute left-5 top-5" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3641 4.18529C18.1054 2.51807 16.3654 1.80474 14.28 2.0456C10.21 2.51373 7.99626 6.93336 10.0813 10.4413C10.2909 10.7941 10.2438 10.9592 9.98357 11.2174C7.86643 13.3168 5.75642 15.4233 3.65354 17.537C3.5147 17.669 3.38524 17.8106 3.26609 17.9606C2.90957 18.4345 2.9006 18.8061 3.30425 19.2253C4.11387 20.0666 4.94006 20.8921 5.78283 21.7019C6.21655 22.1191 6.69364 22.0859 7.07561 21.6805C7.42924 21.3046 7.41507 20.8709 7.01489 20.4256C6.73557 20.1147 6.44006 19.8184 6.14744 19.5191C5.19904 18.5464 5.20482 18.5539 6.19429 17.6336C6.40045 17.4416 6.51871 17.4601 6.70029 17.6446C7.20168 18.154 7.70653 18.6609 8.23278 19.1452C8.71681 19.592 9.17945 19.5923 9.57009 19.1892C9.95552 18.7916 9.92545 18.3255 9.47264 17.8559C9.00104 17.3664 8.53783 16.867 8.03992 16.4053C7.77766 16.1621 7.8138 16.0166 8.04628 15.7879C9.17723 14.6749 10.2986 13.5525 11.4105 12.4208C11.6193 12.208 11.7532 12.2352 11.9819 12.3809C12.8533 12.9435 13.8723 13.2345 14.9095 13.2168C17.2646 13.0853 19.0689 12.1062 20.0358 9.85173C20.8995 7.83608 20.6702 5.91527 19.3641 4.18529ZM14.9401 11.3825C12.8085 11.3911 11.0985 9.70079 11.115 7.59001C11.1324 5.35952 12.9606 3.81258 14.8933 3.83109C17.0278 3.85277 18.6866 5.46506 18.6968 7.58163C18.7069 9.69819 17.0524 11.3738 14.9413 11.3825H14.9401Z" fill="#303030" />
                    </svg>
                </div>
                <div class="relative z-0 w-11/12">
                    <input type="text" id="konfirmasi_password_baru" name="konfirmasi_password_baru" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                    <label for="konfirmasi_password_baru" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">konfirmasi Password Baru</label>
                    <svg width="24" class="absolute left-5 top-5" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3641 4.18529C18.1054 2.51807 16.3654 1.80474 14.28 2.0456C10.21 2.51373 7.99626 6.93336 10.0813 10.4413C10.2909 10.7941 10.2438 10.9592 9.98357 11.2174C7.86643 13.3168 5.75642 15.4233 3.65354 17.537C3.5147 17.669 3.38524 17.8106 3.26609 17.9606C2.90957 18.4345 2.9006 18.8061 3.30425 19.2253C4.11387 20.0666 4.94006 20.8921 5.78283 21.7019C6.21655 22.1191 6.69364 22.0859 7.07561 21.6805C7.42924 21.3046 7.41507 20.8709 7.01489 20.4256C6.73557 20.1147 6.44006 19.8184 6.14744 19.5191C5.19904 18.5464 5.20482 18.5539 6.19429 17.6336C6.40045 17.4416 6.51871 17.4601 6.70029 17.6446C7.20168 18.154 7.70653 18.6609 8.23278 19.1452C8.71681 19.592 9.17945 19.5923 9.57009 19.1892C9.95552 18.7916 9.92545 18.3255 9.47264 17.8559C9.00104 17.3664 8.53783 16.867 8.03992 16.4053C7.77766 16.1621 7.8138 16.0166 8.04628 15.7879C9.17723 14.6749 10.2986 13.5525 11.4105 12.4208C11.6193 12.208 11.7532 12.2352 11.9819 12.3809C12.8533 12.9435 13.8723 13.2345 14.9095 13.2168C17.2646 13.0853 19.0689 12.1062 20.0358 9.85173C20.8995 7.83608 20.6702 5.91527 19.3641 4.18529ZM14.9401 11.3825C12.8085 11.3911 11.0985 9.70079 11.115 7.59001C11.1324 5.35952 12.9606 3.81258 14.8933 3.83109C17.0278 3.85277 18.6866 5.46506 18.6968 7.58163C18.7069 9.69819 17.0524 11.3738 14.9413 11.3825H14.9401Z" fill="#303030" />
                    </svg>
                </div>
                <div class="flex flex-row gap-11 mt-2 items-center justify-center w-full">
                    <button type="button" onclick="openModalProfile(false)" name="Batal-rental" id="Batal-rental" value="Batal-rental" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl px-4">
                        Batal
                    </button>
                    <button type="submit" name="konfirmasi-password" id="Konfirmasi-password" class="bg-[#4FCF2F] text-neutral_050 w-5/12 h-12 rounded-2xl px-4">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- modal_ubah_profile end -->

<script>
    const modal_overlay_profile = document.querySelector('#modal_overlay_profile');
    const modal_profile = document.querySelector('#modal_profile');
    const ubah_profile = document.querySelector('#ubah_profile');
    const password = document.getElementById('password');
    const konfirmasi_password = document.getElementById('konfirmasi_password');
    const password_baru = document.getElementById('password_baru');

    const openModalProfile = (value) => {
        const modalClProfile = modal_profile.classList
        const overlayClProfile = modal_overlay_profile

        if (value) {
            overlayClProfile.classList.remove('hidden')
            setTimeout(() => {
                modalClProfile.remove('opacity-0')
                modalClProfile.remove('-translate-y-full')
                modalClProfile.remove('scale-150')
            }, 100);
        } else {
            modalClProfile.add('-translate-y-full')
            setTimeout(() => {
                modalClProfile.add('opacity-0')
                modalClProfile.add('scale-150')
            }, 100);
            setTimeout(() => overlayClProfile.classList.add('hidden'), 300);
        }
    }
    openModalProfile(false)

    ubah_profile.addEventListener('click', () => {
        openModalProfile(true)
    });

</script>