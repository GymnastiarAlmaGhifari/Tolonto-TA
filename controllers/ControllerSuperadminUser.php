<?php
// Include Database.php file
include_once 'Database.php';

// Create a class Users


class ControllerSuperadminUser extends Database 
{
    public function jumlah_user()
{
    $data = $this->countsemua('user_id', 'user');
    $jumlah=$data['COUNT(user_id)'];
    if ($jumlah != 0) return $jumlah;
        else return "0";
}

public function table_admin()
{
    $sql = 'SELECT manage.id_admin, manage.username, level.role, manage.lok, manage.img 
    FROM manage JOIN level ON manage.level = level.id_level ;' ;
    return $this->uniquery($sql);
}
}