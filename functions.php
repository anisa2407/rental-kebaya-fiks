<?php 

$koneksi = mysqli_connect('localhost','root','','dbcopy_hiyuna');

function selected($parameter, $value){
    $result = isset($_GET[$parameter]) ? ($_GET[$parameter] == $value ? 'selected' : ''): '';
    return $result;
}

function registrasi($data){
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($koneksi,$data["password"]);
    $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);
    $telepon = $data  ["no_hp"];
    $alamat = $data ["alamat"];
    $ktp = uploadKtp();
    $kk = uploadKK();           

    // cek username sudah ada atau belum 
    $result = mysqli_query($koneksi , "SELECT email FROM users WHERE email= '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert ('Email sudah terdaftar, silahkan gunakan email lain !');
        </script>";

        return false;
    }


    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('Konfirmasi Password tida sesuai!!!');
        </script>";
        return false;
    }

    // enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke databse
    mysqli_query($koneksi, "INSERT INTO users (username, email, password, no_hp, alamat, ktp, kk) VALUES ('$username', '$email', '$password', '$telepon', '$alamat', '$ktp', '$kk')");

    return mysqli_affected_rows($koneksi);
}

function uploadKtp(){
    $file_name = $_FILES ['ktp']['name'];
    $file_size = $_FILES ['ktp']['size'];
    $file_error = $_FILES ['ktp']['error'];
    $file_tmpname = $_FILES ['ktp']['tmp_name'];

    $ekstensiValid = ['jpg','jpeg','png','svg'];
    $ekstensiFile = pathinfo($file_name, PATHINFO_EXTENSION);

    if($file_error === 4){
        echo "<script>
        alert ('Wajib upload foto ya siss');
        </script>";
        return false;
    }elseif (!in_array($ekstensiFile,$ekstensiValid)){
        echo "<script>
        alert ('Ekstensi file harus JPG, PNG, JPEG, SVG');
        </script>";
    }elseif ($file_size > 5000000){
        echo "<script>
        alert ('Maksimal size foto 5 MB');
        </script>";
        return false;
    }
    $newFileName = pathinfo($file_name, PATHINFO_FILENAME). '-' . uniqid() . '.' . $ekstensiFile;
    move_uploaded_file($file_tmpname, './images/datauser/'.$newFileName);
    return $newFileName;
}

function uploadKK(){
    $filename = $_FILES ['kk']['name'];
    $filesize = $_FILES ['kk']['size'];
    $fileerror = $_FILES ['kk']['error'];
    $tmpname = $_FILES ['kk']['tmp_name'];

    $ekstensiValid = ['jpg', 'png', 'svg', 'jpeg'];
    $ekstensiFile = pathinfo($filename, PATHINFO_EXTENSION);

    if($fileerror == 4){
        echo "<script>
        alert ('Wajib Upload Foto ya siss');
        </script>";
        return false;
    }elseif (!in_array($ekstensiFile,$ekstensiValid)){
        echo "<script> 
        alert ('Ekstensi file harus JPG, PNG, SVG, JPEG');
        </script>";
    }elseif ($filesize > 5000000){
        echo "<script> 
        alert ('Maksimal Size 5 MB');
        </script>";
        return false;
    }
    $newName = pathinfo($filename, PATHINFO_FILENAME). '-' . uniqid() . '.' . 
    $ekstensiFile;

    move_uploaded_file($tmpname, './images/datauser/'.$newName);
    return $newName;
}

function updateStatusPembayaran($booking_id, $status) {
    global $koneksi;
 
    // Contoh query update, sesuaikan dengan struktur tabel dan kolom Anda
    $query = "UPDATE booking SET status_t = $status WHERE id_booking = $booking_id";
    mysqli_query($koneksi, $query);


    return true; // Atau sesuaikan dengan logika berhasil/gagal di aplikasi Anda
}

function saveProofPathToDatabase($booking_id, $proofPath) {
    global $koneksi;

    $query = "UPDATE booking SET bukti_bayar = '$proofPath' WHERE id_booking = $booking_id";
    mysqli_query($koneksi, $query);

}

?>