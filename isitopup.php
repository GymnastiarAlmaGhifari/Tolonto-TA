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
    echo json_encode(['status' => 'success', 'message' => 'aowkdoakwodkawokd' ] );
} else {
    echo json_encode(['status' => 'failed']);
}
