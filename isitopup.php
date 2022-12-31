<?php

require_once 'core/init.php';


$json = file_get_contents('php://input');
$data = json_decode($json);

$email = $data->email;
$j_topup = $data->jumlah_topup;

$SadminUser = new ControllerSuperadminUser();

$user_data = $user->get_data(Session::get('username'));
$idtopup = $SadminUser->idtopup();
$iduser = $SadminUser->fetch_user($email);
if ($SadminUser->add_topup(
    [
        'id_topup' => $idtopup,
        'id_user' => $iduser['user_id'],
        'jml_topup' => Rupiah::clear($j_topup),
        'waktu' => date('Y-m-d H:i:s'),
        'id_admin' => $user_data['id_admin']
    ]
)) {
    // Firebase Cloud Messaging Authorization Key
    define('FCM_AUTH_KEY', 'AAAAEwaAliE:APA91bE_XBK7mxFqonChJvtlduIlU8A1g7QOD_L5oNIV0j8zi7xkP5iLY40K03ZeFMJ7x23miB_KEwxYNHDMmLhYQbYOvOzX-MVE0y56PEjt0K2kyuuYSowHjiasrvKGL2MPEQ1_BTQW');
    $title = 'Topup Berhasil';
    $body = 'Berhasil Topup dengan Jumlah ' . $j_topup;
    $keyclient = $iduser['fcm'];

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

    sendPush($keyclient, $title, $body, 'https://anysite.com/some_image.png', 'https://openthissiteonclick.com');
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'failed']);
}
