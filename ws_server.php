<?php
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use React\Socket\Server;
use React\EventLoop\Factory;
use React\EventLoop\TimerInterface;

class CounterWebSocket implements MessageComponentInterface {
    protected $clients;
    protected $db;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->db = new mysqli("localhost", "root", "", "cctv");

        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Tidak perlu permintaan dari client, karena update dilakukan secara berkala
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    // 🔥 Kirim data counter untuk tampilan utama
    public function broadcastCounterData() {
        $query = "SELECT date, SUM(count) as total_count FROM counter GROUP BY date";
        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc()) {
            $payload = json_encode([
                "type" => "counter",
                "date" => $row['date'],
                "location" => 'AIR PUTIH - SEI SELARI',
                "count" => $row['total_count']
            ]);

            foreach ($this->clients as $client) {
                $client->send($payload);
            }
        }
    }

    // 🔥 Kirim data tabel (Quota dan Booking)
    public function broadcastTableData() {
        $query = "SELECT date, location, SUM(count) as total_count FROM counter GROUP BY date, location";
        $result = $this->db->query($query);
        $tableData = [];

        while ($row = $result->fetch_assoc()) {
            $sisaQuota = 300 - (int) $row['total_count'];
            $tableData[] = [
                "date" => $row['date'],
                "location" => $row['location'],
                "count" => $row['total_count'],
                "quota" => $sisaQuota
            ];
        }

        $payload = json_encode([
            "type" => "table",
            "data" => $tableData
        ]);

        foreach ($this->clients as $client) {
            $client->send($payload);
        }
    }
}

// 🔥 Setup WebSocket Server
$loop = Factory::create();
$socket = new Server('192.168.43.120:6001', $loop);
$counterServer = new CounterWebSocket();

$server = new IoServer(
    new HttpServer(
        new WsServer($counterServer)
    ),
    $socket,
    $loop
);

// ⏳ Timer untuk update real-time
$loop->addPeriodicTimer(1, function() use ($counterServer) {
    $counterServer->broadcastCounterData();
    $counterServer->broadcastTableData();
});

echo "WebSocket Server running on ws://0.0.0.0:6001\n";
$server->run();

