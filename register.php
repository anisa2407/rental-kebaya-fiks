<?php
require "functions.php";

if (isset($_POST['register'])) {
  if(registrasi($_POST) > 0 ) {
    echo "<script>
    alert ('User baru berhasil di tambahkan!');
    document.location.href = 'login.php';
    </script>";
  } else{
    echo mysqli_error($koneksi);
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
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gradient-login">
    <!-- Register Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 mb-4">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 mt-5">Register</h1>
                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group mt-5">
                                            <input type="text" name="username"  class="form-control" placeholder="Nama Lengkap" id="">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" name="no_hp" class="form-control" placeholder="Nomor Telepon Aktif" id="">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email Aktif" id="exampleInputEmail">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" name="alamat" placeholder="Alamat Valid" class="form-control" id="">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Upload Foto KTP</label>
                                            <input type="file" name="ktp" class="form-control" id="">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Upload Foto KK</label>
                                            <input type="file" name="kk" class="form-control" id="">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="password" name="password" placeholder="Maukkan Password" class="form-control" id="exampleInputPassword">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="password" name="password2" placeholder="Konfirmasi Password" class="form-control" id="exampleInputPasswordRepeat">
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                               <p style="font-size: 10pt;"> Saya Setuju dengan Syarat dan Ketentuan yang berlaku </p>
                                            </label>
                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold small " href="login.php">Already have an account?</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>