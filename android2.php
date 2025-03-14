<?php
include "connection.php";
?>
<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.0/examples/album/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pantau Antrian Penyeberangan Roro Bengkalis - Pakning dan Pakning - Bengkalis">
    <meta name="author" content="Bengkaliskab">
    <link rel="icon" href="https://bengkaliskab.go.id/favicon.ico">

    <title>CCTVs BENGKALIS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="./cctv_files/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./cctv_files/album.css" rel="stylesheet">
  </head>

  <body>

    <header >

      <div class="navbar fixed-top box-shadow" style="background: rgb(1,151,61);background: linear-gradient(90deg, rgba(1,151,61,1) 0%, rgba(217,9,9,1) 53%, rgba(249,255,0,1) 100%);">
        <div class="container d-flex justify-content-between">
          <a href="" class="navbar-brand d-flex align-items-center">
            <strong style="color:white"> <img src="cctv.gif" height="30"> CCTV BENGKALIS </strong>  &nbsp;&nbsp;<span class="badge badge-danger">Live !</span>
          </a>

      </div>
    </header>

    <main role="main" style="padding-top:50px">

      <div class="album py-5 bg-light" style="min-height:90vh">

        <div class="container">
    <div class="modal fade" id="myModal" style="margin-top:100px;">
    <div class="modal-dialog" style="padding-top:50px;">

      <!-- Modal content-->
      <div class="modal-content" >

        <div class="modal-body">
          <p>Terdapat Pembaruan Aplikasi ke versi 1.0.2, update untuk menikmati fitur <b>fullscreen</b> </p>
        </div>
        <div class="modal-footer">
          <button onclick="notshoagain()" data-dismiss="modal" type="button" class="btn btn-default">Nanti Saja</button>
          <button onclick="nts()" data-dismiss="modal" type="button" class="btn btn-success">Sudah Update</button>
          <a onclick="nt()"  style="color:white;" class="btn btn-primary" type="button" class="btn btn-default">Update</a>
        </div>
      </div>


    </div>
  </div>
  <?php
if(!isset($_COOKIE['msg'])) {
     ?>
     <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<?php
}else {

}
?>
<script>
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function notshoagain() {
  var jangantampilkan = getCookie("msg");
  setCookie("msg", jangantampilkan,1);
}
function nt() {
  var jangantampilkan = getCookie("msg");
  setCookie("msg", jangantampilkan,3000000);
  window.location.href = "https://play.google.com/store/apps/details?id=bengkaliskab.go.id.cctv";
}
function nts() {
  var jangantampilkan = getCookie("msg");
  setCookie("msg", jangantampilkan,3000000);

}
</script>


      <?php
      $sqlquery = "SELECT * FROM message";
      if ($result = mysqli_query($koneksi, $sqlquery)) {
      $row = mysqli_fetch_assoc($result);
      if($row['message']!=''){
      ?>
      <div class="alert alert-danger" role="alert">
        <strong> <i class="fa fa-warning"></i> <?php echo $row['message']; ?></strong>
      </div>
      <?php } } ?>

      <div class="row">

        <?php
        $sqlquery = "SELECT * FROM camera ORDER BY sort ASC";
        if ($result = mysqli_query($koneksi, $sqlquery)) {
        while ($row = mysqli_fetch_assoc($result)) {
          if($row["publish"]=="y") {
        ?>

        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <?php
              if($row["status"]=="up") {
            ?>
            <iframe style="width:100%;height:250px" src="<?php echo $row["embed"];?>?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <?php } else {
             ?>
            <img height="250" src="off.jpg">
          <?php }
          ?>
            <div class="card-body">
              <p class="card-text" style="text-align:center"><small><b><?php echo $row["description"];?></b></small></b></p>
            </div>
          </div>
        </div>

        <?php
      }
          }
            mysqli_free_result($result);
          }
        ?>

      </div>
        </div>
        </div>

      </main>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./cctv_files/jquery-3.2.1.slim.min.js.download" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./cctv_files/popper.min.js.download"></script>
    <script src="./cctv_files/bootstrap.min.js.download"></script>
    <script src="./cctv_files/holder.min.js.download"></script>
</body></html>
