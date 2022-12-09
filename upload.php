<?php

// ambil data file
$namaFile = $_FILES['image']['name'];
$namaSementara = $_FILES['image']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "img/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
} else {
    echo "Upload Gagal!";
}

?>