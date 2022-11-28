<?php
// Include Database.php file
include_once 'Database.php';

// Create a class Users

class Controllerauth extends Database
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


    // insert cookie



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
