<?php
class Rupiah
{
    public static function to($angka)
    {
        // format rupiah tanpa ,00
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        $hasil_rupiah = str_replace(",00", "", $hasil_rupiah);
        return $hasil_rupiah;
    }
    public static function clear($angka)
    {
        $hasil_rupiah = str_replace("Rp ", "", $angka);
        $hasil_rupiah = str_replace(".", "", $hasil_rupiah);
        $hasil_rupiah = str_replace(",", ".", $hasil_rupiah);
        return $hasil_rupiah;
    }
}
