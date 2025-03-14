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
  <header>

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
<center><h3> <i class="fa fa-gear"></i> Pengaturan CCTV</h3></center>
<a href="profil.php" class="btn btn-info btn-sm pull-left"> <i class="fa fa-user"></i> Profil</a>
<a href="out.php" class="btn btn-danger btn-sm pull-right"> <i class="fa fa-sign-out"></i> Keluar</a>
<br>
<br>
<?php

if(isset($_POST['save'])){

  $sort = $_POST["sort"];
  $ip = $_POST["ip"];
  $embed = $_POST["embed"];
  $description = $_POST["description"];
  $status = $_POST["status"];
	$publish = $_POST["publish"];

  $replace = str_replace('youtu.be/','www.youtube.com/embed/',$embed);

	$sql = "INSERT INTO camera VALUES ('','$replace','$description','$status','$publish','$sort','$ip')";
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

if(isset($_POST['edit'])){
  $id = $_POST['id'];

  $sort = $_POST["sort"];
  $ip = $_POST["ip"];
  $embed = $_POST["embed"];
  $description = $_POST["description"];
  $status = $_POST["status"];
	$publish = $_POST["publish"];

  $replace = str_replace('youtu.be/','www.youtube.com/embed/',$embed);

	$sql = "UPDATE camera SET embed = '$replace', description = '$description', status = '$status', publish = '$publish', sort = '$sort', ip = '$ip' WHERE id = '$id'";
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

if(isset($_POST['updateinfo'])){
  $id = $_POST['id'];
  $message = $_POST["message"];

	$sql = "UPDATE message SET message = '$message' WHERE id = '$id'";
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

if(isset($_POST['notif'])){


function sendNotif($to, $notif) {
$apiKey ="AAAASZ0NABE:APA91bE8VMBEUHnDyti9lAUeQuEszWtHpo94sWV4n1G4xh4F0K1NjhRjZAyFe-1VlYY60i5sOscpZdfNge2xaYzJxj8wuBdNIh4OF4ZW9Z5KTitnrVlAbqawhxDqdDGObgX7pkqt-Lrb";
$ch = curl_init();

$url = "https://fcm.googleapis.com/fcm/send";
$fields = json_encode(array('to'=>$to, 'notification'=>$notif));

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,($fields));

$headers = array();
$headers[] = 'Authorization: key ='.$apiKey;
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
  echo 'Error:' . curl_error($ch);
}
curl_close($ch);?>
<div class="alert alert-success">Notif Terkirim</div>
<?php
}

$to = "/topics/cctv";

$notif = array (
  'title'=> $_POST['judul'],
  'body'=> $_POST['deskripsi']);

sendNotif($to, $notif);



}

if(isset($_POST['delete'])){
  $id = $_POST['id'];
	$row = mysqli_query($koneksi, "DELETE FROM camera WHERE id = '$id'"); ?>

  <div class="alert alert-success">Berhasil</div>

  <!-- <script>
        alert("Dihapus");
        window.location = "id.php";
  </script> -->

	<?php
}

?>

<table class="table" border="0">
<thead>
  <tr>
    <th width="7%">No</th>
    <th width="20%">IP Camera</th>
    <th>Embed</th>
    <th>Description</th>
    <th>Status</th>
    <th>Publish</th>
    <th colspan="2">Action</th>
</tr>
</thead>
<tbody>
  <?php
  $sqlquery = "SELECT * FROM camera ORDER BY sort ASC";
  if ($result = mysqli_query($koneksi, $sqlquery)) {
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
  <tr class="<?php if($row["status"]=="down") { echo "bg-default"; } else { echo "bg-success"; }?> ">
    <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <td><input type="text" class="form-control" name="sort" value="<?php echo $row["sort"];?>"></td>
    <td><input type="text" class="form-control" name="ip" value="<?php echo $row["ip"];?>"></td>
    <td><input type="text" class="form-control" name="embed" value="<?php echo $row["embed"];?>"></td>
    <td><input type="text" class="form-control" name="description" value="<?php echo $row["description"];?>"></td>
    <td>
<select class="form-control" name="status">
  <option <?php if($row["status"]=="down") { echo "selected"; }?> value="down">Disable</option>
  <option <?php if($row["status"]=="up") { echo "selected"; }?> value="up">Enable</option>
</select>
    </td>
    <td>
<select class="form-control" name="publish">
  <option <?php if($row["publish"]=="n") { echo "selected"; }?> value="n">Not Publish</option>
  <option <?php if($row["publish"]=="y") { echo "selected"; }?> value="y">Publish</option>
</select>
</td>
    <!-- <td><button type="submit" name="save" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Edit</button></td> -->
    <!-- <td><button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button></td> -->
    <td><button style="color:white;" type="submit" name="edit" class="btn btn-xs btn-warning" title='Edit'> <i class="fa fa-save" title="Edit"></i> </button></td>
    <td><button type="submit" name="delete" class="btn btn-xs btn-danger" title="Delete"> <i class="fa fa-remove" title='Hapus'></i> </button></td>
  </form>
  </tr>
  <?php
  	}
  		mysqli_free_result($result);
  	}
  ?>
  <tr class="bg-warning">
    <form action="" method="post">
    <td><input type="text" class="form-control" name="sort"></td>
    <td><input type="text" class="form-control" name="ip"></td>
    <td><input type="text" class="form-control" name="embed"></td>
    <td><input type="text" class="form-control" name="description"></td>
    <td>
  <select class="form-control" name="status">
  <option value='n'>Disable</option>
  <option value='y'>Enable</option>
  </select>
    </td>
    <td>
  <select class="form-control" name="publish">
  <option value='n'>Not Publish</option>
  <option value='y'>Publish</option>
  </select>
    </td>
    <td colspan="2"><button type="submit" name="save" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save</button></td>
  </form>
  </tr>
</tbody>
</table>
<br>
<h4>Pesan Maintenance :</h4>
<?php
$sqlquery = "SELECT * FROM message";
if ($result = mysqli_query($koneksi, $sqlquery)) {
$row = mysqli_fetch_assoc($result);
?>
<form action="" method="POST">
  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
<textarea name='message' class="form-control" placeholder="Kosongkan pesan jika tidak ada gangguan.."><?php echo $row["message"];?></textarea>
<button type="submit" style="width:100%;margin-top:5px" class="btn btn-info btn-md" name='updateinfo'>UPDATE</button>
<br><br>
</form>
<?php
} ?>

<br>
<h4>Notif Android :</h4>
<form action="" method="POST">
<input class="form-control" type="text" name="judul" placeholder="Judul Notif">
<textarea name='deskripsi' class="form-control" placeholder="Deskripsi Notif"></textarea>
<button type="submit" style="width:100%;margin-top:5px" class="btn btn-info btn-md" name='notif'>KIRIM</button>
<br><br>
</form>

</div>




  </body>
</html>
<?php } ?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
