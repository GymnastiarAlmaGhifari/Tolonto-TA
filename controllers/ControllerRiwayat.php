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
        $jumlah = $data['COUNT(id_rental)'];
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
        $jumlah = $data['COUNT(id_sewa)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function h_servis($lok)
    {
        $sql = "SELECT user.username, user.img, servis.id_servis, servis.nama_barang, servis.status, servis.kerusakan, servis.detail,
        servis.est_selesai, servis_adm.bayar, servis_adm.perbaikan, servis_adm.update_time FROM `servis` JOIN user ON servis.id_user = user.user_id
        JOIN servis_adm ON servis.id_servis = servis_adm.id_servis WHERE servis.lok = '$lok' ;";
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

    public function h_topup()
    {
        $sql = "SELECT user.username, user.img, user.email, topup.id_topup, topup.waktu, topup.jml_topup, manage.username AS admin 
        FROM `topup` JOIN user ON topup.id_user = user.user_id JOIN manage ON topup.id_admin = manage.id_admin ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_topup()
    {
        $data = $this->countsemua('id_topup', 'topup');
        $jumlah = $data['COUNT(id_topup)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }
}
