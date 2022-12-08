<?php

include_once 'Database.php';

// Create a class Users


class ControllerSuperadminInventory extends Database 
{
    public function jumlah_ps($lok)
{
    $data = $this->count('id_ps', 'ps', 'lok', $lok);
    $jumlah=$data['COUNT(id_ps)'];
    if ($jumlah != 0) return $jumlah;
        else return "0";
}

public function jumlah_pssewa($lok)
{
    $data = $this->count('id_ps', 'ps', 'lok', $lok);
    $jumlah=$data['COUNT(id_ps)'];
    if ($jumlah != 0) return $jumlah;
        else return "0";
}

    public function ps_card($lok)
{
    $data = $this->fetchwhere( 'ps', 'lok', $lok);
    return $data;
}

public function ps_cardsewa($lok)
{
    $data = $this->fetchwhere( 'ps_sewa', 'lok', $lok);
    return $data;
}

public function add_rental($id_ps, $nama_ps, $status, $lok, $harga, $img)
{
    $data = $this->insert('ps', 'id_ps', $id_ps, 'nama_ps', $nama_ps, 'status', $status, 'lok', $lok, 'harga', $harga, 'img', $img);
    if ($data) {
        return true;
    } else {
        return false;
    }
}

}