<?php
// Include Database.php file
include_once 'Database.php';

class ControllerServis extends Database
{
    public function h_servis($lok)
    {
        $sql = "SELECT user.username, user.img, servis.id_servis, servis.nama_barang, servis.kerusakan, servis.waktu_submit, servis.status, servis.est_selesai 
        FROM `servis` JOIN user ON servis.id_user = user.user_id WHERE servis.lok = '$lok' ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_servis($lok)
    {
        $data = $this->count('id_servis', 'servis', 'lok', $lok);
        $jumlah = $data['COUNT(id_servis)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }
}
