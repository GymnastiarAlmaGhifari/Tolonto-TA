<?php
class Tanggal
{
    // this.datepickerValue = new Date(this.year, this.month, today.getDate() + 1).toLocaleDateString('id-ID', {
    //     weekday: 'long',
    //     year: 'numeric',
    //     month: 'long',
    //     day: 'numeric'
    // });
    public static function ChangeFormatToDb($date)
    {
        // rubah format tanggal dari 'Selasa, 27 Desember 2022' menjadi 2020-01-01 (untuk database)
        $date = explode(' ', $date);
        $date = explode(',', $date[1]);
        $date = explode(' ', $date[0]);
        $date = $date[2] . '-' . $date[1] . '-' . $date[0];
        return $date;
    }

    public static function tgl_indo($date){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $hari = array (
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        // hapus jam, menit, detik buat format tanggal senin, 1 januari 2020 tanpa -
        $date = explode(' ', $date);
        $date = explode('-', $date[0]);
        // fix hari sesuai tanggal
        $result = $hari[date('N', strtotime($date[0] . '-' . $date[1] . '-' . $date[2]))] . ', ' . $date[2] . ' ' . $bulan[(int)$date[1]] . ' ' . $date[0];
        return ($result);
    }
}
