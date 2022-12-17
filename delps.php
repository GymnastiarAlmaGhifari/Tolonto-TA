<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;
$table = $data->table;

$SadminPs = new ControllerSuperadminInventory();
$img = $SadminPs->fetch_img($table, 'id_ps', $id);

if ($SadminPs->delete_ps($table, 'id_ps', $id)) {
    // $dataps = $SadminPs->delete_ps($table, 'id_ps', $id);
    if (file_exists($img)) {
        unlink($img);
    }
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'failed']);
}
