<?php
session_start();
require "./ruang-admin/includes/function.php";
global $connect;

$id = $_GET['hiyuna'];
$produk = mysqli_query($connect, "SELECT * FROM baju JOIN merk USING (id_merk) WHERE nama_baju= '$id' ");
$ambildata = mysqli_fetch_assoc($produk);

$img1 = $ambildata['img1'];
if ($img1 == null) {
    $foto1 = 'Tidak ada foto detail';
} else {
    $foto1 = '<img src="./ruang-admin/images/dump/' . $img1 . '" alt= "imgProduk" class="img-fluid" mb-4">';
}
$img2 = $ambildata['img2'];
if ($img2 == null) {
    $foto2 = 'Tidak ada foto detail';
} else {
    $foto2 = '<img src="./ruang-admin/images/dump/' . $img2 . '" alt= "imgProduk" class="img-fluid" mb-4">';
}

$img3 = $ambildata['img3'];
if ($img3 == null) {
    $foto3 = 'Tidak ada foto detail';
} else {
    $foto3 = '<img src="./ruang-admin/images/dump/' . $img3 . '" alt= "imgProduk" class="img-fluid" mb-4">';
}


$nama_baju = $ambildata['nama_baju'];
$nama_merk = $ambildata['nama_merk'];
$deskripsi = $ambildata['deskripsi'];
$detail = $ambildata['detail'];
$harga = $ambildata['harga'];


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./assets/sa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <!-- navbar -->
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
                                echo "$nama_pengguna";
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
                                <li><a class="dropdown-item" href="login.php">Update Password</a></li>
                                <li><a class="dropdown-item" href="login.php">Riwayat Sewa</a></li>
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                ';
                            } else {
                                $role = $_SESSION['role'];
                                if ($role == 1) {
                                    echo '
                                    <li><a class="dropdown-item" href="profile.php">Profil Setiing</a></li>
                                    <li><a class="dropdown-item" href="uppas.php">Update Password</a></li>
                                    <li><a class="dropdown-item" href="riwayat.php">Riwayat Sewa</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    ';
                                }
                            }
                            ?>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profil Setiing</a></li>
                                <li><a class="dropdown-item" href="#">Update Password</a></li>
                                <li><a class="dropdown-item" href="#">Riwayat Sewa</a></li>
                                <li><a class="dropdown-item" href="#">Sign Out</a></li>
                            </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- bagian 1 -->
    <section class="page6">
        <div class="hero-wrap hero-bread img-fluid" style="background-image: url('images/detail.jpeg'); height: 300px;">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 text-center">
                        <h1 style="margin-top: 120px; color:white; font-family: 'Playfair Display', serif;"><b>Details</b></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end bagian 1 -->

    <!-- bagian 2 -->
    <section class="ftco-section">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <img src="./ruang-admin/images/dump/<?= $img1; ?>" class="img-fluid mb-4" style="height: 420px; width:460px;" alt="Colorlib Template">

                    <img src="./ruang-admin/images/dump/<?= $img3; ?>" class="img-fluid mb-4" style="height: 420px; width:460px;" alt="Colorlib Template">

                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <img src="./ruang-admin/images/dump/<?= $img2; ?>" class="img-fluid mb-4" style="height: 420px; width:460px;" alt="Colorlib Template">
                    <h3><?= $nama_baju ?></h3>
                    <h3 style="color: grey;"><?= $nama_merk ?></h3>
                    <p class="price"><span>Rp. <?= $harga ?></span></p>
                    <p><?= $detail ?></p>
                    <p><?= $deskripsi ?></p>

                    <a href="booking.php?hiyuna=<?= $nama_baju ?>" class="btn btn-danger ">Sewa Kebaya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- end bagian 2 -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>