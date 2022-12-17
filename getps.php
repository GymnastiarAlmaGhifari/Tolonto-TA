<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;
$table = $data->table;

$SadminPs = new ControllerSuperadminInventory();

if ($SadminPs->fetch_ps($table, 'id_ps', $id)) {
    $dataps = $SadminPs->fetch_ps($table, 'id_ps', $id);
    echo json_encode(['status' => 'success', 'id_ps' => $dataps['id_ps'], 'nama_ps' => $dataps['nama_ps'], 'harga_ps' => $dataps['harga'], 'kategori' => $dataps['jenis'], 'img' => $dataps['img']]);
} else {
    echo json_encode("No data found");
}

