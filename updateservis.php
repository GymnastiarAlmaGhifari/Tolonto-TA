<?php
header("Content-Type: application/json");

require_once 'core/init.php';
$servis = new ControllerServis();

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;
$status = $data->status;
$bayar = Rupiah::clear($data->bayar);
$perbaikan = $data->detail_perbaikan;
$est_selesai = Tanggal::ChangeFormatToDb($data->tgl);
$getservis = $servis->fetch_servis($id);
$getuser = $user->fetchuser($getservis['id_user']);
$id_admin = $data->id_admin;

define('FCM_AUTH_KEY', 'AAAAEwaAliE:APA91bE_XBK7mxFqonChJvtlduIlU8A1g7QOD_L5oNIV0j8zi7xkP5iLY40K03ZeFMJ7x23miB_KEwxYNHDMmLhYQbYOvOzX-MVE0y56PEjt0K2kyuuYSowHjiasrvKGL2MPEQ1_BTQW');

function sendPush($to, $title, $body, $icon, $url)
{
    $postdata = json_encode(
        [
            'notification' =>
            [
                'title' => $title,
                'body' => $body,
                'icon' => $icon,
                'click_action' => $url
            ],
            'to' => $to
        ]
    );

    $opts = array(
        'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json' . "\r\n"
                . 'Authorization: key=' . FCM_AUTH_KEY . "\r\n",
            'content' => $postdata
        )
    );

    $context  = stream_context_create($opts);

    $result = file_get_contents('https://fcm.googleapis.com/fcm/send', false, $context);
    if ($result) {
        return json_decode($result);
    } else return false;
}

if ($servis->update_admservis(
    [
        'bayar' => $bayar,
        'perbaikan' => $perbaikan,
        'update_time' => date('Y-m-d H:i:s'),
        'id_admin' => $id_admin
    ],
    $id
)) {
    if ($servis->update_servis(
        [
            'status' => $status,
            'est_selesai' => $est_selesai
        ],
        $id
    )) {
        if ($status == 'selesai') {
            SendPush($getuser['fcm'], 'Servis kamu telah Selesai', 'Servis ' . $getservis['nama_barang'] . ' telah selesai, silakan datang ke toko kami untuk mengambil barang anda', 'https://tolonto.okifirsyah.com/public/brand-logo.png', '');
        } else if ($status == 'progress') {
            SendPush($getuser['fcm'], 'Servis kamu sedang dalam proses', 'Servis ' . $getservis['nama_barang'] . ' sedang diproses oleh teknisi kami', 'https://tolonto.okifirsyah.com/public/brand-logo.png', '');
        } else {
            SendPush($getuser['fcm'], 'Servis kamu telah dibatalkan', 'Servis ' . $getservis['nama_barang'] . ' telah dibatalkan, silakan datang ke toko kami untuk mengambil barang anda', 'https://tolonto.okifirsyah.com/public/brand-logo.png', '');
        }
        echo json_encode(['status' => 'success']);
        // header("Refresh: 1; url=servis.php");
        // alert disini
    } else {
        // ganti alert gagal update servis
        echo json_encode(['status' => 'failed']);
    }
} else {
    //ini juga
    echo json_encode(['status' => 'failed']);
}
