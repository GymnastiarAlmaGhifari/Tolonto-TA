<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

$booking = new ControllerBooking();

if ($booking->getsewa($id)) {
    $datasewa = $booking->getsewa($id);
    echo json_encode([
        'status' => 'success',
        'nama' => $datasewa[0]['username'],
        'hp' => $datasewa[0]['hp'],
        'id_ps' => $datasewa[0]['id_ps'],
        'pil_kirim' => $datasewa[0]['pil_kirim'],
        'latitude' => $datasewa[0]['latitude'],
        'longitude' => $datasewa[0]['longitude'],
        'alamat' => $datasewa[0]['address']
    ]);
} else {
    echo json_encode("error");
}
