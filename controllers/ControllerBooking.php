<?php
// Include Database.php file
include_once 'Database.php';

class ControllerBooking extends Database
{
    public function b_rental($lok) 
    {
        $sql = "SELECT user.username, user.img, rental.id_rental, ps.nama_ps, rental.status, rental.waktu_order, rental.playtime, rental.mulai_rental,
        rental.selesai_rental, rental.payment_method, rental.bayar FROM `rental` JOIN user ON rental.id_user = user.user_id
        JOIN ps ON rental.id_ps = ps.id_ps WHERE rental.lok = '$lok' AND (rental.status = 'incoming' OR rental.status = 'ongoing') ORDER BY rental.waktu_order DESC ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_rent($lok)
    {
        $sql = "SELECT COUNT(id_rental) as jrent FROM `rental` WHERE lok = '$lok' AND (rental.status = 'incoming' OR rental.status = 'ongoing') ;";
        $data = $this->uniquerycount($sql);
        $jumlah=$data['jrent'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function b_sewa($lok) 
    {
        $sql = "SELECT user.username, user.img, sewa.id_sewa, ps_sewa.nama_ps, sewa.status, sewa.waktu_order, sewa.playtime, sewa.mulai_sewa,
        sewa.akhir_sewa, sewa.payment_method, sewa.bayar FROM `sewa` JOIN user ON sewa.id_user = user.user_id
        JOIN ps_sewa ON sewa.id_ps = ps_sewa.id_ps WHERE sewa.lok = '$lok' AND (sewa.status = 'pending' OR sewa.status = 'aktif') ORDER BY sewa.waktu_order DESC ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_sewa($lok)
    {
        $sql = "SELECT COUNT(id_sewa) as jsewa FROM `sewa` WHERE lok = '$lok' AND (sewa.status = 'pending' OR sewa.status = 'aktif') ;";
        $data = $this->uniquerycount($sql);
        $jumlah=$data['jsewa'];
        if ($jumlah != 0) return $jumlah;
            else return "0";
    }

    public function getsewa($id)
    {
        $sql = "SELECT user.username, user.hp, sewa.id_sewa, ps_sewa.id_ps, sewa.pil_kirim, sewa.latitude, sewa.longitude, sewa.address
         FROM `sewa` JOIN user ON sewa.id_user = user.user_id
        JOIN ps_sewa ON sewa.id_ps = ps_sewa.id_ps WHERE sewa.id_sewa = '$id' ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function aktifrental( $val)
    {
        $data = $this->update('rental', 'id_rental', $val, ['status' => 'ongoing']);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function matirental( $val)
    {
        $data = $this->update('rental', 'id_rental', $val, ['status' => 'done']);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function aktifsewa( $val)
    {
        $data = $this->update('sewa', 'id_sewa', $val, ['status' => 'aktif']);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function matisewa( $val)
    {
        $data = $this->update('sewa', 'id_sewa', $val, ['status' => 'selesai']);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getps($id)
    {
        $sql = "SELECT id_ps FROM rental WHERE id_rental = '$id'  ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function getps_sewa($id)
    {
        $sql = "SELECT id_ps FROM sewa WHERE id_sewa = '$id'  ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function aktifps($id_ps)
    {
        $data = $this->update('ps', 'id_ps', $id_ps, ['status' => 'aktif']);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function matips($id_ps)
    {
        $data = $this->update('ps', 'id_ps', $id_ps, ['status' => 'tidak aktif']);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function aktifps_sewa($id_ps)
    {
        $data = $this->update('ps_sewa', 'id_ps', $id_ps, ['status' => 'aktif']);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function matips_sewa($id_ps)
    {
        $data = $this->update('ps_sewa', 'id_ps', $id_ps, ['status' => 'tidak aktif']);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

}