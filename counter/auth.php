<?php
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\JWK;

header('Content-Type: application/json');

$googleClientId = "427656185721-962q1qtd774pnk07ltjsqiu11v13eunh.apps.googleusercontent.com";
$allowedEmails = [
    "pelayaran.dishubbengkalis@gmail.com",
    "bohatimulyadi99@gmail.com",
    "anonylast99@gmail.com",
];

$data = json_decode(file_get_contents("php://input"), true);
$idToken = $data['credential'] ?? '';

if (!$idToken) {
    echo json_encode(["error" => "Token tidak ditemukan"]);
    exit;
}

try {
    // Ambil JWK dari Google
    $jwks = file_get_contents('https://www.googleapis.com/oauth2/v3/certs');

    if (!$jwks) {
        echo json_encode(["error" => "Gagal mengambil Google public keys"]);
        exit;
    }

    $keys = json_decode($jwks, true);

    // Debug isi JWK
    file_put_contents('debug_jwk.json', json_encode($keys, JSON_PRETTY_PRINT));

    if (!isset($keys['keys'])) {
        echo json_encode(["error" => "Format JWK tidak valid", "debug" => $keys]);
        exit;
    }

    // Decode token
    $decoded = JWT::decode($idToken, JWK::parseKeySet($keys));

    // Cek apakah token cocok dengan client ID aplikasi
    if ($decoded->aud !== $googleClientId) {
        echo json_encode(["error" => "Client ID tidak cocok"]);
        exit;
    }

    $userEmail = $decoded->email ?? '';

    if (!in_array($userEmail, $allowedEmails)) {
        echo json_encode(["error" => "Akses ditolak"]);
        exit;
    }

    session_start();
    $_SESSION['user_email'] = $userEmail;

    echo json_encode(["success" => true, "email" => $userEmail]);
} catch (Exception $e) {
    echo json_encode(["error" => "Token tidak valid: " . $e->getMessage()]);
}
