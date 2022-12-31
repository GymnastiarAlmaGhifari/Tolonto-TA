<?php
header("Content-Type: application/json");

require_once 'core/init.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$Sadmin = new ControllerSuperAdmin();

$jrent = $Sadmin->count_rent($_SESSION['loksend']);
$jsewa = $Sadmin->count_sewa($_SESSION['loksend']);

$total = $jrent + $jsewa;
echo $total;