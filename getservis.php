<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

$servis = new ControllerServis();

if ($servis->fetch_servis($id)) {
    $data = $servis->fetch_servis($id);
    $data_servis = $servis->fetch_servis_adm($id);
    echo json_encode([
        'status' => 'success',
        'id' => $data['id_servis'],
        'nama_barang' => $data['nama_barang'],
        'detail' => $data['detail'],
        'status_servis' => $data['status'],
        'selesai' => Tanggal::tgl_indo($data['est_selesai']), 
        'biaya' => Rupiah::to($data_servis['bayar']),
        'perbaikan' => $data_servis['perbaikan']
    ]);
} else {
    echo json_encode("error");
}
