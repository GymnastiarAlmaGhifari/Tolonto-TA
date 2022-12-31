<?php
// if (isset($_POST['Konfirmasi-topup'])) {

//     $idtopup = $SadminUser->idtopup();
//     $iduser = $SadminUser->fetch_user($_POST['email-user']);
//     if ($SadminUser->add_topup(
//         [
//             'id_topup' => $idtopup,
//             'id_user' => $iduser['user_id'],
//             'jml_topup' => Rupiah::clear($_POST['topup']),
//             'waktu' => date('Y-m-d H:i:s'),
//             'id_admin' => $user_data['id_admin']
//         ]
//     )) // jika berhasil refresh page tanpa submit ulang
//     {
//         Redirect::to('user');
// //         echo "<script>
// // alert('There are no fields to generate a report');
// // window.location.href='admin/ahm/panel';
// // </script>";
//     } else {
//         // gagal topup
//         echo "<script>
//         Swal.fire({
//             icon: 'error',
//             text: 'Gagal Topup',
//             showConfirmButton: false,
//             timer: 1500
//         }).then(() => {
//             location.href = 'user.php';
//         });
//         </script>";
//     }
// }

?>

<!-- modal Sewa tambah start -->
<section>
    <div id="modal_overlay_topup" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_topup" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[450px] xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <div class="flex flex-row justify-start ml-[23px]  gap-3 mb-3">
                <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#fff" />
                </svg>
                <h1 id="mdoalText" class="text-neutral_050 font-base font-noto-sans text-xl">Topup
            </div>
            <span class="w-11/12 h-0.5 mx-auto -mt-5 bg-neutral_600"></span>
            <form id="form_topup" action="isitopup.php" method="post" class="flex flex-col items-center justify-center gap-4 mt-2" enctype="multipart/form-data">
                <input type="hidden" name="id-user" id="id-user">
                <!-- gambar start -->
                <div class="flex flex-col justify-center items-center relative">
                    <!-- show previe image from Upload::uploadimage() -->
                    <img src="" alt="gambar user" name="preview-user" id="preview-user" class="w-[100px] h-[100px] object-cover rounded-full shadow-elevation-dark-4 bg-transparent">
                </div>
                <!-- gambar end -->

                <div class="relative z-0 w-11/12 mt-5">
                    <input readonly type="text" id="email-user" name="email-user" class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" />

                    <svg class="absolute top-[18px] left-5" width="25" height="20" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27 6L15 13.5L3 6V3L15 10.5L27 3M27 0H3C1.335 0 0 1.335 0 3V21C0 21.7956 0.31607 22.5587 0.87868 23.1213C1.44129 23.6839 2.20435 24 3 24H27C27.7956 24 28.5587 23.6839 29.1213 23.1213C29.6839 22.5587 30 21.7956 30 21V3C30 1.335 28.65 0 27 0Z" fill="black" />
                    </svg>

                </div>
                <div class="relative z-0 w-11/12">
                    <input type="text" id="topup" name="topup" class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                    <label for="topup" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Jumlah Topup</label>
                    <svg width="14" height="24" class="absolute top-4 left-7" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#303030" />
                    </svg>
                </div>

                <div class="flex flex-row xs:gap-6 md:gap-[42px] mt-2 items-center justify-center w-full">
                    <button type="button" onclick="openModalTopup(false)" name="Batal-topup" id="Batal-topup" value="Batal-topup" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl shadow-elevation-light-2 hover:bg-error_300 focus:bg-error_800"">
                        Batal
                    </button>
                    <button type="submit" name="Konfirmasi-topup" id="Konfirmasi-topup" class="bg-[#4FCF2F] shadow-elevation-light-2  hover:bg-[#81FF62] focus:bg-[#4FCF2F]/80 text-neutral_050 w-5/12 h-12 rounded-2xl">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- modal Sewa tambah end -->
<script>
    const modal_overlay_topup = document.querySelector('#modal_overlay_topup');
    const modal_topup = document.querySelector('#modal_topup');
    const topupUser = document.querySelectorAll('#topupUser');
    const prevuser = document.getElementById('preview-user');
    const id_user = document.getElementById('id-user');
    const email_user = document.getElementById('email-user');
    const topup = document.getElementById('topup');
    const form_topup = document.getElementById('form_topup');

    form_topup.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = email_user.value;
        const jumlah_topup = topup.value;
        const data = {
            email,
            jumlah_topup
        }
        console.log(data);

        var xhr = new XMLHttpRequest();
        var url = "..\\..\\..\\isitopup.php";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var json = JSON.parse(xhr.responseText);
                if (json.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Berhasil Topup ke ' + email + ' sejumlah ' + jumlah_topup + '',
                        timer: 1500,
                        showConfirmButton: false,
                        timer: 1000,
                        //open modals false dan reload
                        didOpen: () => {
                            setTimeout(() => {
                                openModalTopup(false);
                            }, 1500);
                            setTimeout(() => {
                                location.reload();
                            }, 1600);
                        },

                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Topup ke ' + email + ' sejumlah ' + jumlah_topup + '',
                        timer: 1500,
                        showConfirmButton: false,
                         timer: 1000,
                         //open modals false dan reload
                            didOpen: () => {
                                setTimeout(() => {
                                    openModalTopup(false);
                                }, 1500);
                                setTimeout(() => {
                                    location.reload();
                                }, 1600);
                            },

                    })
                }
            }
        };
        var datatopup = JSON.stringify({
            "email": email,
            "jumlah_topup": jumlah_topup
        });
        xhr.send(datatopup);
    })

    const openModalTopup = (value) => {
        const ModalClTopup = modal_topup.classList
        const overlayClTopup = modal_overlay_topup

        if (value) {
            overlayClTopup.classList.remove('hidden')
            setTimeout(() => {
                ModalClTopup.remove('opacity-0')
                ModalClTopup.remove('-translate-y-full')
                ModalClTopup.remove('scale-150')
            }, 100);
        } else {
            ModalClTopup.add('-translate-y-full')
            setTimeout(() => {
                ModalClTopup.add('opacity-0')
                ModalClTopup.add('scale-150')
            }, 100);
            setTimeout(() => overlayClTopup.classList.add('hidden'), 300);
        }
    }
    openModalTopup(false)

    topupUser.forEach((topupUser) => {
        topupUser.addEventListener('click', () => {
            openModalTopup(true)
            const id = topupUser.value;
            email_user.value = id;
            var xhr = new XMLHttpRequest();
            var url = "..\\..\\..\\getimguser.php";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    console.log(json.status + ", " + json.username + ", " + json.level + ", " + json.lokasi + ", " + json.img + ", " + json.id_user);
                    prevuser.src = 'img/user/images/'+json.id+'/'+json.img;
                }
            };
            var data = JSON.stringify({
                "id": id
            });
            xhr.send(data);

        })
    })
    topup.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        topup.value = formatRupiah(this.value, "Rp. ");
    });


    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
    }
</script>