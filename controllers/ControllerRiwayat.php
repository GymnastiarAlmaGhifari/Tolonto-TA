<?php
// Include Database.php file
include_once 'Database.php';

class ControllerRiwayat extends Database
{
    public function h_rental($lok)
    {
        $sql = "SELECT user.username, user.img, rental.id_rental, ps.nama_ps, rental.status, rental.waktu_order, rental.playtime, rental.mulai_rental,
        rental.selesai_rental, rental.bayar FROM `rental` JOIN user ON rental.id_user = user.user_id
        JOIN ps ON rental.id_ps = ps.id_ps WHERE rental.lok = '$lok' ORDER BY rental.waktu_order DESC ;"; 
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_rent($lok)
    {
        $data = $this->count('id_rental', 'rental', 'lok', $lok);
        $jumlah = $data['COUNT(id_rental)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function h_sewa($lok)
    {
        $sql = "SELECT user.username, user.img, sewa.id_sewa, ps_sewa.nama_ps, sewa.status, sewa.waktu_order, 
        sewa.playtime, sewa.mulai_sewa, sewa.akhir_sewa, sewa.bayar FROM `sewa` JOIN user ON sewa.id_user = user.user_id 
        JOIN ps_sewa ON sewa.id_ps = ps_sewa.id_ps WHERE sewa.lok = '$lok' ORDER BY sewa.waktu_order DESC ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_sewa($lok)
    {
        $data = $this->count('id_sewa', 'sewa', 'lok', $lok);
        $jumlah = $data['COUNT(id_sewa)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function h_servis($lok)
    {
        $sql = "SELECT user.username, user.img, servis.id_servis, servis.nama_barang, servis.kerusakan, servis.waktu_submit, servis.status, servis.est_selesai 
        FROM `servis` JOIN user ON servis.id_user = user.user_id WHERE servis.lok = '$lok' ORDER BY servis.waktu_submit DESC ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_servis($lok)
    {
        $sql = "SELECT COUNT(id_servis) FROM servis WHERE servis.lok = '$lok' ;  ";
        $data = $this->uniquery($sql);
        $jumlah = $data[0]['COUNT(id_servis)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function h_topup()
    {
        $sql = "SELECT user.username, user.img, user.email, topup.id_topup, topup.waktu, topup.jml_topup, manage.username AS admin 
        FROM `topup` JOIN user ON topup.id_user = user.user_id JOIN manage ON topup.id_admin = manage.id_admin ORDER BY topup.waktu DESC ;";
        $data = $this->uniquery($sql);
        return $data;
    }

    public function jumlah_topup()
    {
        $data = $this->countsemua('id_topup', 'topup');
        $jumlah = $data['COUNT(id_topup)'];
        if ($jumlah != 0) return $jumlah;
        else return "0";
    }

    public function del_allrental($lok)
    {
        $data = $this->delete_and('rental', 'lok', $lok, 'selesai_rental', 'NOW()');
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function del_allsewa($lok)
    {
        $data = $this->delete_and('sewa', 'lok', $lok, 'akhir_sewa', 'NOW()');
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function del_allservis($lok)
    {
        $data = $this->delete_and('servis', 'lok', $lok, 'est_selesai', 'NOW()');
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function del_alltopup()
    {
        $data = $this->delete_all('topup');
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function del_rental($id)
    {
        $data = $this->delete('rental', 'id_rental', $id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function del_sewa($id)
    {
        $data = $this->delete('sewa', 'id_sewa', $id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function del_servis($id)
    {
        $data = $this->delete('servis', 'id_servis', $id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function del_topup($id)
    {
        $data = $this->delete('topup', 'id_topup', $id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

}
