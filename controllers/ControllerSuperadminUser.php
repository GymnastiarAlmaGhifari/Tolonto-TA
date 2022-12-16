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
        $sql = 'SELECT manage.id_admin, manage.username, level.role, manage.lok, manage.img 
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

        $data = $this->insert('manage', $fields);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_admin($id)
    {
        $data = $this->hapus_admin('manage', 'id_admin', $id);
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
}
