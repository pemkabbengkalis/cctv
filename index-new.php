<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4285f4" />
    <meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">


    <title>Security Camera Shop</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #fff;
            position: fixed;
            color: white;
            padding: 1px;
            width: 100%;
            top: 0;
            text-align: center;
        }
        .top-bar {
    /* display: flex; */
    align-items: center;
    justify-content: space-between;
    padding: 8px;
}
        .top-bar input {
            flex-grow: 1;
            /* margin: 0px 51px; */
            margin-left: 49px;
            margin-right: 20px;
            padding: 8px;
            border-radius: 20px;
            border: none;
        }
        .icons {
            display: flex;
            align-items: center;
        }
        .profile-pic {
            position: relative;
            left: 5px;
            top: 0px;
            width: 71px;
            height: 47px;
            border-radius: 50%;
            margin-left: -12px;
        }
        .search-google{
            width:100%;
        }
        nav {
        width: 100%;
        background: linear-gradient(90deg, rgba(1, 151, 61, 1) 0%, rgba(217, 9, 9, 1) 53%, rgba(249, 255, 0, 1) 100%);
        position: relative;
        /* bottom: 0; */
        display: flex;
        /* justify-content: center; */
        gap: 21px;
        padding: 12px;
    }
        nav button {
            background: none;
            border: none;
            font-size: 16px;
            color: white;
            cursor: pointer;
            padding: 5px 10px;
        }
        .active {
            border-bottom: 2px solid #ffdd10;
        }
        .category {
            display: none;
            background: white;
            margin: 141px 7px;
            padding: 15px;
            border-radius: 10px;
        }
        .active-section {
            display: block;
        }
        .highlight {
            color: #022d93;
        }
         .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .product {
            background: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 100%;
        }
        .product img {
            width: 100%;
        }
        .price {
            color: #ff6600;
            font-weight: bold;
        }
        .cart-btn {
            background: #ff6600;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        .horizontal-card {
            display: flex;
            align-items: center;
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .horizontal-card img {
            width: 80px;
            margin-right: 10px;
        }
        .gcse-search{
            width:100%;
        }
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
    </style>
        <script async src="https://cse.google.com/cse.js?cx=67f658fbc12384b7e">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <div class="top-bar">     
                <div style="display: flex;">
                    <div class="icons">
                       <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjWYh5izgRJmJZznQOlFfkezCC0SiJr4K8iJeS_fPyhFAmAZqiQEALrbkYgmWPH5vAgZ1o3ygipNQsKCPLyHtYGEL3h45ii8dbHyL-z_R_LQ07BxjtU6DgHr8ze8I-4KCZ78HDV_qwBBakRcsYj_x493AlpHypAtKvHwUskEQvj25MmqJ-I3CZLcg/w320-h240/Kab%20bengkalis%20%5Bkoleksilogo.com%5D.png" alt="User Profile" class="profile-pic">
                    </div>
                    <div class="search-google">
                        <div class="gcse-search"></div>
                    </div>
                </div>    
        </div>
        <nav>
        <button class="active" onclick="showSection('cctv', this)">CCTV</button>
        <button onclick="showSection('informasi', this)">Informasi Booking</button>
        <button onclick="showSection('wisata', this)">Wisata</button>
    </nav>


    </header>
    
    <main>
        
        <section id="wisata" class="category">
        <h2><span class="highlight">Daftar</span> Wisata Bengkalis</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d510462.89001508616!2d101.66618290734127!3d1.733987565257085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1swisata%20kabupaten%20bengkalis!5e0!3m2!1sid!2sid!4v1741760292316!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

        <section id="informasi" class="category">
        <h2><span class="highlight">Informasi</span> Booking Roro Bengkalis</h2>
        <table id="customers">
    <thead>
        <tr>
            <th>No</th>
            <th>Hari/Tanggal</th>
            <th>Lokasi</th>
            <th>Jumlah Booking</th>
            <th>Sisa Quota</th>
        </tr>
    </thead>
    <tbody id="quota-body">
        <tr>
            <td colspan="5">Menunggu data...</td>
        </tr>
    </tbody>
</table>
        </section>
        
        <section id="cctv" class="category">
            <h2><span class="highlight">Daftar</span> CCTV</h2>
            <div class="product-list">
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

        <?php
            $sqlquery = "SELECT * FROM camera ORDER BY sort ASC";
            if ($result = mysqli_query($koneksi, $sqlquery)) {
            while ($row = mysqli_fetch_assoc($result)) {
              if($row["publish"]=="y") {
            ?>

                <div class="product">
                <?php
                  if($row["status"]=="up") {
                ?>
                <iframe style="width:100%;height:250px" src="<?php echo $row["embed"];?>?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php } else {
                 ?>
                         <img height="250" src="off.jpg">
                <?php }
                ?>   
              
                    <p class="desc"><?php echo $row["description"];?></p>
                </div>
                <?php
          }
            	}
            		mysqli_free_result($result);
            	}
            ?>
                
            </div>
        </section>
        
        
    </main>
    <script>
// Koneksi WebSocket
const socket = new WebSocket(<?php echo $websocket ?>);

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
function updateTable(data) {
    let tbody = document.querySelector("#customers tbody");
    tbody.innerHTML = ""; // Hapus isi tabel lama

    data.forEach((row, index) => {
        let tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${index + 1}</td>
            <td>${formatTanggal(row.date)}</td>
            <td>${row.location}</td>
            <td>${row.count}</td>
            <td>${row.quota}</td>
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

    <script>
        function showSection(sectionId, button) {
            // Hide all sections
            document.querySelectorAll('.category').forEach(section => {
                section.classList.remove('active-section');
            });

            // Show the selected section
            document.getElementById(sectionId).classList.add('active-section');

            // Remove active class from all buttons
            document.querySelectorAll('nav button').forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to clicked button
            button.classList.add('active');
        }

        // Set default active section to CCTV
        document.addEventListener("DOMContentLoaded", () => {
            showSection('cctv', document.querySelector("nav button.active"));
        });
    </script>
</body>
</html>
