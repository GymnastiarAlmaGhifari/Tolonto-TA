<?php
// Include Database.php file
include_once 'Database.php';

// Create a class Users


class ControllerSuperAdmin extends Database 
{
    
public function ps_tersedia()
{
    $data = $this->count('id_ps', 'ps', 'status', 'tidak aktif');
    $jumlah=$data['COUNT(id_ps)'];
    if ($jumlah != 0) return $jumlah;
        else return "0";
}

public function ps_maintain()
    {
        $data = $this->count('id_ps', 'ps', 'status', 'maintenance');
        $jumlah=$data['COUNT(id_ps)'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function ps_book()
    {
        $tgl = date("dmy");
        $data = $this->counttgl('id_rental', 'rental', 'id_rental', $tgl);
        $jumlah=$data['COUNT(id_rental)'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function lokasi()
    {
        $data = $this->fetchsemua('nama_lok', 'lokasi');
        return $data;
    }

    public function laba()
    {
        $tgl = date("dmy");
        $data = $this->sum('bayar', 'rental', 'id_rental', $tgl);
        $jumlah=$data['SUM(bayar)'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function ps_card()
    {
        $lok = "Bojonegoro";
        $data = $this->card_ps($lok);
    return $data;
    }

    public function is_active($id_ps)
    {
        $idps = $id_ps;
        $data = $this->is_aktif($idps);
    return $data;
    }

}