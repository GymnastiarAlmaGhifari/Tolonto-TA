<?php
// Include Database.php file
include_once 'Database.php';

// Create a class Users


class ControllerSuperadminUser extends Database
{
    public function lokasi()
    {
        $data = $this->fetchsemua('id_loc', 'lokasi');
        return $data;
    }

    public function jumlah_user()
    {
        $data = $this->countsemua('user_id', 'user');
        $jumlah = $data['COUNT(user_id)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function jumlah_admin()
    {
        $data = $this->countsemua('id_admin', 'manage');
        $jumlah = $data['COUNT(id_admin)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }


    public function table_admin()
    {
        $sql = 'SELECT manage.id_admin, manage.username, level.role, manage.lok, manage.img, manage.create_at, manage.update_at 
        FROM manage JOIN level ON manage.level = level.id_level ;';
        return $this->uniquery($sql);
    }

    public function table_user()
    {
        return $this->fetchsemua('*', 'user');
    }

    public function idadmin()
    //buat id admin dengan generate 8 random string and loop 1 time if exist in db
    {
        $id = $this->RandomString(8);
        $sql = "SELECT id_admin FROM manage WHERE id_admin = '$id'";
        $data = $this->uniquery($sql);
        if ($data) {
            $this->idadmin();
        } else {
            return $id;
        }
    }

    public function add_admin($fields = [])
    {

        if ($this->insert('manage', $fields)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_admin($id)
    {
        $data = $this->delete('manage', 'id_admin', $id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchadmin($id)
    {
        $data = $this->fetch('manage', 'id_admin', $id);
        return $data;
    }

    public function fetchnameadmin($id)
    {
        $data = $this->fetch('manage', 'username', $id);
        return $data;
    }

    public function update_admin($fields = [], $val)
    {
        $data = $this->update('manage', 'id_admin', $val, $fields);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_img($id)
    {
        $data = $this->fetch('manage', 'id_admin', $id);
        return $data['img'];
    }

    public function fetch_user($id)
    {
        $data = $this->fetch('user', 'email', $id);
        return $data;
    }

    public function idtopup()
    //sql untuk select max dengan format TP-001-171222 kemudian +1 if data kosong maka 001
    {
        $tgl = date('dmy');
        $sql = "SELECT MAX(id_topup) AS id_topup FROM topup WHERE id_topup LIKE '%$tgl%' ORDER BY id_topup DESC";
        $data = $this->uniquery($sql);
        if ($data[0]['id_topup'] == null) {
            $id = "TP-001-$tgl";
            return $id;
        } else {
            $id = $data[0]['id_topup'];
            $id = substr($id, 3, 3);
            $id = (int)$id;
            $id = $id + 1;
            $id = str_pad($id, 3, '0', STR_PAD_LEFT);
            $id = "TP-$id-$tgl";
            return $id;
        }
    }

    public function add_topup($fields = [])
    {

        $data = $this->insert('topup', $fields);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

}
