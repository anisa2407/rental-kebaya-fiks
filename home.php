<?php
session_start();
require "functions.php";

$query = mysqli_query($koneksi, "SELECT * FROM baju JOIN merk USING (id_merk) where nama_merk= 'Jaleela' AND status_b = 'active'  ");



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/ry.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Alata&family=Courgette&family=Kaushan+Script&family=Mukta+Malar:wght@200&display=swap');
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg border-bottom border-body" style="background-color: #e3f2fd;">
        <div class="container">

            <a class="navbar-brand" href="home.php" style="font-family: 'Courgette', cursive;"><img src="./images/kebaya.png" class="img-fluid" style="width: 30px;" alt="">Hiyuna.Id</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto  mb-2 mb-lg-0 up">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="produk.php">Daftar Baju</a>
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
                            <!-- <li><a class="dropdown-item" href="#">Profil Setiing</a></li>
                            <li><a class="dropdown-item" href="#">Update Password</a></li>
                            <li><a class="dropdown-item" href="#">Riwayat Sewa</a></li>
                            <li><a class="dropdown-item" href="logout.php">Sign Out</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Bagian Satu -->
    <div class="ses1">
        <div class="container">
            <div class="row text">
                <div class="col-md-7 mt-5 up">
                    <h1 class="mt-5">Sewa Kebaya Jakarta</h1>
                    <h2>~Hiyuna.ID</h2>
                    <h5 class="mt-5 mb-3">Hiyuna.Id adalah tempat penyewaan kebaya di jakarta yang menyewaan kebaya & gaun berbagai ukuran dan warna untuk acara pernikahan, pre-wedding, wisuda, birthday party, kondangan.</h5>
                    <a href="about.php" class="btn btn-outline-primary mt-5">Lihat Detail</a>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-4 d-flex justify-content-center mt-5 mb-5">
                    <img src="./images/Zenaya in Light Rose.jpeg" style="height: 410px; width:100%;" class="img-fluid" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height: 500px; width: 100%;" src="./images/carosel2.jpeg" class="d-block img-fluid" alt="...">
    </div>
  </div>
</div> -->
    <!-- End Bagian satu -->

    <!-- Bagian 2 -->
    <!-- <section class="page-2">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 mt-5 mb-5 ">
                    <div class="input-group mt-3 d-flex justify-content-center">
                        <img src="./images/dress.png" class="img-fluid" style="width: 120px;" alt="">
                        <p class="mt-5 text-center">Pilih gaun atau kebaya desainer favoritmu di Hiyuna.Id. Stylist kami siap membantu untuk memilih gaun / kebaya yang sesuai denganmu.</p>
                    </div>
                </div>

                <div class="col-md-4 mt-5 mb-5">
                    <div class="input-group mt-3 d-flex justify-content-center">
                        <h1 class="bi bi-instagram" style="font-size: 67pt; color:#6794a7"></h1>
                        <p class="mt-5 text-center">Nikmati penampilanmu yang cantik & elegan dengan balutan karya desainer. Jangan lupa untuk berbagi pengalamanmu menggunakan kebaya dan gaun dengan cara mengunggah di Instagram / Social Media mu dan tag @hiyuna.id</p>
                    </div>
                </div>

                <div class="col-md-4 mt-5 mb-5">
                    <div class="input-group mt-3 d-flex justify-content-center">
                        <h1 class="bi bi-house-add-fill" style="font-size: 67pt; color:#6794a7"></h1>
                        <p class="mt-5 text-center">Untuk wilayah Jakarta, kurir kami akan mengambil di tempat Anda (menggunakan ongkir). Untuk luar selain itu, kembalikan ke kami menggunakan JNE YES / TIKI ONS dengan alamat yang telah disediakan. Dry cleaning is on us!</p>
                    </div>
                </div>

            </div>
            <div class="btn d-flex justify-content-center mb-5">
                <a href="produk.php" class="btn btn-outline-primary bi bi-arrow-right-short">Koleksi Kami<i class="bi bi-arrow-left-short"></i></a>
            </div>

        </div>
    </section> -->
    <!-- End Bagian 2 -->

    <!-- Bagian 3 -->

    <!-- end bagian 3 -->

    <!-- Bagian 4 -->
    <section class="page4">
        <div class="container">
            <div class="row">
                <div class="text-center mt-5 mb-5">
                    <h5 class="up" style="color:#6794a7; font-family: 'Courgette', cursive; ">Hiyuna.Id Produk</h5>
                    <h1 class="mt-4 up">Produk Kami</h1>
                    <p style="color: gray;">sewa kebaya & gaun untuk berbagai ukuran dan warna.</p>
                </div>
                <?php foreach ($query as $data) : ?>
                    <div class="col-md-3 mb-5 d-flex justify-content-center my-3">
                        <div class="card text-center" style="width: 17rem;">
                            <img src="./ruang-admin/images/dump/<?= $data['img1'] ?>" style="height: 300px;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data['nama_baju'] ?></h5>
                                <h6 class="card-text text-danger"><b>Rp.<?= $data['harga'] ?></b></h6>
                                <a href="booking.php?hiyuna=<?= $data['id_baju']; ?>" class="btn btn-info button5"><i class="bi bi-cart-plus-fill"> Sewa</i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- end bagian 4 -->

    <footer style="background-color: #e3f2fd;" class="p-1 mt-5">
        <div class="footer d-flex justify-content-center mt-3">
            <p>Copyright @cica2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>