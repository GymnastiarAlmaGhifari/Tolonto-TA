<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;

$booking = new ControllerBooking();

if ($booking->matirental($id)) {
    $idps = $booking->getps($id);
    if ($booking->matips($idps[0]['id_ps'])) {
        echo json_encode(['status' => 'success' ]);
    } else {
        echo json_encode(['status' => 'gagal nonaktifkan ps' ]);
    }
} else {
    echo json_encode(['status' => 'gagal nonaktifkan rental' ]);
}