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
$stmt->bind_param("ss", $email, $date);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update existing record
    $sql = "UPDATE counter SET count = ?, updated_at = NOW() WHERE date = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("iss", $count, $email, $date);
} else {
    // Insert new record
    $sql = "INSERT INTO counter (email, date, count) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssi", $email, $date, $count);
}

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "Database error"]);
}

$stmt->close();
$koneksi->close();
?>
