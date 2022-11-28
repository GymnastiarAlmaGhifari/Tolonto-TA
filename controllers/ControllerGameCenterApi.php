<?php
// Include Database.php file
include_once 'Database.php';

class ControllerGameCenterApi extends Database
{
    public function lokasi()
    {
        $data = $this->fetchsemua('*', 'lokasi');
        return $data;
    }
    
    public function bojonegoro_ps()
    {
        $data = $this->uniquery('SELECT jenis.nama_jenis, COUNT(ps.jenis) as jumlah from ps RIGHT JOIN jenis ON ps.jenis = jenis.id_jenis WHERE ps.lok = "Bojonegoro" GROUP by jenis.id_jenis;');

        return $data;
    }

    public function babat_ps()
    {
        $data = $this->uniquery('SELECT jenis.nama_jenis, COUNT(ps.jenis) as jumlah from ps RIGHT JOIN jenis ON ps.jenis = jenis.id_jenis WHERE ps.lok = "Babat" GROUP by jenis.id_jenis;');
        return $data;
    }

    public function tuban_ps()
    {
        $data = $this->uniquery('SELECT jenis.nama_jenis, COUNT(ps.jenis) as jumlah from ps RIGHT JOIN jenis ON ps.jenis = jenis.id_jenis WHERE ps.lok = "Tuban" GROUP by jenis.id_jenis;');
        return $data;
    }

    public function bojonegoro_total()
    {
        $data = $this->uniquery('SELECT COUNT(ps.id_ps) as total from ps WHERE ps.lok = "Bojonegoro";');
        return $data;
    }

    public function babat_total()
    {
        $data = $this->uniquery('SELECT COUNT(ps.id_ps) as total from ps WHERE ps.lok = "Babat";');
        return $data;
    }

    public function tuban_total()
    {
        $data = $this->uniquery('SELECT COUNT(ps.id_ps) as total from ps WHERE ps.lok = "Tuban";');
        return $data;
    }
}
