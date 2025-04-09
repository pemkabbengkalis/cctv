<?php
include "connection.php";
?>
<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.0/examples/album/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pantau Antrian Penyeberangan Roro Bengkalis - Pakning dan Pakning - Bengkalis">
    <meta name="author" content="Bengkaliskab">
    <link rel="icon" href="favicon.ico">

    <title>CCTV BENGKALIS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="./cctv_files/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./cctv_files/album.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ec6fd0ee66.js" crossorigin="anonymous"></script>
    <style>
      #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.nav-menu-a {
    border-width: thin;
    border-style: solid;
    border-color: white;
    width: 168px;
    background-color: #dc3545;
    padding: 8px;
    border-radius: 9px;
    color: white;
    text-align: center;
}
.nav-menu-a a:hover{
  text-decoration: none;
}
    </style>

<script>
function redirectBasedOnDevice() {
    var userAgent = navigator.userAgent.toLowerCase();
    var isMobile = /android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(userAgent);

    if (isMobile) {
        window.location.href = "index-new.php"; // Change to your mobile link
    }
}

// Run the function when the page loads
redirectBasedOnDevice();
</script>
  </head>

  <body>

    <header >

      <div class="navbar fixed-top box-shadow" style="background: rgb(1,151,61);background: linear-gradient(90deg, rgba(1,151,61,1) 0%, rgba(217,9,9,1) 53%, rgba(249,255,0,1) 100%);">
        <div class="container d-flex justify-content-between">
          <a href="" class="navbar-brand d-flex align-items-center">
            <strong style="color:white"> <img src="cctv.gif" height="30"> CCTV BENGKALIS </strong>  &nbsp;&nbsp;<span class="badge badge-danger">Live !</span>
          </a>


          <div style="display:flex;gap:5px">
          <a class="nav-menu-a" href="/" style="color:white;text-decoration: none;"><i class="fa-solid fa-video"></i> CCTV</a>
          <!-- <a class="nav-menu-a" href="?page=booking" style="color:white;text-decoration: none;"><i class="fa-solid fa-calendar-days"></i> Informasi Booking</a> -->
          <a class="nav-menu-a" href="?page=wisata" style="color:white;text-decoration: none;"><i class="fa-solid fa-map-location-dot"></i> Wisata Bengkalis</a>
          </div>

        

      </div>
    </header>

    <main role="main" style="padding-top:50px">

      <div class="album py-5 bg-light" style="min-height:90vh">

      <?php
         if(isset($_GET['page']) && 'wisata' == $_GET['page']){
          ?>
<div class="container">
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d510462.89001508616!2d101.66618290734127!3d1.733987565257085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1swisata%20kabupaten%20bengkalis!5e0!3m2!1sid!2sid!4v1741760292316!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
          <?php
         }
          else if(isset($_GET['page']) && 'booking' == $_GET['page']){
          ?>
            <!-- <div class="container">
            <h2>Informasi Booking Tiket Kendaraan Roda 4 (Mobil)</h2>
            <!-- Klik tombol ini  : <a target="_blank" href="https://forms.gle/gLJkJBwVPWFCF16b9" class="btn btn-sm btn-danger"><i class="fa-solid fa-ticket"></i> Booking Sakarang</a> -->
            <!-- <br>
            <br>
            <br>
            <table id="customers">
    <thead>
        <tr>
            <th>No</th>
            <th>Hari/Tanggal</th>
            <th>Tujuan</th>
            <th>Jumlah Booking</th>
            <th>Quota Non Booking</th>
        </tr>
    </thead>
    <tbody id="quota-body">
        <tr>
            <td colspan="5">Menunggu data...</td>
        </tr>
    </tbody>
</table>
            </div>
            <br>
            <center><p style="color:black;font-weight:bold">Data di update terakhir saat penutupan pemesanan tiket tanggal 30 maret 2025</p></center>
            <br>
            <br> -->
          <?php
        }else{
          ?>
 <div class="container">


          

<?php
$sqlquery = "SELECT * FROM message";
if ($result = mysqli_query($koneksi, $sqlquery)) {
$row = mysqli_fetch_assoc($result);
if($row['message']!=''){
?>
<div class="alert alert-danger" role="alert">
  <strong> <h3><i class="fa fa-warning"></i> <?php echo $row['message']; ?></h3></strong>
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


          <?php
        }
      ?>

       
		  <div  style="text-align:center">
        <center><a href="./monitor.php" class="btn btn-warning btn-md"><i class="fa fa-expand"></i> Lihat Versi Monitor</a><br><br><a href="https://play.google.com/store/apps/details?id=bengkaliskab.go.id.cctv"><img src="play.png" height="50"></a><br><br></center>
   <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->

<br>
<br>
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
    <p style="line-height:.3em"><b>&copy; 2021 CCTV BENGKALIS </b></span></p>
	<p style="line-height:.9em">Designed By Team IT <a href="https://diskominfotik.bengkaliskab.go.id">Diskominfotik Kabupaten Bengkalis</a> </p>
	<p style="line-height:.3em">Powered by <a href="https://bengkaliskab.go.id">Bengkaliskab.go.id</a> | <a href="https://youtube.com">Youtube.com</a> </p>

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

    

<script>
// Koneksi WebSocket
const socket = new WebSocket('<?php echo $websocket ?>');

socket.onopen = function() {
    console.log("WebSocket Connected!");
};

socket.onmessage = function(event) {
    try {
        let data = JSON.parse(event.data);

        if (data.type === "counter") {
            console.log("Data Counter:", data);
            // Update tampilan counter jika diperlukan
        } else if (data.type === "table") {
            console.log("Data Table:", data.data);
            updateTable(data.data);
        } else {
            console.warn("Jenis data tidak dikenal:", data);
        }
    } catch (error) {
        console.error("Error parsing WebSocket data:", error);
    }
};

// 🔥 Fungsi untuk update tabel
// function updateTable(data) {
//     let tbody = document.querySelector("#customers tbody");
//     tbody.innerHTML = ""; // Hapus isi tabel lama

//     data.forEach((row, index) => {
//         let tr = document.createElement("tr");
//         tr.innerHTML = `
//             <td>${index + 1}</td>
//             <td>${formatTanggal(row.date)}</td>
//             <td>${row.location}</td>
//             <td><center>${row.count}</center></td>
//             <td><center>${row.quota}</center></td>
//         `;
//         tbody.appendChild(tr);
//     });
// }

function updateTable(data) {
    let tbody = document.querySelector("#customers tbody");
    tbody.innerHTML = ""; // Hapus isi tabel lama

    data.forEach((row, index) => {
        let tanggal = new Date(row.date);
        let hari = tanggal.toLocaleDateString('id-ID', { weekday: 'long' }).toLowerCase();

        // Konversi ke format YYYY-MM-DD agar bisa dibandingkan
        let dateStr = tanggal.toISOString().split("T")[0];

        // Cek jika hari adalah Jumat, Sabtu, Minggu, Senin, atau Selasa 8 April 2025
        let isWeekendOrFullDate = ["jumat", "sabtu", "minggu", "senin"].includes(hari) || dateStr === "2025-04-08";
        let quotaDisplay = isWeekendOrFullDate ? "TERISI PENUH" : row.quota;

        let tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${index + 1}</td>
            <td>${formatTanggal(row.date)}</td>
            <td>${row.location}</td>
            <td>${row.count}</td>
            <td>${quotaDisplay}</td>
        `;
        tbody.appendChild(tr);
    });
}



// 🔥 Fungsi untuk format tanggal
function formatTanggal(dateString) {
    let tanggal = new Date(dateString);
    let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    return tanggal.toLocaleDateString('id-ID', options);
}

</script>

    
</body></html>
