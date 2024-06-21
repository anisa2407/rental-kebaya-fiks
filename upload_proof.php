<?php
require "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['id_booking'];

    // Validasi form dan file jika diperlukan
    // ...

    // Simpan bukti pembayaran ke direktori tertentu
    $uploadDir = "images/datauser/";
    $uploadFile = $uploadDir . basename($_FILES['bukti_bayar']['name']);

    if (move_uploaded_file($_FILES['bukti_bayar']['tmp_name'], $uploadFile)) {
       
        // File berhasil diunggah, perbarui status pembayaran di database
        $status = 2; // Ubah status menjadi "Pending" (sesuai kebutuhan aplikasi Anda)
        updateStatusPembayaran($booking_id, $status); 
        $proofPathInDatabase = "images/datauser/" . basename($_FILES['bukti_bayar']['name']);
        saveProofPathToDatabase($booking_id, $proofPathInDatabase);

        header("Location: Riwayat.php"); 
        exit();
    } else {
        // Gagal mengunggah file
        echo "Gagal mengunggah bukti pembayaran.";
    }
} else {
    // Jika bukan metode POST, redirect ke halaman yang sesuai
    header("Location: riwayat.php");
    exit();
}
?>