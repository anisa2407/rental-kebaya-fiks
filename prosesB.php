<?php 
session_start();
 require "functions.php";
 global $koneksi;

// $tglmulai = $_POST ['tgl_mulai'];
// $id = $_POST['id_baju'];
// $id_merek = $_POST['id_merk'];
// $id_user = $_SESSION['role']; 
// $durasi = '3hari';
// $alamat = $_POST ['alamat'];
// $pesan = $_POST ['pesan'];
// $kode_booking = rand();
// $transaction_status = 'belum_melakukan_pembayaran';

// mysqli_query($koneksi, "INSERT INTO booking (id_baju, id_merk, id_user, tgl_mulai ,durasi,alamat,pesan,kode_booking,transaction_status) VALUES ('$id', '$id_merek', '$id_user','$tgl_mulai','$durasi', '$alamat','$pesan','$kode_booking','$transaction_status')");


// query bener bawah

// $baju = $_POST ['id_baju'];
  
    $id_user = $_SESSION ['role'];
    $id_baju = $_POST ['id_baju'];
    $email = $_SESSION ['email'];
    $tgl_mulai = $_POST ['tgl_mulai']; 
    $tgl_selesai = $_POST ['tgl_selesai'];
    $biaya_kirim = $_POST ['biaya_kirim'];
    $alamat = $_POST ['alamat_d'];
    
    $pesan = $_POST ['pesan'];
    $kode_booking = rand();
    $transaction_status = 0;
    $durasi = $_POST['durasi'];
    $harga_query = mysqli_query($koneksi, "SELECT harga FROM baju WHERE id_baju = '$id_baju'");
    $row = mysqli_fetch_assoc($harga_query);
    $harga = $row['harga'];
    $total_harga = $_POST['total_harga'];
    // $status = 0;
    

    $query = mysqli_query($koneksi, "INSERT INTO `booking` VALUES (NULL,$id_user, '$id_baju','$email' , '$tgl_mulai','$tgl_selesai', '$biaya_kirim', '$total_harga', '$alamat', '$pesan','$kode_booking', '$transaction_status')");
    var_dump($query);
    if (mysqli_affected_rows($koneksi)>0){
        echo "
        <script> 
        alert ('berhasil');
        </script>
        ";
     header("location:./midtrans/examples/snap/checkout-process-simple-version.php?kode_booking=$kode_booking");
    } else{
        echo "
        <script> 
        alert ('gagal');
        </script>
        ";
    }

 

?>