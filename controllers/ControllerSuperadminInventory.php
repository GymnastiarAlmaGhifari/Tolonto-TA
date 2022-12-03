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
    public function ps_card()
{
    $data = $this->fetchsemua('*', 'ps');
    return $data;
}

}