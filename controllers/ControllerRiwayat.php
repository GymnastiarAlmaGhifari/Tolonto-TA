<?php
// Include Database.php file
include_once 'Database.php';

class ControllerRiwayat extends Database
{
    public function h_rental($lok) 
    {
        $sql = "SELECT user.username, user.img, rental.id_rental, ps.nama_ps, rental.waktu_order, rental.playtime, rental.mulai_rental,
        rental.selesai_rental, rental.bayar FROM `rental` JOIN user ON rental.id_user = user.user_id
        JOIN ps ON rental.id_ps = ps.id_ps WHERE rental.lok = '$lok';";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_rent($lok)
    {
        $data = $this->count('id_rental', 'rental', 'lok', $lok);
        $jumlah=$data['COUNT(id_rental)'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function h_sewa($lok) 
    {
        $sql = "SELECT user.username, user.img, sewa.id_sewa, ps.nama_ps, sewa.status, sewa.waktu_order, sewa.playtime, sewa.mulai_sewa,
        sewa.akhir_sewa, sewa.bayar FROM `sewa` JOIN user ON sewa.id_user = user.user_id
        JOIN ps ON sewa.id_ps = ps.id_ps WHERE sewa.lok = '$lok' ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_sewa($lok)
    {
        $data = $this->count('id_sewa', 'sewa', 'lok', $lok);
        $jumlah=$data['COUNT(id_sewa)'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }
}
