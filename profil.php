<?php
session_start();
include "connection.php";
if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
{
header("Location: akses/");
}
else {
  ?>
 <!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.0/examples/album/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pantau Antrian Penyeberangan Roro Bengkalis - Pakning dan Pakning - Bengkalis">
    <meta name="author" content="Bengkaliskab">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="icon" href="https://bengkaliskab.go.id/favicon.ico">

    <title>CCTV BENGKALIS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="./cctv_files/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./cctv_files/album.css" rel="stylesheet">
  </head>
  <header >

    <div class="navbar fixed-top box-shadow" style="background: rgb(1,151,61);background: linear-gradient(90deg, rgba(1,151,61,1) 0%, rgba(217,9,9,1) 53%, rgba(249,255,0,1) 100%);">
      <div class="container d-flex justify-content-between">
        <a href="" class="navbar-brand d-flex align-items-center">
          <strong style="color:white"> <img src="cctv.gif" height="30"> CCTV BENGKALIS </strong>  &nbsp;&nbsp;<span class="badge badge-danger">Live !</span>
        </a>

    </div>
  </header>
  <body>
<div class="container">

 <br>
 <br><br>
<center><h3> <i class="fa fa-user"></i> Profil User</h3></center>
<a href="id.php" class="btn btn-info btn-sm pull-left"> <i class="fa fa-arrow-left"></i> Back</a>
<a href="out.php" class="btn btn-danger btn-sm pull-right"> <i class="fa fa-sign-out"></i> Keluar</a>
<br>
<br>
<?php

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $username = $_POST["username"];
  $pass = $_POST["password"];

  if(empty($pass)){
	$sql = "UPDATE login SET username = '$username' WHERE id = '$id'";
} else {
  $password = md5($_POST["password"]);
  $sql = "UPDATE login SET username = '$username', password = '$password' WHERE id = '$id'";
}
  $aksi = mysqli_query($koneksi, $sql);

  if($aksi)
	{ ?>
<div class="alert alert-success">Berhasil</div>
	<?php }
	else {?>
    <div class="alert alert-danger">Gagal</div>

    <?php
  }


}


?>

<table class="table" border="0">
<thead>
  <tr>
    <th>Username</th>
    <th>Password</th>
    <th colspan="2">Action</th>
</tr>
</thead>
<tbody>
  <?php
  $sqlquery = "SELECT * FROM login";
  if ($result = mysqli_query($koneksi, $sqlquery)) {
  $row = mysqli_fetch_assoc($result);
  ?>
  <tr class="bg-success">
    <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <td><input type="text" class="form-control" name="username" value="<?php echo $row["username"];?>"></td>
    <td><input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak diubah"></td>
    <td><button type="submit" name="edit" class="btn btn-xs btn-warning" title='Edit'> <i class="fa fa-save" title="Edit"></i> </button></td>
  </form>
  </tr>
  <?php
  	}
  		mysqli_free_result($result);

  ?>

</tbody>
</table>
</div>

  </body>
</html>
<?php } ?>
