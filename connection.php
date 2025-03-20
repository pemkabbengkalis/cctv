<?php
$host     = "localhost";
$user     = "cctvuat";
$password = "3oyMNEMpwPLB";
$database = "cctvuat_cctv";
$websocket= 'wss://cctvuat.bengkaliskab.go.id';



$hari_ini = date("Y-m-d");

$koneksi   = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {

   echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

if(isset($_GET['status']) && isset($_GET['address']) && isset($_GET['token']))
{
	if(strip_tags($_GET['token']) == '49477a98792ce189bd503e3f30a0950b'){
    $addr = strip_tags($_GET['address']);
    $status= strip_tags($_GET['status']);
    $sqlquery = "UPDATE camera SET status='".$status."' where ip='".$addr."'";
    mysqli_query($koneksi, $sqlquery);
    echo 'Kamera IP : '.strip_tags($_GET['address']).' sedang '.strip_tags($_GET['status']);
	}
	else
	{
		echo "Accesss Denied";
		exit;
	}


}
?>
