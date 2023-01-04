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

if ($psaktif) {
    foreach ($psaktif as $ps) {
        $j_ongoing = $booking->countrentalongoing($ps['id_ps']);
        if ($j_ongoing == 0) {
            $idps = $ps['id_ps'];
            if ($booking->matips($idps)) {
                echo json_encode(['status_psmati' => 'success']);
            } else {
                echo json_encode(['status_psmati' => 'gagal nonaktifkan ps']);
            }
        } else {
            echo json_encode(['status_psmati' => 'PS masih ongoing']);
        }
    }
} else {
    echo json_encode(['status_psmati' => 'tidak ada ps aktif']);
}

$pssewaaktif = $booking->cekpssewaaktif();

if ($pssewaaktif) {
    foreach ($pssewaaktif as $pssewa) {
        echo "wakwka" . $pssewa['id_ps'];
        $j_aktif = $booking->countsewaongoing($pssewa['id_ps']);
        echo "wakwka" . $j_aktif;
        if ($j_aktif == 0) {
            $idpssewa = $pssewa['id_ps'];
            if ($booking->matips_sewa($idpssewa)) {
                echo json_encode(['status_pssewamati' => 'success']);
            } else {
                echo json_encode(['status_pssewamati' => 'gagal nonaktifkan ps']);
            }
        } else {
            echo json_encode(['status_pssewamati' => 'PS sewa masih ongoing']);
        }
    }
} else {
    echo json_encode(['status_pssewamati' => 'tidak ada ps sewa aktif']);
}

$rental = $booking->getrentalongoing();

if ($rental) {
    //aktifkan ps
    foreach ($rental as $r) {
        $idps = $r['id_ps'];
        $psnonaktif = $booking->getpsnonaktif($idps);
        if ($psnonaktif) {
            if ($booking->aktifps($idps)) {
                echo json_encode(['status_psaktif' => 'success']);
            } else {
                echo json_encode(['status_psaktif' => 'gagal aktifkan ps']);
            }
        } else {
            echo json_encode(['status_psaktif' => 'tidak ada ps nonaktif']);
        }
    }
} else {
    echo json_encode(['status_psaktif' => 'tidak ada rental ongoing']);
}
