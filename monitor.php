<?php
include "connection.php";
?>
<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.0/examples/album/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>CCTV BENGKALIS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="./cctv_files/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./cctv_files/album.css" rel="stylesheet">
  </head>

  <body style="overflow-x:hidden;overflow-y:hidden">


<!-- Histats.com  (div with counter) --><div id="histats_counter" class="fixed-top text-center"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4345769,4,401,118,80,00011111']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4345769&101" alt="" border="0"></a></noscript>

<!-- Histats.com  END  -->
       <!-- Histats.com  END  -->
    <main role="main">

      <div class="album  bg-light">

        <div class="container-fluid">
          <div class="row">
            <?php
            $sqlquery = "SELECT * FROM camera ORDER BY sort ASC";
            if ($result = mysqli_query($koneksi, $sqlquery)) {
            while ($row = mysqli_fetch_assoc($result)) {
              if($row["publish"]=="y") {
            ?>
            <div class="col-md-4" style="margin:0;padding:0">
              <div class="card mb-6 box-shadow">
                <?php
                  if($row["status"]=="up") {
                ?>
                <iframe style="width:100%;height:50vh;border:none;margin:0;padding:0" src="<?php echo $row["embed"];?>?autoplay=true&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <?php } else {
                 ?>
                <img style="height:50vh; width:100%" src="off.jpg">
              <?php }
              ?>
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
