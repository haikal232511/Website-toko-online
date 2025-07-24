<?php
// Koneksi ke database
$host = "localhost";
$user = "root"; // Ubah sesuai konfigurasi
$pass = "";     // Kosong jika pakai XAMPP default
$db = "toko_online";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pembelian
$sql = "SELECT * FROM pembelian ORDER BY tanggal_pesan DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #6c3374;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #6c3374;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .back-link {
            display: block;
            margin: 20px 0;
            text-align: center;
        }

        .back-link a {
            text-decoration: none;
            color: #6c3374;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>Daftar Pesanan Masuk</h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Pembayaran</th>
                <th>Tanggal</th>
            </tr>
            <?php $no = 1;
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                    <td><?= nl2br(htmlspecialchars($row['alamat'])) ?></td>
                    <td><?= $row['kontak'] ?></td>
                    <td><?= $row['metode'] ?></td>
                    <td><?= $row['tanggal_pesan'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p style="text-align:center;">Belum ada pesanan masuk.</p>
    <?php endif; ?>

    <div class="back-link">
        <a href="index.php">← Kembali ke Beranda</a>
    </div>

</body>

</html>

<?php $conn->close(); ?>