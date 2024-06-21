<?php
session_start();
require 'functions.php';
// $user = $_SESSION['email'];
// $data = mysqli_query($koneksi, "SELECT * FROM booking JOIN baju USING (id_baju) WHERE email='$user'");
// if ($data){
//   $sql= mysqli_fetch_array($data);
//   $tgl_mulai = strtotime($sql['tgl_mulai']);
//   $tgl_selesai = strtotime($sql['tgl_selesai']);

//   $selisih_waktu = $tgl_selesai - $tgl_mulai;

//   $durasi_hari = floor($selisih_waktu / (60 * 60 * 24));
// }
// $no= 1;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/sa.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg border-bottom border-body" style="background-color: #e3f2fd;">
    <div class="container">

      <a class="navbar-brand" href="home.php" style="font-family: 'Courgette', cursive;"><img src="./images/kebaya.png" class="img-fluid" style="width: 30px;" alt="">Hiyuna.Id</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 up">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="produk.php">Daftar Baju</a>
          </li>

        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0 up">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i>
              <?php
              if (isset($_SESSION['username'])) {
                $nama_pengguna = $_SESSION['username'];
                echo "$nama_pengguna!";
              } else {
                echo 'Akun';
              }
              ?>
            </a>
            <ul class="dropdown-menu">
              <?php
              if (!isset($_SESSION['username'])) {
                echo '
                                <li><a class="dropdown-item" href="login.php">Profil Setiing</a></li>
                                <li><a class="dropdown-item" href="login.php">Riwayat Sewa</a></li>
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                ';
              } else {
                $role = $_SESSION['role'];
                if ($role == 1) {
                  echo '
                  <li><a class="dropdown-item" href="profile.php">Profil Setiing</a></li>                                   <li><a class="dropdown-item" href="riwayat.php">Riwayat Sewa</a></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  ';
                }
              }
              ?>
              <!-- <li><a class="dropdown-item" href="#">Profil Setiing</a></li>
              <li><a class="dropdown-item" href="#">Update Password</a></li>
              <li><a class="dropdown-item" href="#">Riwayat Sewa</a></li>
              <li><a class="dropdown-item" href="#">Sign Out</a></li> -->
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- bagian 1 -->
  <section class="page5">
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg about.jpeg'); height: 300px;">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 text-center">
            <h1 style="margin-top: 120px; color:white; font-family: 'Playfair Display', serif;">Riwayat Sewa</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end bagian 1 -->

  <!-- tables -->
  <div class="container">
    <!-- Row -->
    <div class="row mt-5">


      <!-- DataTable with Hover -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Data Pembayaran</h6>
          </div>
          <div class="table-responsive p-3">
            <table data-toggle="table" data-search="true" class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Kode Baju</th>
                  <th>Nama Baju</th>
                  <th>Harga</th>
                  <th>Tgl. Mulai</th>
                  <th>Tgl. Selesai</th>
                  <th>Total Harga</th>
                  <th>Durasi</th>
                  <th>Status</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $user = $_SESSION['email'];
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM booking JOIN baju USING (id_baju) WHERE email='$user'");
                foreach ($query as $data) {
                  $status = $data['status_t'];
                  $tgl_mulai = strtotime($data['tgl_mulai']);
                  $tgl_selesai = strtotime($data['tgl_selesai']);

                  $selisih_waktu = $tgl_selesai - $tgl_mulai;

                  $durasi_hari = floor($selisih_waktu / (60 * 60 * 24));

                  echo "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $data['email'] . "</td>
                  <td>" . $data['kode_baju'] . "</td>
                  <td>" . $data['nama_baju'] . "</td>
                  <td>" . $data['harga'] . "</td>
                  <td>" . $data['tgl_mulai'] . "</td>
                  <td>" . $data['tgl_selesai'] . "</td>  
                  <td>" . $data['total_harga'] . "</td>
                  <td>" . $durasi_hari . "</td>
                  <td>";

                  if ($data['status_t'] == 0) {
                    echo '<a href="form_buktibayar.php?id_bayar=' . $data["id_booking"] . '" class="btn btn-primary">Klik Untuk Konfirmasi Bayar</a>';
                  } else if ($data['status_t'] == 1) {
                    echo '<a href="" class="btn btn-light disable">Menunggu Verifikasi</a>';
                  } else if ($data['status_t'] == 2) {
                    echo '<a href="" class="btn btn-danger">Pembayaran Gagal, Silahkan Pesan Kembali</a>';
                  } else {
                    echo '<a href="" class="btn btn-success" disable>Sudah Bayar</a>';
                  }

                  echo "</td>";

                  echo "<td>";

                  if ($data['status_t'] == 0 || $data['status_t'] == 1 || $data['status_t'] == 2) {
                    echo '<a href="" class="btn btn-warning"> Pending</a>';
                  } else if ($data['status_t'] == 3) {
                    echo '<a href="cetak.php?id=' . $data["id_booking"] . '" class="btn btn-success"> Cetak Tiket</a>';
                  }

                  echo "</td>";

                  echo "</tr>";
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>
  <!-- end tables -->

  <footer style="background-color: #e3f2fd;" class="p-1 mt-5">
    <div class="footer d-flex justify-content-center mt-3">
      <p>Copyright @cica2023</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>