<?php

include_once 'Database.php';

// Create a class Users


class ControllerSuperadminInventory extends Database
{
    public function jumlah_ps($lok)
    {
        $data = $this->count('id_ps', 'ps', 'lok', $lok);
        $jumlah = $data['COUNT(id_ps)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function jumlah_pssewa($lok)
    {
        $data = $this->count('id_ps', 'ps', 'lok', $lok);
        $jumlah = $data['COUNT(id_ps)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function ps_card($lok)
    {
        $data = $this->fetchwhere('ps', 'lok', $lok);
        return $data;
    }

    public function ps_cardsewa($lok)
    {
        $data = $this->fetchwhere('ps_sewa', 'lok', $lok);
        return $data;
    }

    public function add_rental($fields = [])
    {
        $data = $this->insert('ps', $fields);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function add_sewa($fields = [])
    {
        $data = $this->insert('ps_sewa', $fields);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function idps($lok)
    //sql untuk select max dengan format bjn-001 kemudian +1 if data kosong maka 001
    {
        $sql = "SELECT MAX(id_ps) AS id_ps FROM ps WHERE id_ps LIKE '%$lok%' ORDER BY id_ps DESC";
        $data = $this->uniquery($sql);
        $id = $data[0]['id_ps'];
        if ($id == null) {
            $id = $lok . "-001";
            return $id;
        } else {
            $id = $data[0]['id_ps'];
            $id = substr($id, 4, 7);
            $id = (int) $id;
            $id = $id + 1;
            $id = $lok . "-" . sprintf("%03s", $id);
            return $id;
        }
        
    }

    public function idps_sewa($lok)
    //sql untuk select max dengan format sewa-bjn-001 kemudian +1 if data kosong maka 001
    {
        $sql = "SELECT MAX(id_ps) AS id_ps FROM ps_sewa WHERE id_ps LIKE '%$lok%' ORDER BY id_ps DESC";
        $data = $this->uniquery($sql);
        $id = $data[0]['id_ps'];
        if ($id == null) {
            $id = "sewa-" . $lok . "-001";
            return $id;
        } else {
            $id = $data[0]['id_ps'];
            $id = substr($id, 9, 7);
            $id = (int) $id;
            $id = $id + 1;
            $id = "sewa-" . $lok . "-" . sprintf("%03s", $id);
            return $id;
        }
        
    }
}
