<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

$SadminUser = new ControllerSuperadminUser();

if ($datauser = $SadminUser->fetch_user($id)) {
    $datauser = $SadminUser->fetch_user($id);

    echo json_encode(['status' => 'success', 'img' => $datauser['img']]);
} else {
    echo json_encode(['status' => 'failed']);
}
