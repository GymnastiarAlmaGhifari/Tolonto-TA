<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

$SadminUser = new ControllerSuperadminUser();
$img = $SadminUser->fetch_img($id);

if ($SadminUser->delete_admin($id)) {
    $datauser = $SadminUser->delete_admin($id);
    if (file_exists($img)) {
        unlink($img);
    }
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'failed']);
}
