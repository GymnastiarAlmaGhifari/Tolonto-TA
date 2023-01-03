<?php
header("Content-Type: application/json");

require_once 'core/init.php';

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

$psaktif = $booking->cekpsaktif();

if($psaktif) {
    $j_ongoing = $booking->countrentalongoing($psaktif[0]['id_ps']);
    if ($j_ongoing == 0) {
        foreach ($psaktif as $ps) {
            $idps = $ps['id_ps'];
            if ($booking->matips($idps)) {
                echo json_encode(['status_psmati' => 'success']);
            } else {
                echo json_encode(['status_psmati' => 'gagal nonaktifkan ps']);
            }
        }
    } else {
        echo json_encode(['status_psmati' => 'tidak ada ps ongoing']);
    }
} else {
    echo json_encode(['status_psmati' => 'tidak ada ps aktif']);
}

$rental = $booking->getrentalongoing();
echo json_encode($rental);

if($rental) {
    //aktifkan ps
    foreach ($rental as $r) {
        $idps = $r['id_ps'];
        if ($booking->aktifps($idps)) {
            echo json_encode(['status_psaktif' => 'success']);
        } else {
            echo json_encode(['status_psaktif' => 'gagal aktifkan ps']);
        }
    }
}