<?php
// Include Database.php file
include_once 'Database.php';

class ControllerBooking extends Database
{
    public function b_rental($lok) 
    {
        $sql = "SELECT user.username, user.img, rental.id_rental, ps.nama_ps, rental.waktu_order, rental.playtime, rental.mulai_rental,
        rental.selesai_rental, rental.bayar FROM `rental` JOIN user ON rental.id_user = user.user_id
        JOIN ps ON rental.id_ps = ps.id_ps WHERE rental.lok = '$lok' AND rental.selesai_rental >= NOW() ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_rent($lok)
    {
        $sql = "SELECT COUNT(id_rental) as jrent FROM `rental` WHERE lok = '$lok' AND selesai_rental >= NOW() ;";
        $data = $this->uniquerycount($sql);
        $jumlah=$data['jrent'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function b_sewa($lok) 
    {
        $sql = "SELECT user.username, user.img, sewa.id_sewa, ps.nama_ps, sewa.status, sewa.waktu_order, sewa.playtime, sewa.mulai_sewa,
        sewa.akhir_sewa, sewa.bayar FROM `sewa` JOIN user ON sewa.id_user = user.user_id
        JOIN ps ON sewa.id_ps = ps.id_ps WHERE sewa.lok = '$lok' AND sewa.akhir_sewa >= NOW() ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_sewa($lok)
    {
        $sql = "SELECT COUNT(id_sewa) as jsewa FROM `sewa` WHERE lok = '$lok' AND akhir_sewa >= NOW() ;";
        $data = $this->uniquerycount($sql);
        $jumlah=$data['jsewa'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

}