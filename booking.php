<?php
session_start();
require "functions.php";
global $koneksi;

//$role = $_SESSION ['role']
$id = $_GET['hiyuna'];
$sql = mysqli_query($koneksi, "SELECT * FROM baju JOIN merk ON baju.id_merk = merk.id_merk WHERE id_baju = '$id'");
$ambil = mysqli_fetch_assoc($sql);
// $sql2 =
$img1 = $ambil['img1'];
if ($img1 == null) {
    $foto1 = 'Tidak ada foto detail';
} else {
    $foto1 = '<img src="./ruang-admin/images/dump/' . $img1 . '" alt= "imgProduk" class="img-fluid" ">';
}
$nama_baju = $ambil['nama_baju'];
$nama_merk = $ambil['nama_merk'];
$detail = $ambil['detail'];
$harga = $ambil['harga'];

// QUERY INSERT ;
// if (isset($_POST['bayar'])){
//     global $koneksi;
//     $user = $_SESSION['role'];
//     $baju = $_POST ['id_baju'];
//     $kode_booking = rand();
//     $tgl_mulai = $_POST ['tgl_mulai'];
//     $durasi = '3hari';
//     $alamat = $_POST ['alamat'];
//     $pesan = $_POST ['pesan'];
//     $transaction_status = 'belum_melakukan_pembayaran';

//     //$databaju = mysqli_query($koneksi, "SELECT * FROM baju WHERE id_baju=$baju");

//     $booking = mysqli_query($koneksi, "INSERT INTO booking2 VALUES (NULL, '$user', '$baju','$kode_booking','$tgl_mulai','$durasi','$alamat','$pesan','$transaction_status')");
//     //var_dump($transaction_status); die;

//     if (mysqli_affected_rows($koneksi) > 0 ){
//         echo "<script> 
//         alert ('Berhasil');
//         </script>";
//     } else {
//         echo "<script> 
//         alert ('Gagal');
//         </script>";
//     }
// }
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

<body style="background-color: #96B6C5;">
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
                                <li><a class="dropdown-item" href="login.php">Update Password</a></li>
                                <li><a class="dropdown-item" href="login.php">Riwayat Sewa</a></li>
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                ';
                            }else {
                                $role = $_SESSION ['role'];
                                if($role == 1){
                                    echo '
                                    <li><a class="dropdown-item" href="profile.php">Profil Setiing</a></li>
                                    <li><a class="dropdown-item" href="uppas.php">Update Password</a></li>
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
                        <h1 style="margin-top: 120px; color:white; font-family: 'Playfair Display', serif;">Booking</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end bagian 1 -->

    <!-- bagian 2 -->
    <section class="ftco-section ftco-no-pb ftco-no-pt" id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mt-3 img img-2 d-flex justify-content-center align-items-center">
                    <img src="./ruang-admin/images/dump/<?= $img1 ?>" class="img-fluid" style="height: 320px;" alt="" srcset="">
                </div>
                <div class="col-md-3 py-5 wrap-about pb-md-5 ftco-animate d-flex justify-content-center align-items-center">
                    <div class="heading-section-bold mb-5 ">
                        <div class="ml-md-0">
                            <h4 class="mb-2"><?= $nama_baju;?></h2>
                                <h6 class="mb-2 text-center">By</h6>
                                <h4 class="mb-2"><?= $nama_merk; ?></h4>

                                <h3 class="mb-4" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color:crimson ">Rp. <?= $harga; ?></h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 py-3 pt-md-5 justify-content-center">
                    <div class="mt-5 ">
                        <?php foreach ($sql as $item):?>
                        <form action="prosesB.php" method="post">
                       <input type="hidden" name="id_baju" value="<?= $item['id_baju']; ?>">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai</label>
                                    <input type="date" v-model="tgl_mulai" name="tgl_mulai" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col mt-3">
                                <div class="form-group">
                                    <label for="">Tanggal Selesai</label>
                                    <input type="date" v-model="tgl_selesai" name="tgl_selesai"  class="form-control" id="">
                                </div>
                            </div>
                            <div class="col mt-3">
                                <div class="form-group">
                                    <label for="">Biaya Kirim</label>
                                    <input type="text" v-model="biaya_kirim" name="biaya_kirim"  class="form-control" id="">
                                </div>
                            </div>
                            <input type="hidden" name="durasi" id="durasi" value="">
                            <div class="col mt-3">
                                <div class="form-group">
                                    <label for="">Total Harga</label>
                                    <input type="text" name="total_harga" :value="total_harga" readonly class="form-control" id="">
                                </div>
                            </div>
                            <div class="col mt-3">
                                <div class="form-group">
                                    <label for="">Alamat Detail</label>
                                    <input type="text" name="alamat_d" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col mt-3">
                                <div class="form-group">
                                    <label for="">Pesan</label><br>
                                    <textarea name="pesan" id="" cols="71" rows="3"></textarea>
                                </div>
                            </div>
                            <?php 
                            if (!isset($_SESSION['username'])){
                                echo '
                                <a href="login.php" class="btn btn-primary mt-5">Login dulu sis</a>
                                ';
                            } else {
                                $role = $_SESSION ['role'];
                                if ($role == 1){
                                    echo '
                                    <button type="submit" name="bayar" class="btn btn-primary mt-5 ">Cek booking</button>
                                    ';
                                }
                            }
                            ?>
                            
                            <!-- <button type="submit" name="bayar" class="btn btn-primary mt-5 ">Cek booking</button> -->
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </section>

    <!-- End bagian 2 -->

    <footer style="background-color: #e3f2fd;" class="p-1 mt-5">
        <div class="footer d-flex justify-content-center mt-3">
            <p>Copyright @cica2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function hitungDurasi() {
            var tglMulai = new Date(document.querySelector('input[name="tgl_mulai"]').value);
            var tglSelesai = new Date(document.querySelector('input[name="tgl_selesai"]').value);
            var durasi = (tglSelesai - tglMulai) / (1000 * 60 * 60 * 24);
            document.getElementById('durasi').value = durasi;
        }

        // Event listener untuk memanggil fungsi hitungDurasi saat tanggal berubah
        document.querySelector('input[name="tgl_mulai"]').addEventListener('change', hitungDurasi);
        document.querySelector('input[name="tgl_selesai"]').addEventListener('change', hitungDurasi);
    </script>
    <script type="module">
        import { createApp} from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

        createApp({
            data(){
                return {
                    tgl_mulai: '',
                    tgl_selesai: '',
                    durasi: 0,
                    harga: <?= $harga ?>, 
                    total_harga: 0,
                    biaya_kirim: 15000,
                }
            },
            watch: {
                tgl_mulai: 'hitungDurasi',
                tgl_selesai: 'hitungDurasi',
            },
            methods: {
                hitungDurasi() {
                    const tglMulai = new Date(this.tgl_mulai);
                    const tglSelesai = new Date(this.tgl_selesai);
                    const timeDiff = tglSelesai - tglMulai;
                    this.durasi = timeDiff / (1000 * 60 * 60 * 24);
                    this.total_harga = this.durasi * this.harga + this.biaya_kirim;
                }
            }
        }).mount('#app')
    </script>

</body>

</html>