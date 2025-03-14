<?php
require_once "../connection.php";

$username = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

	$query = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' AND password='$password' AND status='y' ")
									or die('Ada kesalahan pada query admin: '.mysqli_error($koneksi));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id']   = $data['id'];
		$_SESSION['username']     = $data['username'];
		$_SESSION['password']  = $data['password'];

		header("Location: ../id.php");
	}

	else { ?>
		<script>
	        alert("Login Gagal!");
					window.location = "index.php";
	  </script>
		<?php
	}

?>
