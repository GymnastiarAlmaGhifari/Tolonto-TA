<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

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

$booking = new ControllerBooking();

if ($booking->aktifrental($id)) {
    $idps = $booking->getps($id);
    $fcm = $user->fetchuser($idps[0]['id_user']);
    if ($booking->aktifps($idps[0]['id_ps'])) {
        echo json_encode(['status' => 'success']);
        sendPush($fcm['fcm'], 'Rental telah diaktifkan', 'Rental Anda dengan Kode Rental ' .$id . ' telah aktif, Selamat Bermain!', 'https://tolonto.okifirsyah.com/public/brand-logo.png', '');
    } else {
        echo json_encode(['status' => 'gagal mengaktifkan ps']);
    }
} else {
    echo json_encode(['status' => 'gagal mengaktifkan rental']);
}
