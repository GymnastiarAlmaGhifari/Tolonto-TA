<?php
header("Content-Type: application/json");

require_once "../core/init.php";

$json = file_get_contents('php://input');
$data = json_decode($json);

    $lokasi = $game->fetchsemua('*', 'lokasi');
    $bojonegorops = $game->bojonegoro_ps();
    // $babatps = $game->babat_ps();
    // $tubanps = $game->tuban_ps();
    $bojonegorototal = $game->bojonegoro_total();
    // $babattotal = $game->babat_total();
    // $tubantotal = $game->tuban_total();
    $bojonegorolist = $game->ps_bojonegoro();

    $response = [
        "status" => "success",
        "message" => "Data Lokasi Berhasil Diambil",
        "lokasi" => $lokasi,
        "bojonegoro_ps" => $bojonegorops, 
        "Total_Bojonegoro" => $bojonegorototal,
        // "babat_ps" => $babatps,
        // "Total_Babat" => $babattotal,
        // "tuban_ps" => $tubanps,
        // "Total_Tuban" => $tubantotal
        "bojonegoro_list" => $bojonegorolist
    ];
    echo json_encode($response);
