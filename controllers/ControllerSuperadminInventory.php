<?php

include_once 'Database.php';

// Create a class Users


class ControllerSuperadminInventory extends Database 
{
    public function jumlah_ps()
{
    $data = $this->count('id_ps', 'ps', 'lok', 'Bojonegoro');
    $jumlah=$data['COUNT(id_ps)'];
    if ($jumlah != 0) return $jumlah;
        else return "0";
}

public function jumlah_pssewa()
{
    $data = $this->count('id_ps', 'ps', 'lok', 'Bojonegoro');
    $jumlah=$data['COUNT(id_ps)'];
    if ($jumlah != 0) return $jumlah;
        else return "0";
}

    public function ps_card()
{
    $data = $this->fetchsemua('*', 'ps');
    return $data;
}

public function ps_cardsewa()
{
    $data = $this->fetchsemua('*', 'ps_sewa');
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