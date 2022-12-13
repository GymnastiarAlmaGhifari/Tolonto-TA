 <!-- modal Sewa tambah start -->
 <section>
     <div id="modal_overlay_editadmin" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0 z-50">
         <!-- modal -->
         <div id="modal_editadmin" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[520px] w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
             <div class="flex flex-row justify-start ml-[23px]  gap-3 mb-3">
                 <svg width="28" height="18" viewBox="0 0 28 18" class="mt-1" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M17.746 11.25C14.494 11.25 8.00219 12.7462 8.00219 15.75V18H27.4898V15.75C27.4898 12.7462 20.998 11.25 17.746 11.25ZM6.78421 6.75V3.375H4.34826V6.75H0.694336V9H4.34826V12.375H6.78421V9H10.4381V6.75M17.746 9C19.0381 9 20.2773 8.52589 21.1909 7.68198C22.1046 6.83807 22.6179 5.69347 22.6179 4.5C22.6179 3.30653 22.1046 2.16193 21.1909 1.31802C20.2773 0.474106 19.0381 0 17.746 0C16.4539 0 15.2147 0.474106 14.301 1.31802C13.3874 2.16193 12.8741 3.30653 12.8741 4.5C12.8741 5.69347 13.3874 6.83807 14.301 7.68198C15.2147 8.52589 16.4539 9 17.746 9Z" fill="#ffffff" />
                 </svg>

                 <h1 id="mdoalText" class="text-neutral_050 font-base font-noto-sans text-xl">Edit Admin
             </div>
             <span class="w-11/12 h-0.5 mx-auto -mt-5 bg-neutral_600"></span>
             <form action="userSuperAdmin.php" method="post" class="flex flex-col items-center justify-center gap-4 mt-2" enctype="multipart/form-data">
                 <!-- gambar start -->
                 <div class="flex flex-col justify-center items-center relative">
                     <!-- show previe image from Upload::uploadimage() -->
                     <img src="components/kamera.png" alt="" id="preview-Admin-Edit" class="w-[100px] h-[100px] object-cover rounded-full shadow-elevation-dark-4 bg-transparent">
                     <label>
                         <input class="text-sm cursor-pointer w-36 hidden" accept="image/*" type="file" name="image-Admin-edit" id="image-Admin-edit" />

                         <div class="cursor-pointer rounded-full bg-primary_400 w-[35px] h-[35px] flex flex-row justify-center items-center absolute  bottom-1 -right-1.5">
                             <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M3 3V0H5V3H8V5H5V8H3V5H0V3M6 9V6H9V3H16L17.8 5H21C22.1 5 23 5.9 23 7V19C23 20.1 22.1 21 21 21H5C3.9 21 3 20.1 3 19V9M13 18C17.45 18 19.69 12.62 16.54 9.46C13.39 6.31 8 8.55 8 13C8 15.76 10.24 18 13 18ZM9.8 13C9.8 15.85 13.25 17.28 15.26 15.26C17.28 13.25 15.85 9.8 13 9.8C11.24 9.8 9.8 11.24 9.8 13Z" fill="black" />
                             </svg>
                         </div>
                     </label>
                 </div>
                 <!-- gambar end -->

                 <div class="relative z-0 w-11/12 mt-5">
                     <input type="text" id="username-edit" name="username-edit" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                     <label for="username-edit" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Username</label>
                     <svg width="30" height="24" class="absolute top-4 left-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M13.625 13.875H9.875C6.07812 13.875 3 16.9531 3 20.75C3 21.4402 3.55977 22 4.25 22H19.25C19.9402 22 20.5 21.4402 20.5 20.75C20.5 16.9531 17.4219 13.875 13.625 13.875ZM4.91367 20.125C5.22227 17.6602 7.32812 15.75 9.875 15.75H13.625C16.1703 15.75 18.2773 17.6621 18.5859 20.125H4.91367ZM11.75 12C14.5113 12 16.75 9.76133 16.75 7C16.75 4.23867 14.5113 2 11.75 2C8.98867 2 6.75 4.23867 6.75 7C6.75 9.76172 8.98828 12 11.75 12ZM11.75 3.875C13.473 3.875 14.875 5.27695 14.875 7C14.875 8.72305 13.473 10.125 11.75 10.125C10.027 10.125 8.625 8.72266 8.625 7C8.625 5.27695 10.0273 3.875 11.75 3.875Z" fill="black" />
                     </svg>
                 </div>
                 <div class="relative z-0 w-11/12">
                     <input type="password" id="password-edit" name="password-edit" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                     <label for="password-edit" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Password</label>
                     <svg width="24" height="24" class="absolute top-4 left-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M19.3641 4.18529C18.1054 2.51807 16.3654 1.80474 14.28 2.0456C10.21 2.51373 7.99626 6.93336 10.0813 10.4413C10.2909 10.7941 10.2438 10.9592 9.98357 11.2174C7.86643 13.3168 5.75642 15.4233 3.65354 17.537C3.5147 17.669 3.38524 17.8106 3.26609 17.9606C2.90957 18.4345 2.9006 18.8061 3.30425 19.2253C4.11387 20.0666 4.94006 20.8921 5.78283 21.7019C6.21655 22.1191 6.69364 22.0859 7.07561 21.6805C7.42924 21.3046 7.41507 20.8709 7.01489 20.4256C6.73557 20.1147 6.44006 19.8184 6.14744 19.5191C5.19904 18.5464 5.20482 18.5539 6.19429 17.6336C6.40045 17.4416 6.51871 17.4601 6.70029 17.6446C7.20168 18.154 7.70653 18.6609 8.23278 19.1452C8.71681 19.592 9.17945 19.5923 9.57009 19.1892C9.95552 18.7916 9.92545 18.3255 9.47264 17.8559C9.00104 17.3664 8.53783 16.867 8.03992 16.4053C7.77766 16.1621 7.8138 16.0166 8.04628 15.7879C9.17723 14.6749 10.2986 13.5525 11.4105 12.4208C11.6193 12.208 11.7532 12.2352 11.9819 12.3809C12.8533 12.9435 13.8723 13.2345 14.9095 13.2168C17.2646 13.0853 19.0689 12.1062 20.0358 9.85173C20.8995 7.83608 20.6702 5.91527 19.3641 4.18529ZM14.9401 11.3825C12.8085 11.3911 11.0985 9.70079 11.115 7.59001C11.1324 5.35952 12.9606 3.81258 14.8933 3.83109C17.0278 3.85277 18.6866 5.46506 18.6968 7.58163C18.7069 9.69819 17.0524 11.3738 14.9413 11.3825H14.9401Z" fill="#303030" />
                     </svg>
                     <svg width="24" onclick="showEdit()" id="showimg-edit" class="absolute right-5 cursor-pointer top-4 z-20" aria-hidden="true" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M6.70933 6.89903C8.09369 5.82092 9.86868 4.99999 11.9999 4.99999C14.5249 4.99999 16.5467 6.15123 18.0186 7.51871C19.4811 8.87495 20.4592 10.4718 20.9217 11.6156C21.0248 11.8624 21.0248 12.1374 20.9217 12.3843C20.503 13.3937 19.6623 14.8155 18.4249 16.0843L21.7123 18.6592C22.0373 18.9155 22.0967 19.3874 21.8405 19.7124C21.5842 20.0374 21.1123 20.0967 20.7873 19.8405L2.28737 5.3403C1.96137 5.08467 1.90421 4.61343 2.15974 4.28737C2.4153 3.96137 2.88655 3.90421 3.2128 4.15974L6.70933 6.89903ZM7.93119 7.85934L9.36868 8.98433C10.0718 8.37183 10.9937 7.99996 11.9999 7.99996C14.2093 7.99996 15.9999 9.79057 15.9999 11.9999C15.9999 12.6624 15.8405 13.2843 15.5561 13.8343L17.2374 15.153C18.2842 14.0874 19.0592 12.8468 19.4561 11.9999C19.003 11.0343 18.1999 9.73432 16.9967 8.61558C15.7124 7.42497 14.0374 6.47185 11.9999 6.47185C10.4218 6.47185 9.03431 7.05403 7.93119 7.85934ZM14.3405 12.8812C14.4436 12.6062 14.4999 12.3093 14.4999 11.9718C14.4999 10.6187 13.3811 9.47182 11.9999 9.47182C11.978 9.47182 11.9593 9.49995 11.9093 9.49995C11.978 9.65932 11.9999 9.82807 11.9999 9.97182C11.9999 10.3187 11.9249 10.6187 11.7937 10.8843L14.3405 12.8812ZM14.6343 16.953L15.9436 17.9843C14.8093 18.5967 13.4936 18.9999 11.9999 18.9999C9.47493 18.9999 7.45307 17.8499 5.98121 16.4811C4.51935 15.0968 3.54186 13.4999 3.07686 12.3843C2.97436 12.1374 2.97436 11.8624 3.07686 11.6156C3.37498 10.8999 3.88404 9.97494 4.59653 9.04683L5.77496 9.97494C5.19059 10.7031 4.80497 11.4249 4.54529 11.9718C4.96934 12.9374 5.79996 14.2655 7.00308 15.3843C8.28744 16.5749 9.96243 17.4999 11.9999 17.4999C12.9593 17.4999 13.8374 17.2936 14.6343 16.953ZM7.99994 11.9718C7.99994 11.9093 8.00307 11.8218 8.00932 11.7343L9.76243 13.1155C10.0906 13.7749 10.703 14.2687 11.4374 14.4093L13.1937 15.8186C12.8155 15.9093 12.4155 15.9999 11.9718 15.9999C9.79055 15.9999 7.97182 14.2093 7.97182 11.9718H7.99994Z" fill="#303030" />
                     </svg>
                     <svg width="24" onclick="showEdit()" height="24" id="hideimg-edit" class="absolute right-4 cursor-pointer hidden top-5 z-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M7.5558 11.7781C7.5558 9.32315 9.54547 7.33348 12.0004 7.33348C14.4554 7.33348 16.4451 9.32315 16.4451 11.7781C16.4451 14.2331 14.4554 16.2227 12.0004 16.2227C9.54547 16.2227 7.5558 14.2331 7.5558 11.7781ZM12.0004 14.556C13.5352 14.556 14.7783 13.3129 14.7783 11.7781C14.7783 10.2433 13.5352 9.00022 12.0004 9.00022C11.9761 9.00022 11.9553 9.00022 11.8997 9.00022C11.9761 9.17731 12.0004 9.36481 12.0004 9.5558C12.0004 10.7815 11.0039 11.7781 9.77812 11.7781C9.58714 11.7781 9.39963 11.7538 9.22254 11.6774C9.22254 11.733 9.22254 11.7538 9.22254 11.7469C9.22254 13.3129 10.4656 14.556 12.0004 14.556ZM5.31334 6.79873C6.94813 5.27922 9.19476 4 12.0004 4C14.8061 4 17.0527 5.27922 18.6882 6.79873C20.3133 8.30574 21.4002 10.0801 21.9141 11.351C22.0286 11.6253 22.0286 11.9309 21.9141 12.2052C21.4002 13.4449 20.3133 15.2192 18.6882 16.7575C17.0527 18.2784 14.8061 19.5562 12.0004 19.5562C9.19476 19.5562 6.94813 18.2784 5.31334 16.7575C3.68827 15.2192 2.60211 13.4449 2.08546 12.2052C1.97151 11.9309 1.97151 11.6253 2.08546 11.351C2.60211 10.0801 3.68827 8.30574 5.31334 6.79873ZM12.0004 5.66674C9.73645 5.66674 7.87526 6.69456 6.44811 8.01753C5.11125 9.26064 4.18829 10.7052 3.71675 11.7781C4.18829 12.8198 5.11125 14.2956 6.44811 15.5387C7.87526 16.8617 9.73645 17.8895 12.0004 17.8895C14.2644 17.8895 16.1256 16.8617 17.5528 15.5387C18.8896 14.2956 19.782 12.8198 20.2855 11.7781C19.782 10.7052 18.8896 9.26064 17.5528 8.01753C16.1256 6.69456 14.2644 5.66674 12.0004 5.66674Z" fill="#303030" />
                     </svg>
                 </div>
                 <div class="flex flex-row gap-[42px]  justify-center items-center w-full ">
                     <div class="relative z-0 w-5/12 ">
                         <svg width="14" height="24" class="absolute top-4 left-7" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M6.12 20.2267L1.89333 16L0.0133336 17.88L6.12 24L12.24 17.88L10.3467 16M6.12 3.77333L10.3467 8L12.2267 6.12L6.12 0L0 6.12L1.89333 8L6.12 3.77333Z" fill="black" />
                         </svg>
                         <select name="level-edit" id="level-edit" required class="select select-bordered font-normal py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-16  pr-3 outline-none">
                             <option value="" class="text-neutral_500 text-base" hidden>Level</option>
                             <option id="option" value="1" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Super Admin</option>
                             <option id="option" value="0" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Admin</option>
                         </select>
                         <i id="arrow_editAdmin" class="fa-solid fa-caret-down fa-2x absolute right-4 mt-3"></i>
                     </div>
                     <div class="relative z-0 w-5/12 ">
                         <svg width="14" height="24" class="absolute top-4 left-7" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M6.12 20.2267L1.89333 16L0.0133336 17.88L6.12 24L12.24 17.88L10.3467 16M6.12 3.77333L10.3467 8L12.2267 6.12L6.12 0L0 6.12L1.89333 8L6.12 3.77333Z" fill="black" />
                         </svg>
                         <select name="lokasi-edit" id="lokasi-edit" required class="select select-bordered font-normal py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-16  pr-3 outline-none">
                             <option value="" class="text-neutral_500 text-base" hidden>Lokasi</option>
                             <option id="option" value="Bojonegoro" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Bojonegoro</option>
                             <option id="option" value="Tuban" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Tuban</option>
                             <option id="option" value="Babat" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Babat</option>
                         </select>
                         <i id="arrow_editAdmin" class="fa-solid fa-caret-down fa-2x absolute right-4 mt-3"></i>
                     </div>
                 </div>

                 <div class="flex flex-row gap-[42px] mt-2 items-center justify-center w-full">
                     <button type="button" onclick="openModalEditadmin(false)" name="Batal-Admin-Edit" id="Batal-Admin-Edit" value="Batal-Admin-Edit" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl">
                         Batal
                     </button>
                     <button type="submit" name="Konfirmasi-Admin-Edit" id="Konfirmasi-Admin-Edit" class="bg-[#4FCF2F] text-neutral_050 w-5/12 h-12 rounded-2xl">Konfirmasi</button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!-- modal Sewa tambah end -->
 <script>
     const modal_overlay_editadmin = document.querySelector('#modal_overlay_editadmin');
     const modal_editadmin = document.querySelector('#modal_editadmin');
     const editAdmin = document.querySelectorAll('#editAdmin');
     const imginpedit = document.getElementById('image-Admin-edit');
     const prevedit = document.getElementById('preview-Admin-Edit');

     imginpedit.onchange = evt => {
         const [file] = imginpedit.files
         if (file) {
             //if size is more than 2mb alert
             if (file.size > 2000000) {
                 alert('ukuran file maksimal 2mb');
                 imginpedit.value = '';
                 return false;
             } else if (file.type != 'image/jpeg' && file.type != 'image/png' && file.type != 'image/jpg') {
                 alert('type file harus .jpg .png .jpeg');
                 imginpedit.value = '';
                 return false;
             } else {
                 prevedit.src = URL.createObjectURL(file)
                 //rename file to datetimenow and save to folder

                 console.log(file);
             }

         }
     }

     const showEdit = () => {
         var x = document.getElementById("password-edit");
         if (x.type === "password") {
             x.type = "text";
             document.getElementById("showimg-edit").classList.add("hidden");
             document.getElementById("hideimg-edit").classList.remove("hidden");
         } else {
             x.type = "password";
             document.getElementById("showimg-edit").classList.remove("hidden");
             document.getElementById("hideimg-edit").classList.add("hidden");
             labelInput.classList.remove("text-transparent");
         }
     };

     const openModalEditadmin = (value) => {
         const ModalClEditadmin = modal_editadmin.classList
         const overlayClEditadmin = modal_overlay_editadmin

         if (value) {
             overlayClEditadmin.classList.remove('hidden')
             setTimeout(() => {
                 ModalClEditadmin.remove('opacity-0')
                 ModalClEditadmin.remove('-translate-y-full')
                 ModalClEditadmin.remove('scale-150')
             }, 100);
         } else {
             ModalClEditadmin.add('-translate-y-full')
             setTimeout(() => {
                 ModalClEditadmin.add('opacity-0')
                 ModalClEditadmin.add('scale-150')
             }, 100);
             setTimeout(() => overlayClEditadmin.classList.add('hidden'), 300);
         }
     }
     openModalEditadmin(false)

     editAdmin.forEach((editAdmin) => {
         editAdmin.addEventListener('click', () => {
             openModalEditadmin(true)
         })
     })
 </script>