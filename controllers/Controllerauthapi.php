<?php
// Include Database.php file
include_once 'Database.php';

// Create a class Users

class Controllerauthapi extends Database
{
    public function cek_nama1($username)
    {
        $data = $this->fetch('user', 'email', $username);
        if (empty($data)) return false;
        else return true;
    }

    public function get_data1($username)
    {
        if ($this->cek_nama1($username)) {
            $data = $this->fetch('user', 'email', $username);
            // delete password
            unset($data['password']);
            return $data;
        } else {
            return false;
        }
    }

    public function loginApi($email, $password)
    {
        $data = $this->fetch('user', 'email', $email);
        if ($data['pass word'] == $password) {
            $_SESSION['password'] = $data['password'];
            return true;
        } else {
            return false;
        }
    }

    public function register_api($fields = [])
    {
        $data = $this->insert('user', $fields);
        if ($data) {
            // set $data create at and update at date time 
            return true;
        } else {
            return false;
        }
    }

    public function cookie($email, $kukis)
    {

        // $data = $this->update('user', 'email', $email, 'cookies', $kukis);
        // if ($data) {
        //     return true;
        // } else {
        //     return false;
        // }

        // $data = $this->insert('user', 'cookies', $kukis);
        // return $data;
        // $data = $this->user('user', 'email', $email);
        // if ($data['cookies'] != $kukis) {

        $sql = 'UPDATE user SET cookies = :kukis WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'kukis' => $kukis]);
        return true;
        // } else {
        //     return false;
        // }
    }

    // sendCookie
    public function sendCookie($cookie)
    {
        $data = $this->fetch('user', 'cookies', $cookie);
        if ($data['cookies'] == $cookie) {
            return $data['email'];
        } else {
            return false;
        }
    }



    // cek cookie
    public function cek_cookie($email)
    {
        if (Cookie::exists('kukis')) {
            $data = $this->fetch('user', 'email', $email);
            if ($data['cookies'] == Cookie::get('kukis')) {
                return $data['cookies'];
            } else {
                return false;
            }
        }
    }
}
