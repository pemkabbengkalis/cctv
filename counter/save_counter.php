<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

require '../connection.php'; // Your database connection

$email = $_POST['email'];
$date = $_POST['date'];
$count = $_POST['count'];

$sql = "SELECT * FROM counter WHERE date = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s",$date);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update record dengan nilai baru dari inputan
    $sql = "UPDATE counter SET count = ?, updated_at = NOW() WHERE date = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("is", $count, $date);
} else {
    // Insert jika belum ada data
    $sql = "INSERT INTO counter (email, date, count) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssi", $email, $date, $count);
}


if ($stmt->execute()) {
    echo json_encode(["success" => $count]);
} else {
    echo json_encode(["error" => "Database error"]);
}

$stmt->close();
$koneksi->close();
?>
