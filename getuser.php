<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

$SadminUser = new ControllerSuperadminUser();

if ($SadminUser->fetchadmin($id)) {
    $datauser = $SadminUser->fetchadmin($id);
    echo json_encode(['status' => 'success', 'id_admin' => $datauser['id_admin'], 'username' => $datauser['username'], 
    'password' => $datauser['password'], 'level' => $datauser['level'], 'lokasi' => $datauser['lok'], 'img' => $datauser['img']]);
} else {
    echo json_encode(['status' => 'failed']);
}


