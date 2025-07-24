<?php
// Koneksi ke database
$host = "localhost";
$user = "root"; // Ganti jika bukan root
$pass = "";     // Ganti jika pakai password
$db   = "toko_online";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$product_name = $_POST['product_name'];
$price        = $_POST['price'];
$qty          = $_POST['qty'];
$total        = $_POST['total'];
$nama         = $_POST['nama'];
$alamat       = $_POST['alamat'];
$kontak       = $_POST['kontak'];
$metode       = $_POST['metode'];

// Simpan ke database
$sql = "INSERT INTO pembelian (product_name, price, qty, total, nama, alamat, kontak, metode)
        VALUES ('$product_name', $price, $qty, $total, '$nama', '$alamat', '$kontak', '$metode')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Pesanan berhasil dikirim!'); window.location.href='index.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
