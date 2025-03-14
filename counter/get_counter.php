<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

require '../connection.php'; // Your database connection

// $email = $_GET['email'];
$date = $_GET['date'];

$sql = "SELECT count FROM counter WHERE date = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ss", $email, $date);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode($data ?: ["count" => 0]);

$stmt->close();
$koneksi->close();
?>
