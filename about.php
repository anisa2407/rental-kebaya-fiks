<?php 
require "functions.php";

session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./assets/sa.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                <ul class="navbar-nav mx-auto  mb-2 mb-lg-0 up">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="produk.php">Daftar Baju</a>
                    </li>
                   
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 up">
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i>
                        <?php 
                       if(isset($_SESSION['username'])){
                        $nama_pengguna = $_SESSION['username'];
                        echo "$nama_pengguna!";
                    } else {
                        echo 'Akun';
                    }
                        ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php 
                            if(!isset($_SESSION['username'])){
                                echo '
                                <li><a class="dropdown-item" href="login.php">Profil Setiing</a></li>
                                <li><a class="dropdown-item" href="login.php">Riwayat Sewa</a></li>
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                ';
                            }else {
                                $role = $_SESSION ['role'];
                                if($role == 1){
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

    <!-- bagian 1 -->
    <section class="page5">
        <div class="hero-wrap hero-bread" style="background-image: url('images/bg about.jpeg'); height: 300px;">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 text-center">
                        <h1 style="margin-top: 120px; color:white; font-family: 'Playfair Display', serif;">About us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end bagian 1 -->

    <!-- bagian 2 -->
    <section class="page6">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 d-flex justify-content-center">
                    <img src="./images/Laura Set Kebaya2.jpeg" class="img-fluid" style="height: 500px; width:100%;" alt="">
                </div>
                <div class="col-md-6 my-5">
                    <h1 class="mt-5 mb-4">Sewa Kebaya Jakarta - Hiyuna.Id</h1>
                    <p>Hiyuna.Id adalah tempat penyewaan kebaya di jakarta yang menyewaan kebaya & gaun untuk berbagai ukuran dan warna. Kami hadir untuk menjawab permintaan customer yang tinggi terhadap sewa kebaya di jakarta. Kami menyedian berbagai jenis kebaya & gaun untuk menunjang kegiatan anda seperti tunangan, wisuda, kondangan dan lain-lain.</p>
                    <a href="produk.php" class="btn btn-info">Sewa Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end bagian 2 -->

    <!-- Bagian 3 -->
    <section class="page-2">
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
    </section>
    <!-- End Bagian 3 -->


    <footer style="background-color: #e3f2fd;" class="p-2 mt-5">
        <div class="footer d-flex justify-content-center mt-3">
            <p>Copyright @cica2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>