<?php
// Include Database.php file
include_once 'Database.php';

// Create a class Users

class Controllerauth extends Database
{
    public function login($username, $password)
    {
        $data = $this->fetch('manage', 'username', $username);
        if (password_verify($password, $data['password'])) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_nama($username)
    {
        $data = $this->fetch('manage', 'username', $username);
        if (empty($data)) return false;
        else return true;
    }

    public function get_data($username)
    {
        if ($this->cek_nama($username)) {
            return $this->fetch('manage', 'username', $username);
        } else {
            return false;
        }
    }

    public function is_login()
    {
        if (Session::exists('username')) {
            return true;
        } else {
            return false;
        }
    }

    public function is_superAdmin($username)
    { // pengecekan level user dengan role di database;
        $data = $this->fetch('manage', 'username', $username);
        if ($data['level'] == 1) return true;
        else return false;
    }

    public function get_users()
    {
        return $this->fetch('manage');
    }


    public function register($username, $password)
    {
        $data = $this->insert('manage', 'username', $username, 'password', $password);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchuser($id)
    {
        return $this->fetch('user', 'user_id', $id);
    }

}
