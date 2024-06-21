<?php

// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-piy84ncRzGPg9PTjTkoGCrkp';
Config::$clientKey = 'SB-Mid-client-cbO8mDJi36wQADQy';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// Required
session_start();
require "../../../functions.php";
$kode_booking = $_GET['kode_booking'];
// query untuk menampilkan data berdasarkan order id yang dikirim
$data = "SELECT * FROM booking JOIN baju USING (id_baju) WHERE kode_booking = '" . $kode_booking . "'";
$sql = mysqli_query($koneksi, $data); //menjalankan query dari variabel $query
$item = mysqli_fetch_array($sql);

$alamat = $item ['alamat_d'];
$harga = $item ['harga'];
$baju = $item ['nama_baju'];
$nama = $_SESSION ['username'];
$email = $_SESSION ['email'];




$transaction_details = array(
    'order_id' => $kode_booking,
    'gross_amount' => 179000, // no decimal allowed for creditcard
);
// Optional
$item_details = array (
    array(
        'id' => 'a1',
        'price' => $harga,
        'quantity' => 1,
        'name' => "$baju",
        
    ),
  );
// Optional
$customer_details = array(
    'first_name'    => "$nama",
    'email'         => "$email",
    'alamat'        => "$alamat"
    // 'billing_address'  => $billing_address,
    // 'shipping_address' => $shipping_address
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}
//echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<SB-Mid-server-piy84ncRzGPg9PTjTkoGCrkp>\';');
        die();
    } 
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utv-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

    <body>
    <br>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p>Booking Kebaya Berhasil, Selesaikan pembayaran sekarang!!</p>
                <button id="pay-button" class="btn btn-primary">Pilih Metode Pembayaran</button>
                <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
                <script type="text/javascript">
                    document.getElementById('pay-button').onclick = function() {
                        // SnapToken acquired from previous step
                        snap.pay('<?php echo $snap_token ?>');
                    };
                </script>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

