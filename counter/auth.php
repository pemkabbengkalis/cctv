<?php
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\JWK;

header('Content-Type: application/json');

$googleClientId = "427656185721-962q1qtd774pnk07ltjsqiu11v13eunh.apps.googleusercontent.com";

// Email yang diizinkan
$allowedEmails = [
    "pelayaran.dishubbengkalis@gmail.com",
    "bohatimulyadi99@gmail.com",
    "anonylast99@gmail.com",
];

// Ambil token dari request
$data = json_decode(file_get_contents("php://input"), true);
$idToken = $data['credential'] ?? '';

if (!$idToken) {
    echo json_encode(["error" => "Token tidak ditemukan"]);
    exit;
}

try {
    // Ambil JWK dari Google untuk verifikasi tanda tangan JWT
    $keys = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v3/certs'), true);
    $decoded = JWT::decode($idToken, JWK::parseKeySet($keys));
    
    $userEmail = $decoded->email ?? '';
    
    // Cek apakah email pengguna diizinkan
    if (!in_array($userEmail, $allowedEmails)) {
        echo json_encode(["error" => "Akses ditolak"]);
        exit;
    }

    // Simpan session (jika menggunakan session)
    session_start();
    $_SESSION['user_email'] = $userEmail;

    echo json_encode(["success" => true, "email" => $userEmail]);
} catch (Exception $e) {
    echo json_encode(["error" => "Token tidak valid"]);
}
?>
