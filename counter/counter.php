<?php
include "../connection.php";
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Counter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/ec6fd0ee66.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: url('../img/bg.webp') no-repeat center center fixed;
            background-size: cover;
        }
        .button-counter {
            position: absolute;
            bottom: 27px;
            width: 100%;
        }
        .button-counter #increment-btn {
            width: 50%;
            margin-right: 20px;
        }
        .button-counter #decrement-btn {
            width: 50%;
            margin-left: 20px;
        }
        .logo-counter {
            width: 184px;
            position: absolute;
            top: 155px;
        }
        .value-counter {
            position: absolute;
            bottom: 147px;
        }
        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen w-screen">
    <div class="bg-blue-100 bg-opacity-90 shadow-lg rounded-2xl p-6 text-center w-full h-full flex flex-col items-center justify-center border-4 border-blue-500">
        <div class="absolute top-5 right-5">
            <a href="logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
        <h1 class="text-5xl font-extrabold text-blue-900">Jumlah Booking</h1>
        
        <div class="mt-8">
            <label for="date" class="block text-lg font-semibold text-blue-700">Pilih Tanggal:</label>
            <input type="date" id="date" class="form-control mt-2 px-4 py-2 border-2 border-blue-500 rounded-lg shadow-sm focus:ring focus:ring-blue-300 bg-white text-blue-900">
        </div>
        
        <div class="value-counter mt-6 text-7xl font-bold text-blue-700" id="counter">0</div>
        
        <div class="button-counter mt-8 flex space-x-6">
            <a onclick="decrement()" id="decrement-btn" class="bg-red-600 text-white px-6 py-3 text-2xl rounded-lg shadow-md disabled"><i class="fa-solid fa-minus"></i></a>
            <a onclick="increment()" id="increment-btn" class="bg-blue-600 text-white px-6 py-3 text-2xl rounded-lg shadow-md disabled"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>

    <script>
        document.getElementById('date').addEventListener('change', resetCounter);
        let count = 0;
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";

        function updateCounter() {
            document.getElementById('counter').textContent = count;
            saveCounter();
        }

        function increment() {
            count++;
            updateCounter();
        }

        function decrement() {
            if (count > 0) {
                count--;
                updateCounter();
            }
        }

        function resetCounter() {
            const dateValue = document.getElementById('date').value;
            const incrementBtn = document.getElementById('increment-btn');
            const decrementBtn = document.getElementById('decrement-btn');
            
            if (dateValue) {
                incrementBtn.classList.remove('disabled');
                decrementBtn.classList.remove('disabled');
                fetchCounter(dateValue);
            } else {
                incrementBtn.classList.add('disabled');
                decrementBtn.classList.add('disabled');
                count = 0;
                updateCounter();
            }
        }

        function saveCounter() {
          
            const dateValue = document.getElementById('date').value;
            if (!dateValue) return;

            $.ajax({
                url: "save_counter.php",
                type: "POST",
                data: { email: userEmail, date: dateValue, count: count },
                success: function(response) {
                    console.log("Counter saved:", response);
                }
            });
       
            
        }

        function fetchCounter(date) {
            $.ajax({
                url: "get_counter.php",
                type: "GET",
                data: { email: userEmail, date: date },
                success: function(response) {
                    const data = JSON.parse(response);
                    count = data.count || 0;
                    updateCounter();
                }
            });
        }

       
    </script>

<script>
    let socket = new WebSocket($websocket);

    socket.onopen = function() {
        console.log("Connected to WebSocket");
    };

    socket.onmessage = function(event) {
        const data = JSON.parse(event.data);
        if (data.date === document.getElementById('date').value) {
            count = data.count;
            console.log("TEST");
            updateCounter();
        }
    };

    function fetchCounter(date) {
        if (socket.readyState === WebSocket.OPEN) {
            socket.send(JSON.stringify({ date: date }));
        }
    }

    document.getElementById('date').addEventListener('change', function() {
        fetchCounter(this.value);
    });
</script>

</body>
</html>
