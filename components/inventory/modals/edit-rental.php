<?php
if (isset($_POST['Konfirmasi-rental-edit'])) {

    $namaFile = $_FILES['image-rental-edit']['name'];
    $fileNameParts = explode('.', $namaFile);
    $ext = end($fileNameParts);
    $namaSementara = $_FILES['image-rental-edit']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    // create folder if not exist
    if (!file_exists('img/ps')) {
        mkdir('img/ps', 0777, true);
    }
    $dirUpload = "img/ps/";
    // genearete datetimestamp
    $filename = $_POST['id-rental-edit'] . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {

        echo "Link: <a href='" . $dirUpload . $filename . "'>" . $filename . "</a>";
        if ($SadminPs->update_psrental(
            [
                'nama_ps' => $_POST['nama-ps-rental-edit'],
                'harga' => Rupiah::clear($_POST['harga-ps-rental-edit']),
                'jenis' => $_POST['kategori-ps-rental-edit'],
                'img' => $dirUpload . $filename
            ],
            $_POST['id-rental-edit']
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventory.php'</script>";
        } else {
            //error
        }
    } else {

        if ($SadminPs->update_psrental(
            // rubah harga dengan Rupiah::clear
            [
                'nama_ps' => $_POST['nama-ps-rental-edit'],
                'harga' => Rupiah::clear($_POST['harga-ps-rental-edit']),
                'jenis' => $_POST['kategori-ps-rental-edit'],

            ],
            $_POST['id-rental-edit']
        )) // jika berhasil refresh page tanpa submit ulang
        {
            echo "<script>location.href='inventory.php'</script>";
        } else {
            //error
        }
    }
}
?>
<!-- modal Rental edit start -->
<section>
    <div id="modal_overlay_rental_edit" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0 z-50">
        <!-- modal -->
        <div id="modal_rental_edit" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[520px] w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <div class="flex flex-row justify-start ml-[25px]  gap-3 mb-3">
                <svg width="21" height="24" viewBox="0 0 21 24" class="my-auto" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.28571 0C1.01714 0 0 1.01714 0 2.28571V20.5714C0 21.1776 0.240816 21.759 0.66947 22.1877C1.09812 22.6163 1.67951 22.8571 2.28571 22.8571H6.85714V20.6743L9.24572 18.2857H2.28571V16H11.5314L13.8171 13.7143H2.28571V11.4286H16.1029L18.2857 9.24572V6.85714L11.4286 0H2.28571ZM10.2857 1.71429L16.5714 8H10.2857V1.71429ZM18.4571 12.5714C18.2857 12.5714 18.1257 12.6286 18 12.7543L16.8343 13.92L19.2229 16.2971L20.3886 15.1429C20.6286 14.8914 20.6286 14.48 20.3886 14.24L18.9029 12.7543C18.7771 12.6286 18.6171 12.5714 18.4571 12.5714ZM16.16 14.5943L9.14286 21.6229V24H11.52L18.5486 16.9714L16.16 14.5943Z" fill="#FAFAFA" />
                </svg>
                <h1 id="mdoalText" class="text-neutral_050 font-base font-noto-sans text-xl">Edit PlayStation Rental</h1>
            </div>
            <span class="w-11/12 h-0.5 mx-auto -mt-4 bg-neutral_600"></span>
            <form action="inventory.php" method="post" class="flex flex-col items-center justify-center gap-4 mt-2" enctype="multipart/form-data">
                <!-- gambar start -->
                <input type="hidden" name="id-rental-edit" id="id-rental-edit">
                <div class="flex flex-col justify-center items-center relative">
                    <!-- show previe image from Upload::uploadimage() -->
                    <img src="components/kamera.png" alt="" id="preview-rental-edit" class="w-[100px] h-[100px] object-cover rounded-full shadow-elevation-dark-4 bg-transparent">
                    <label>
                        <input class="text-sm cursor-pointer w-36 hidden" accept="image/*" type="file" name="image-rental-edit" id="image-rental-edit" />
                        <div class="cursor-pointer rounded-full bg-primary_400 w-[35px] h-[35px] flex flex-row justify-center items-center absolute  bottom-1 -right-1.5">
                            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3V0H5V3H8V5H5V8H3V5H0V3M6 9V6H9V3H16L17.8 5H21C22.1 5 23 5.9 23 7V19C23 20.1 22.1 21 21 21H5C3.9 21 3 20.1 3 19V9M13 18C17.45 18 19.69 12.62 16.54 9.46C13.39 6.31 8 8.55 8 13C8 15.76 10.24 18 13 18ZM9.8 13C9.8 15.85 13.25 17.28 15.26 15.26C17.28 13.25 15.85 9.8 13 9.8C11.24 9.8 9.8 11.24 9.8 13Z" fill="black" />
                            </svg>
                        </div>
                    </label>
                </div>
                <!-- gambar end -->

                <div class="relative z-0 w-11/12 mt-5">
                    <input type="text" id="nama-ps-rental-edit" name="nama-ps-rental-edit" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 valid:text-neutral_500 peer" placeholder=" " />
                    <label for="nama-ps-rental-edit" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Nama PS</label>
                    <svg width="30" height="24" class="absolute top-4 left-5" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27 0C27.7956 0 28.5587 0.31607 29.1213 0.87868C29.6839 1.44129 30 2.20435 30 3V21C30 21.7956 29.6839 22.5587 29.1213 23.1213C28.5587 23.6839 27.7956 24 27 24H3C2.20435 24 1.44129 23.6839 0.87868 23.1213C0.31607 22.5587 0 21.7956 0 21V3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.31607 2.20435 0 3 0H27ZM13.5 13.5H10.5V16.5H13.5V13.5ZM25.5 13.5H16.5V16.5H25.5V13.5ZM7.5 7.5H4.5V10.5H7.5V7.5ZM25.5 7.5H10.5V10.5H25.5V7.5Z" fill="#303030" />
                    </svg>
                </div>
                <div class="relative z-0 w-11/12">
                    <input type="text" id="harga-ps-rental-edit" name="harga-ps-rental-edit" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 pl-16 peer" placeholder=" " />
                    <label for="harga-ps-rental-edit" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-16 peer-focus:left-16 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Harga PS</label>
                    <svg width="14" height="24" class="absolute top-4 left-7" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#303030" />
                    </svg>
                </div>
                <div class="relative z-0 w-11/12 ">
                    <svg width="14" height="24" class="absolute top-4 left-7" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.12 20.2267L1.89333 16L0.0133336 17.88L6.12 24L12.24 17.88L10.3467 16M6.12 3.77333L10.3467 8L12.2267 6.12L6.12 0L0 6.12L1.89333 8L6.12 3.77333Z" fill="black" />
                    </svg>
                    <select name="kategori-ps-rental-edit" id="kategori-ps-rental-edit" required class="select select-bordered font-normal py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-16  pr-3 ">
                        <option value="" class="text-neutral_500 text-base" hidden>Pilih Kategori PS</option>
                        <option id="option" value="PS1" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 1</option>
                        <option id="option" value="PS2" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 2</option>
                        <option id="option" value="PS3" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 3</option>
                        <option id="option" value="PS4" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 4</option>
                        <option id="option" value="PS5" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">PS 5</option>
                    </select>
                    <i id="arrow_rental_edit" class="fa-solid fa-caret-down fa-2x absolute right-4 mt-3"></i>

                </div>

                <div class="flex flex-row gap-11 mt-2 items-center justify-center w-full">
                    <button type="button" onclick="openModalRentalEdit(false)" name="batal-rental-edit" id="batal-rental-edit" value="batal-rental-edit" class="bg-error_600 text-neutral_050 w-5/12 h-12 rounded-2xl px-4">
                        Batal
                    </button>
                    <button type="submit" name="Konfirmasi-rental-edit" id="Konfirmasi-rental-edit" class="bg-[#4FCF2F] text-neutral_050 w-5/12 h-12 rounded-2xl px-4">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- modal_rental edit  end -->

<script>
    const modal_overlay_rental_edit = document.querySelector('#modal_overlay_rental_edit');
    const modal_rental_edit = document.querySelector('#modal_rental_edit');
    const editRental = document.querySelectorAll('#editRental');
    const kategori_ps_rental_edit = document.querySelector('#kategori-ps-rental-edit');
    const arrow_rental_edit = document.querySelector('#arrow_rental_edit');
    const imginp_rental_edit = document.getElementById('image-rental-edit');
    const prev_rental_edit = document.getElementById('preview-rental-edit');
    const id_rental_edit = document.getElementById('id-rental-edit');
    const nama_rental_edit = document.getElementById('nama-ps-rental-edit');
    const harga_rental_edit = document.getElementById('harga-ps-rental-edit');



    const openModalRentalEdit = (value) => {
        const modalClRentalEdit = modal_rental_edit.classList
        const overlayClRentalEdit = modal_overlay_rental_edit

        if (value) {
            overlayClRentalEdit.classList.remove('hidden')
            setTimeout(() => {
                modalClRentalEdit.remove('opacity-0')
                modalClRentalEdit.remove('-translate-y-full')
                modalClRentalEdit.remove('scale-150')
            }, 100);
        } else {
            modalClRentalEdit.add('-translate-y-full')
            setTimeout(() => {
                modalClRentalEdit.add('opacity-0')
                modalClRentalEdit.add('scale-150')
            }, 100);
            setTimeout(() => overlayClRentalEdit.classList.add('hidden'), 300);
        }
    }
    openModalRentalEdit(false)

    editRental.forEach((editRental) => {
        editRental.addEventListener('click', () => {
            openModalRentalEdit(true)
            const id = editRental.value

            var xhr = new XMLHttpRequest();
            // path getuser.php in main dir
            var url = "..\\..\\..\\getps.php";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    console.log(json.status + ", " + json.id_ps + ", " + json.nama_ps + ", " + json.harga_ps + ", " + json.kategori + ", " + json.img);
                    nama_rental_edit.value = json.nama_ps;
                    harga_rental_edit.value = json.harga_ps;
                    kategori_ps_rental_edit.value = json.kategori;
                    prev_rental_edit.src = json.img;
                    id_rental_edit.value = json.id_ps;
                    harga_rental_edit.value = formatRupiah(this.value, 'Rp. ');
                }
            };
            var data = JSON.stringify({
                "id": id,
                "table": "ps"
            });
            xhr.send(data);
            console.log(id)
        })
    })


    // if kategori_ps_rental_edit is clicked and dropdown is rotated 180deg if target not equal to kategori_ps_rental_edit 
    kategori_ps_rental_edit.addEventListener('click', (e) => {
        if (e.target === kategori_ps_rental_edit && !arrow_rental_edit.classList.contains('rotate-180')) {
            arrow_rental_edit.classList.toggle('rotate-180');
            arrow_rental_edit.classList.toggle('transition');
            arrow_rental_edit.classList.toggle('ease-in-out');
        } else if (e.target === kategori_ps_rental_edit && arrow_rental_edit.classList.contains('rotate-180')) {
            arrow_rental_edit.classList.toggle('rotate-180');
            arrow_rental_edit.classList.toggle('transition');
            arrow_rental_edit.classList.toggle('ease-in-out');
        }
    });

    imginp_rental_edit.onchange = evt => {
        const [file_rental] = imginp_rental_edit.files
        if (file_rental) {
            //if size is more than 2mb alert
            if (file_rental.size > 2000000) {
                alert('ukuran file maksimal 2mb');
                imginp_rental_edit.value = '';
                return false;
            } else if (file_rental.type != 'image/jpeg' && file_rental.type != 'image/png' && file_rental.type != 'image/jpg') {
                alert('type file harus .jpg .png .jpeg');
                imginp_rental_edit.value = '';
                return false;
            } else {
                prev_rental_edit.src = URL.createObjectURL(file_rental)
                //rename file to datetimenow and save to folder
                console.log(file_rental);
            }
        }
    }

    harga_rental_edit.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        harga_rental_edit.value = formatRupiah(this.value, "Rp. ");
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