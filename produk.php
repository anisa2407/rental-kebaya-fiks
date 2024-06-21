<?php
session_start();
require "functions.php";
$sql = "SELECT * FROM baju JOIN merk USING (id_merk) ";

if (isset($_GET['keyword'])) {
    $key = $_GET['keyword'];
    $filter = $_GET['filter'];
    $sort = $_GET['sort'];

    $whereNama = " WHERE nama_baju LIKE '%$key%'";
    if ($_GET['filter'] == 'all') {
        switch ($sort) {
            case 'a_z':
                $baju = mysqli_query($koneksi, $sql . $whereNama . "ORDER BY nama_baju ASC");
                break;
            case 'z_a':
                $baju = mysqli_query($koneksi, $sql . $whereNama . "ORDER BY nama_baju DESC");
                break;
            case 'harga_termurah':
                $baju = mysqli_query($koneksi, $sql . $whereNama . "ORDER BY harga ASC");
                break;
            case 'harga_termahal':
                $baju = mysqli_query($koneksi, $sql . $whereNama . "ORDER BY harga DESC");
                break;
            default:
                $baju = mysqli_query($koneksi, $sql . $whereNama);
        }
    } else {
        $whereMerk = " AND id_merk = '$filter'";
        switch ($sort) {
            case 'a_z':
                $baju = mysqli_query($koneksi, $sql . $whereNama . $whereMerk . "ORDER BY nama_baju ASC");
                break;
            case 'z_a':
                $baju = mysqli_query($koneksi, $sql . $whereNama . $whereMerk . "ORDER BY nama_baju DESC");
                break;
            case 'harga_termurah':
                $baju = mysqli_query($koneksi, $sql . $whereNama . $whereMerk . "ORDER BY harga ASC");
                break;
            case 'harga_termahal':
                $baju = mysqli_query($koneksi, $sql . $whereNama . $whereMerk .  "ORDER BY harga DESC");
                break;
            default:
                $baju = mysqli_query($koneksi, $sql . $whereNama . $whereMerk);
        }
    }
} else {
    $baju = mysqli_query($koneksi, $sql);
}

$merk = mysqli_query($koneksi, "SELECT * FROM merk ");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/sa.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kalam&display=swap');
</style>

<body style="background-color: #96B6C5;">
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
                        <a class="nav-link" aria-current="page" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="produk.php">Daftar Baju</a>
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

    <!-- bagian 1 -->
    <section class="page5">
        <div class="hero-wrap hero-bread" style="background-image: url('images/bg about.jpeg'); height: 300px;">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 text-center">
                        <h1 style="margin-top: 120px; color:white; font-family: 'Playfair Display', serif;">Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end bagian 1 -->

    <!-- Bagian 2 -->
    <section>
        <div class="produk mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-5">
                        <h1 class="up text-white text-center">Produk Kami</h1>
                        <form action="" method="GET">
                            <div class="input-group mt-5 mb-5">
                                <input type="search" name="keyword" id="" class="form-control" placeholder="Cari..." value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">

                                <select name="filter" class="form-select">
                                    <option value="all">All</option>
                                    <?php foreach ($merk as $data) : ?>
                                        <option value="<?= $data['id_merk'] ?>" <?= isset($_GET['filter']) ? ($_GET['filter'] == $data['id_merk'] ? 'selected' : '') : '' ?>>
                                            <?= $data['nama_merk'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <select name="sort" class="form-select" id="">
                                    <option value="none" <?= selected('sort', 'none') ?>>None</option>
                                    <option value="a_z" <?= selected('sort', 'a_z') ?>>A-Z</option>
                                    <option value="z_a" <?= selected('sort', 'z_a') ?>>Z-A</option>
                                    <option value="harga_termurah" <?= selected('sort', 'harga_termurah') ?>>Harga Termurah</option>
                                    <option value="harga_termahal" <?= selected('sort', 'harga_termahal') ?>>Harga Termahal</option>
                                </select>
                                <button type="submit" class="btn" style="background-color: #C38154;">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-5">
                    <?php foreach ($baju as $produk) : ?>
                        <div class="col-md-3 d-flex justify-content-center mb-5">
                            <div class="card" style="width: 17rem;">
                                <img src="./ruang-admin/images/dump/<?= $produk['img1'] ?>" style="height: 300px;" class="card-img-top img-fluid" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= $produk['nama_baju'] ?></h5>
                                    <h6 class="card-text">Rp. <?= $produk['harga'] ?></h6>
                                    <a href="detail.php?hiyuna=<?= $produk['nama_baju'] ?>" class="btn button2" style="background-color: #C38154;"><b class="bi bi-justify"></b></a>
                                    <a href="booking.php?hiyuna=<?= $produk['id_baju']; ?>" class="btn button2" style="background-color: #C38154;"><i class="bi bi-cart-plus-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- END Bagian 2 -->

    <footer style="background-color: #e3f2fd;" class="p-1 mt-5">
        <div class="footer d-flex justify-content-center mt-3">
            <p>Copyright @cica2023</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>