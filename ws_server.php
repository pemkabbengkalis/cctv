<?php
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use React\Socket\Server;
use React\Socket\SecureServer;
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
        $data = json_decode($msg, true);
    
        if (isset($data['date'])) {
            $selectedDate = $data['date'];
            echo "Fetching counter for date: " . $selectedDate . "\n";
            $this->broadcastCounterData($selectedDate);
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    public function broadcastCounterData($selectedDate) {
        $query = "SELECT date, count FROM counter WHERE date = ? ORDER BY updated_at DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $selectedDate);
        $stmt->execute();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
            $payload = json_encode([
                "type" => "counter",
                "date" => $row['date'],
                "location" => 'AIR PUTIH - SEI SELARI',
                "count" => (int) $row['count'] // Pastikan tipe data integer
            ]);
    
            foreach ($this->clients as $client) {
                $client->send($payload);
            }
        }
    }
    
    

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

// 🔹 Setup WebSocket Server dengan SSL
$loop = Factory::create();

$context = [
    'local_cert' => 'cert.pem',
    'local_pk'   => 'privkey.pem',
    'allow_self_signed' => false,
    'verify_peer' => false
];

// 🔹 Gunakan ReactPHP Secure Server (SSL)
$socket = new Server('103.166.161.154:8443', $loop);
$secureSocket = new SecureServer($socket, $loop, $context);

$counterServer = new CounterWebSocket();

$server = new IoServer(
    new HttpServer(
        new WsServer($counterServer)
    ),
    $secureSocket,
    $loop
);

// 🔹 Timer untuk update real-time
$loop->addPeriodicTimer(1, function() use ($counterServer) {
    $counterServer->broadcastTableData();
});

echo "WebSocket Server running on wss://domain:8081\n";
$server->run();
