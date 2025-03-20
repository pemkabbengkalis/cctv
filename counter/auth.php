<?php
require '../vendor/autoload.php';

use Google\Auth\AccessToken;

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
    // Gunakan Google Auth untuk verifikasi token
    $auth = new AccessToken();
    $payload = $auth->verify($idToken, ['audience' => $googleClientId]);

    if (!$payload) {
        echo json_encode(["error" => "Token tidak valid"]);
        exit;
    }

    $userEmail = $payload['email'] ?? '';

    if (!in_array($userEmail, $allowedEmails)) {
        echo json_encode(["error" => "Akses ditolak"]);
        exit;
    }

    session_start();
    $_SESSION['user_email'] = $userEmail;

    echo json_encode(["success" => true, "email" => $userEmail]);
} catch (Exception $e) {
    echo json_encode(["error" => "Token tidak valid", "message" => $e->getMessage()]);
}
