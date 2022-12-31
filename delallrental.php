<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$lok = $_SESSION['loksend'];

$riwayat = new ControllerRiwayat();

if ($riwayat->del_allrental($lok)) {
    // $dataps = $SadminPs->delete_ps($table, 'id_ps', $id);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'failed']);
}
