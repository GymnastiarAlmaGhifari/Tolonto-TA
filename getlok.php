<?php
header("Content-Type: application/json");

require_once "core/init.php";

$json = file_get_contents('php://input');
$data = json_decode($json);

// $loksend = $data->loksend;
$loksend = $data->loksend;
$_SESSION['loksend'] = $loksend;
echo json_encode($_SESSION['loksend']);