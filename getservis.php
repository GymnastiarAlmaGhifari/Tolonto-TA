<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

$servis = new ControllerServis();

if ($servis->fetch_servis($id)) {
    $data = $servis->fetch_servis($id);
    $user = $servis->fetch_user($data['id_user']);
    $data_servis = $servis->fetch_servis_adm($id);
    $data_admin = $servis->fetch_admin($data_servis['id_admin']);
    if ($data['status'] == 'pending') {
        echo json_encode([
            'status' => 'success',
            'id' => $data['id_servis'],
            'hp' => $user['hp'],
            'nama_barang' => $data['nama_barang'],
            'detail' => $data['detail'],
            'status_servis' => $data['status'],
            'tgl' => $data['est_selesai'],
            'selesai' => null,
            'biaya' => 0,
            'perbaikan' => null
        ]);
    } else {
        echo json_encode([
            'status' => 'success',
            'id' => $data['id_servis'],
            'hp' => $user['hp'],
            'nama_barang' => $data['nama_barang'],
            'detail' => $data['detail'],
            'status_servis' => $data['status'],
            'tgl' => Tanggal::ChangeFormatToView($data['est_selesai']),// <--- 'tgl_indo
            'selesai' => Tanggal::tgl_indo($data['est_selesai']),
            'biaya' => Rupiah::to($data_servis['bayar']),
            'perbaikan' => $data_servis['perbaikan'],
            'nama_admin' => $data_admin['username'],
        ]);
    }
} else {
    echo json_encode("error");
}
