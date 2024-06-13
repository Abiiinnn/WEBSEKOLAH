<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Sidebar Example</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
</head>
<body id="body-pd">
<header class="header" id="header">
  <div class="header_toggle"> 
    <i class='bx bx-menu' id="header-toggle"></i> 
  </div>
  <div class="header_img"> 
    <img src="https://i.imgur.com/hczKIze.jpg" alt=""> 
  </div>
</header>
<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div> 
      <a href="#" class="nav_logo"> 
        <i class='bx bx-layer nav_logo-icon'></i> 
        <span class="nav_logo-name">BBBootstrap</span> 
      </a>
      <div class="nav_list"> 
        <a href="#" class="nav_link active"> 
          <i class='bx bx-grid-alt nav_icon'></i> 
          <span class="nav_name">Dashboard</span> 
        </a> 
        <a href="#" class="nav_link"> 
          <i class='bx bx-user nav_icon'></i> 
          <span class="nav_name">Users</span> 
        </a> 
        <a href="#" class="nav_link"> 
          <i class='bx bx-message-square-detail nav_icon'></i> 
          <span class="nav_name">Messages</span> 
        </a> 
        <a href="#" class="nav_link"> 
          <i class='bx bx-bookmark nav_icon'></i> 
          <span class="nav_name">Bookmark</span> 
        </a> 
        <a href="#" class="nav_link"> 
          <i class='bx bx-folder nav_icon'></i> 
          <span class="nav_name">Files</span> 
        </a> 
        <a href="#" class="nav_link"> 
          <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
          <span class="nav_name">Stats</span> 
        </a> 
      </div>
    </div> 
    <!-- Tautan untuk logout -->
    <a href="logout.php" class="nav_link"> 
      <i class='bx bx-log-out nav_icon'></i> 
      <span class="nav_name">SignOut</span> 
    </a>
  </nav>
</div>
<!--Container Main start-->
<div class="height-100 bg-light">
<div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'koneksi.php';

                        // Periksa koneksi
                        if (mysqli_connect_errno()) {
                            echo "Koneksi database gagal: " . mysqli_connect_error();
                        }

                        // Query untuk mengambil data mahasiswa
                        $query_data = mysqli_query($koneksi, "SELECT * from db_sklh ");
                        while($baris = mysqli_fetch_array($query_data)){ ?>
                            <tr>
                                <td><?php echo $baris['nama']; ?></td>
                                <td><?php echo $baris['npm']; ?></td>
                                <td><?php echo $baris['jurusan']; ?></td>
                            </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
<!--Container Main end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
      const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId);

      // Validasi bahwa semua variabel ada
      if (toggle && nav && bodypd && headerpd) {
        toggle.addEventListener('click', () => {
          // Tampilkan navbar
          nav.classList.toggle('show');
          // Ubah ikon
          toggle.classList.toggle('bx-x');
          // Tambah padding ke body
          bodypd.classList.toggle('body-pd');
          // Tambah padding ke header
          headerpd.classList.toggle('body-pd');
        });
      }
    };

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');
  });
</script>
</body>
</html>
