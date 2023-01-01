<?php
// Include Database.php file
include_once 'Database.php';

class ControllerServis extends Database
{
    public function h_servis($lok)
    {
        $sql = "SELECT user.username, user.img, user.user_id, servis.id_servis, servis.nama_barang, servis.kerusakan, servis.waktu_submit, servis.status, servis.est_selesai 
        FROM `servis` JOIN user ON servis.id_user = user.user_id WHERE servis.lok = '$lok' AND (servis.status = 'pending' OR servis.status = 'progress') ORDER BY servis.waktu_submit DESC ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_servis($lok)
    {
        $sql = "SELECT COUNT(id_servis) FROM servis WHERE servis.lok = '$lok' AND (servis.status = 'pending' OR servis.status = 'progress') ;  ";
        $data = $this->uniquery($sql);
        $jumlah = $data[0]['COUNT(id_servis)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function fetch_servis($id)
    {

        $data = $this->fetch('servis', 'id_servis', $id);
        return $data;
    }

    public function fetch_servis_adm($id)
    {

        $data = $this->fetch('servis_adm', 'id_servis', $id);
        return $data;
    }

    public function fetch_user($id)
    {

        $data = $this->fetch('user', 'user_id', $id);
        return $data;
    }

    public function update_admservis($fields = [], $val)
    {
        $data = $this->update('servis_adm', 'id_servis', $val, $fields);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function update_servis($fields = [], $val)
    {
        $data = $this->update('servis', 'id_servis', $val, $fields);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
