<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$Sadmin = new ControllerSuperAdmin();

$notifrent = $Sadmin->listnotif_rental($_SESSION['loksend']);
$notifsewa = $Sadmin->listnotif_sewa($_SESSION['loksend']);

if ($notifrent == false && $notifsewa == false) {
    echo json_encode(0);
} else if ($notifsewa == false) {
    echo json_encode($notifrent);
} else if ($notifrent == false) {
    echo json_encode($notifsewa);
} else {
    $notif = array_merge($notifrent, $notifsewa);
    echo json_encode($notif);
}