<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Google</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <style>
        body {
            background: url('../img/bg.webp') no-repeat center center fixed;
            background-size: cover;
        }
        .form-login{
            height: 50vh;
        }
        .logo-counter{
            width: 100%;
        }
        .border-blues-500 {
            --tw-border-opacity: 1;
            border-color: rgb(90 102 121);
        }.g_id_signin{
            width: 100%;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen w-screen">
    <div class="form-login bg-white shadow-lg rounded-2xl p-6 text-center w-96 border-4 border-blues-500">
        <h1 class="text-2xl font-bold text-blue-900">Booking Tiket Counter</h1>
        <div class="logo-counter">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjWYh5izgRJmJZznQOlFfkezCC0SiJr4K8iJeS_fPyhFAmAZqiQEALrbkYgmWPH5vAgZ1o3ygipNQsKCPLyHtYGEL3h45ii8dbHyL-z_R_LQ07BxjtU6DgHr8ze8I-4KCZ78HDV_qwBBakRcsYj_x493AlpHypAtKvHwUskEQvj25MmqJ-I3CZLcg/w320-h240/Kab%20bengkalis%20%5Bkoleksilogo.com%5D.png" alt="User Profile" class="profile-pic">

        </div>
        <div id="g_id_onload"
             data-client_id="427656185721-962q1qtd774pnk07ltjsqiu11v13eunh.apps.googleusercontent.com"
             data-context="signin"
             data-ux_mode="popup"
             data-callback="handleCredentialResponse"
             data-auto_prompt="false">
        </div>
        <div class="g_id_signin" data-type="standard"></div>
    </div>

    <script>
    function handleCredentialResponse(response) {
        console.log("Encoded JWT ID token: " + response.credential);
        
        fetch('auth.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ credential: response.credential })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                localStorage.setItem("user_email", data.email);
                window.location.href = "counter.php"; // Redirect jika sukses
            } else {
                alert("Akses ditolak: " + data.error);
            }
        })
        .catch(err => console.error("Login error:", err));
    }
</script>

</body>
</html>
