<?php
// Include Database.php file
include_once 'Database.php';

class ControllerRiwayat extends Database
{
    public function h_rental() 
    {
        $sql = "SELECT user.username, user.img, rental.id_rental, ps.nama_ps, rental.waktu_order, rental.playtime, rental.mulai_rental,
        rental.selesai_rental, rental.bayar FROM `rental` JOIN user ON rental.id_user = user.user_id
        JOIN ps ON rental.id_ps = ps.id_ps ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_rent()
    {
        $data = $this->countsemua('id_rental', 'rental');
        $jumlah=$data['COUNT(id_rental)'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }
}
