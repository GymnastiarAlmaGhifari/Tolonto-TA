<?php
// Include Database.php file
include_once 'Database.php';

// Create a class Users

class Controller extends Database
{
    public function login($username, $password)
    {
        $data = $this->fetch('manage', 'username', $username);
        if ($data['password'] == $password) {
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

    public function is_login1()
    {
        if (Session::exists('email')) {
            return true;
        } else {
            return false;
        }
    }

    // Fetch all or a single user from database
    // public function fetch($id = 0)
    // {
    //     $sql = 'SELECT * FROM manage';
    //     if ($id != 0) {
    //         $sql .= ' WHERE id = :id';
    //     }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['id' => $id]);
    //     $rows = $stmt->fetchAll();
    //     return $rows;
    // }

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

    // api login
    public function loginApi($email, $password)
    {
        $data = $this->fetch('user', 'email', $email);
        if ($data['password'] == $password) {
            $_SESSION['password'] = $data['password'];
            return true;
        } else {
            return false;
        }
    }

    // insert cookie
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


    public function register($username, $password)
    {
        $data = $this->insert('manage', 'username', $username, 'password', $password);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    // reg

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


    // Insert an user in the database
    // public function insert($name, $email, $phone)
    // {
    //     $sql = 'INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)';
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);
    //     return true;
    // }


    // Update an user in the database
    // public function update($name, $email, $phone, $id)
    // {
    //     $sql = 'UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id';
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'id' => $id]);
    //     return true;
    // }

    // Delete an user from database
    public function delete($id)
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }
}
