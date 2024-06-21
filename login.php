<?php
session_start();
require "functions.php";

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' ");

  // Cek Email 
  if (mysqli_num_rows($result) === 1) {
    // cek password 
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      
      // set session
      $_SESSION['login'] = true; 
      $_SESSION['username'] = $row['username'];
      $_SESSION['email'] = $row['email'];
      //$_SESSION['no_hp'] = $row['no_hp'];
      $_SESSION['role'] = $row['role'];
      

      if ($row['role'] == 2){
        echo "<script>
        alert('Selamat datangng admin!');
        document.location.href = './ruang-admin/dashboard.php';
        </script>";
      } else if ($row['role'] == 1){
        echo "<script>
        alert ('Selamat Datang di Website');
        document.location.href = './home.php';
        </script>";
      }
    } else {
      echo "<script>
        alert ('Anda gagal login');
        header('location: login.php');
        </script>";
    }
  }

  $error = true;
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
                    <h1 class="h4 text-gray-900 mb-4 mt-5">Login</h1>

                  </div>
                  <form action="" method="post">
                    <div class="form-group mt-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group mt-3">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword">
                    </div>
                    <div class="form-group mt-3">
                      <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                    </div>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small " href="register.php">Already have an account?</a>
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