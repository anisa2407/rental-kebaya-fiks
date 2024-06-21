<?php
session_start();
require "functions.php";

if ($_SESSION['login'] !== true) {
    echo "<script>
    alert('Login Terlebih Dahulu');
    document.location.href = 'login.php';
    </script>";
}

function Bayar()
{
    $filename = $_FILES['bukti']['name'];
    $filesize = $_FILES['bukti']['size'];
    $fileerror = $_FILES['bukti']['error'];
    $tempname = $_FILES['bukti']['tmp_name'];

    $ekstensiValid = ['png', 'jpg', 'svg', 'jpeg'];
    $ekstensiFile = pathinfo($filename, PATHINFO_EXTENSION);

    if ($fileerror == 4) {
        echo "<script>
        alert ('Wajib Upload Foto ya minnn');
        </script>";
        return false;
    } elseif (!in_array($ekstensiFile, $ekstensiValid)) {
        echo "<script> 
        alert ('Ekstensi File Harus JPG, PNG, SVG, JPEG');
        </script>";
    } elseif ($filesize > 5000000) {
        echo "<script> 
        alert ('Maks ukuran file 5mb') ;
        </script>";
        return false;
    }
    $newFileName = pathinfo($filename, PATHINFO_FILENAME) . '-' . uniqid() . '.' .
        $ekstensiFile;

    move_uploaded_file($tempname, './images/bukti_bayar/' . $newFileName);

    return $newFileName;
};

// function Bayar(){
//     $namaFile = $_FILES['bukti']['name'];
//     $size = $_FILES['bukti']['size'];
//     $error = $_FILES['bukti']['error'];
//     $tmpname = $_FILES['bukti']['tmp_name'];

//     $ekstensiValid = ['jpg', 'png' ,'jpeg'];
//     $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);

//     if ($error == 4) {
//         echo '<script>
//         alert ("Wajib Upload Foto");
//         </script>';
//         return false;
//     } else if (!in_array($ekstensiFile, $ekstensiValid)) {
//         echo "<script>
//         alert ('Ekstensi File Harus jpg, png, jpeg');
//         </script>";
//         return false;
//     } else if ($size > 5000000) {
//         echo "<script>
//         alert ('Maksimal File 5 MB');
//         </script>";
//         return false;
//     }

//     $newname = pathinfo($namaFile, PATHINFO_FILENAME) . '-' . uniqid() . '-' . $ekstensiFile;
//     move_uploaded_file($tmpname, './images/bukti_bayar/' . $newname);

//     return $newname;
// }

$id_bayar = $_GET['id_bayar'];

if (isset($_POST['booking'])) {
    global $koneksi;

    $pesanan = $_POST['id_booking'];
    $nama = $_POST['nama'];
    $gambar = Bayar();
    if (!$gambar) {
        echo "<script>
        alert('Harus Upload Foto');
        </script>";

        return false;
    }

    $sql = mysqli_query($koneksi, "INSERT INTO pembayaran VALUES (NULL,'$pesanan','$nama','$gambar')");

    $query = mysqli_query($koneksi, "UPDATE booking SET status_t = 1 WHERE id_booking = '$id_bayar'");

    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
        alert ('Pembayaran Telah Berhasil');
        document.location.href = 'riwayat.php';
        </script>";
    } else {
        echo "<script>
        alert('Pembayaran Telah Gagal');
        document.location.href = 'produk.php';
        </script>";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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

    <div class="container">
        <div class="row justify-content-center mt-5">
            <h1 class="text-center">Form Bukti Bayar</h1>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_booking" value="<?= $id_bayar ?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="" aria-describedby="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Upload Bukti Bayar</label>
                        <input type="file" name="bukti" class="form-control" id="" aria-describedby="">
                    </div>
                    <button type="submit" name="booking" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>