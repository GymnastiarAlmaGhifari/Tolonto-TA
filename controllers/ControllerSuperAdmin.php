<?php
// Include Database.php file
include_once 'Database.php';

// Create a class Users


class ControllerSuperAdmin extends Database
{

    public function ps_tersedia($lok)
    {
        $data = $this->count('id_ps', 'ps', 'lok', $lok);
        $jumlah = $data['COUNT(id_ps)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function ps_maintain()
    {
        $data = $this->count('id_ps', 'ps', 'status', 'maintenance');
        $jumlah = $data['COUNT(id_ps)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function ps_book()
    {
        $tgl = date("dmy");
        $data = $this->counttgl('id_rental', 'rental', 'id_rental', $tgl);
        $jumlah = $data['COUNT(id_rental)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function lokasi()
    {
        $data = $this->fetchsemua('id_loc', 'lokasi');
        return $data;
    }

    public function laba()
    {
        $tgl = date("dmy");
        $data = $this->sum('bayar', 'rental', 'id_rental', $tgl);
        $jumlah = $data['SUM(bayar)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function ps_card($lok)
    {
        //   $lok = "Bojonegoro";
        $data = $this->card_ps($lok);
        return $data;
    }

    public function is_active($id_ps)
    {
        $idps = $id_ps;
        $data = $this->is_aktif($idps);
        return $data;
    }

    public function count_rent($lok)
    {
        $sql = "SELECT COUNT(id_rental) as jrent FROM `rental` WHERE lok = '$lok' AND rental.status = 'incoming' ;";
        $data = $this->uniquerycount($sql);
        $jumlah=$data['jrent'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function count_sewa($lok)
    {
        $sql = "SELECT COUNT(id_sewa) as jsewa FROM `sewa` WHERE lok = '$lok' AND sewa.status = 'pending' ;";
        $data = $this->uniquerycount($sql);
        $jumlah=$data['jsewa'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function listnotif_rental($lok)
    {
        $sql = "SELECT user.username, rental.id_rental AS id, ps.nama_ps, rental.status, rental.waktu_order, rental.playtime 
        FROM `rental` JOIN user ON rental.id_user = user.user_id JOIN ps ON rental.id_ps = ps.id_ps 
        WHERE rental.lok = '$lok' AND rental.status = 'incoming' ORDER BY rental.waktu_order DESC ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function listnotif_sewa($lok)
    {
        $sql = "SELECT user.username, sewa.id_sewa AS id, ps_sewa.nama_ps, sewa.status, sewa.waktu_order, sewa.playtime
        FROM `sewa` JOIN user ON sewa.id_user = user.user_id JOIN ps_sewa ON sewa.id_ps = ps_sewa.id_ps 
        WHERE sewa.lok = '$lok' AND sewa.status = 'pending' ORDER BY sewa.waktu_order DESC ;";
        $data = $this->uniquery($sql);
        return $data;
    }

}
