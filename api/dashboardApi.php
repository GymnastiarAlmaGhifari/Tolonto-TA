<?php
header("Content-Type: application/json");

require_once "../core/init.php";

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;
$name = $data->name;
$addres = $data->address;
$latitude = $data->latitude;
$longitude = $data->longitude;
$playstation_3 = $data->playstation_3;
$playstation_4 = $data->playstation_4;
$total_playstation = $data->total_playstation;
$playstation_data = $data->playstation_data;

// array playstation data
$playstation_data = [
    // data 1 = ps_id
    // data 2 = ps_name
    // data 3 = ps_price
    // data 4 = ps_status
    // data 1
    [
        "ps_id" => 1,
        "ps_name" => "Playstation 1",
        "ps_price" => 10000,
        "ps_status" => "available"
    ],

];

// isi array playstation data
