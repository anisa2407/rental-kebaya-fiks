<?php
session_start();
require "functions.php";

$user = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$user'");
$ambil = mysqli_fetch_assoc($query);
$email = $ambil['email'];
$nama = $ambil['username'];
$telp = $ambil['no_hp'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/sa.css">
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
                                    <li><a class="dropdown-item" href="profile.php">Profil Setiing</a></li>
                                    <li><a class="dropdown-item" href="riwayat.php">Riwayat Sewa</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    ';
                                }
                            }
                            ?>
                            <!-- <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profil Setiing</a></li>
                            <li><a class="dropdown-item" href="#">Update Password</a></li>
                            <li><a class="dropdown-item" href="#">Riwayat Sewa</a></li>
                            <li><a class="dropdown-item" href="#">Sign Out</a></li>
                        </ul> -->
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
                        <h1 style="margin-top: 120px; color:white; font-family: 'Playfair Display', serif;">Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end bagian 1 -->

    <!-- bagian 2 -->

    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-6">
                <div class="card p-5">
                    <div class="input-group justify-content-center">
                        <h4 class=""><img src="./images/profu.png" width="80px" alt="" srcset=""> <?= $nama ?></h4>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end bagian 2 -->

    <!-- bagian 3 -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <b>Tgl Registrasi - </b>
                <!-- <p>Tgl Update</p> -->
                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $nama; ?>" id="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="<?= $email; ?>" class="form-control">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Nomer Handphone</label>
                        <input type="text" name="no_hp" class="form-control" value="<?= $telp; ?>" id="">
                    </div>
                    <!-- <div class="mb-3 mt-3">
                        <label for="" class="form-label">Date of Birthday (dd/mm/yyyy)</label>
                        <input type="Date" name="" class="form-control" value="" id="">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" name="" class="form-control" value="" id="">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Kota</label>
                        <input type="text" name="" class="form-control" value="" id="">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Negara</label>
                        <input type="text" name="" class="form-control" value="" id="">
                    </div> -->
                    <!-- <button type="submit" class="btn btn-danger mb-5 mt-5 p-2">Save Changes <i class="bi bi-arrow-right-circle-fill"></i></button> -->
                </form>
            </div>
        </div>
    </div>
    <!-- end bagian3 -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>