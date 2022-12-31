<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

$riwayat = new ControllerRiwayat();

if ($riwayat->del_topup($id)) {
    // $dataps = $SadminPs->delete_ps($table, 'id_ps', $id);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'failed']);
}
