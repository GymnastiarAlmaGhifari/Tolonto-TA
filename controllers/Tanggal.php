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
        // rubah format tanggal dari selasa, 1 januari 2020 menjadi 2020-01-01 jam:menit:detik (untuk database)
        $date = explode(' ', $date);
        $date = explode(',', $date[0]);
        $date = explode(' ', $date[1]);
        $date = $date[2] . '-' . $date[1] . '-' . $date[0] . ' ' . date('H:i:s');
        return $date;
    }
}
