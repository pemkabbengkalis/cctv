<?php

$server     = "localhost";
$username     = "root";
$password = "";
$database = "cctv";
$today = date("Y-m-d");

$mysqli = new mysqli($server, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}

    $sql_get_camera = "SELECT * FROM camera WHERE status = 'up' AND publish = 'y' ORDER BY sort ASC";
    $query = $mysqli->query($sql_get_camera);

    $response_data = array();

    while ($data = $query->fetch_assoc()) {
        
        $a['id'] = $data['id'];
        $a['embed'] = str_replace('https://www.youtube.com/embed/','',$data['embed'])  ;
        $a['description'] = $data['description'];
        $a['status'] = $data['status'];
        $a['publish'] = $data['publish'];
        $a['sort'] = $data['sort'];
        $a['ip'] = $data['ip'];
        $a['thumbnail'] = "https://img.youtube.com/vi/".str_replace('https://www.youtube.com/embed/','',$data['embed'])."/mqdefault.jpg";
        
        array_push($response_data,$a);
        
    }
    if (is_null($response_data)) {
        $status = false;
    } else {
        $status = true;
    }
    header('Content-Type: application/json');
    $response = $response_data;
    echo json_encode($response);

?>