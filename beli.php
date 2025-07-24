<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6c3483;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav a {
            margin: 0 10px;
            color: white;
            text-decoration: none;
        }

        .product-detail {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-detail img {
            width: 200px;
            margin-bottom: 20px;
        }

        .form-wrapper {
            text-align: left;
            margin-top: 30px;
        }

        .form-wrapper input[type="text"],
        .form-wrapper textarea,
        .form-wrapper select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-wrapper button {
            background-color: #6c3483;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-wrapper button:hover {
            background-color: #512e5f;
        }
    </style>
</head>

<body>

    <header>
        <h1>Detail Pembelian</h1>
        <nav>
            <a href="index.php">Kembali ke Beranda</a>
        </nav>
    </header>

    <main>
        <section class="product-detail">
            <?php
            if (isset($_GET['name']) && isset($_GET['price']) && isset($_GET['img']) && isset($_GET['qty'])) {
                $name = htmlspecialchars($_GET['name']);
                $price = (int) $_GET['price'];
                $img = htmlspecialchars($_GET['img']);
                $qty = (int) $_GET['qty'];
                $total = $price * $qty;

                echo '<img src="' . $img . '" alt="' . $name . '">';
                echo '<h2>' . $name . '</h2>';
                echo '<p>Harga Satuan: Rp ' . number_format($price, 0, ',', '.') . '</p>';
                echo '<p>Jumlah: ' . $qty . '</p>';
                echo '<p><strong>Total Harga: Rp ' . number_format($total, 0, ',', '.') . '</strong></p>';

                // Formulir data pembeli
                echo '<h3>Isi Data Pembeli</h3>';
                echo '<form action="proses.php" method="POST" class="form-wrapper">';
                echo '<input type="hidden" name="product_name" value="' . $name . '">';
                echo '<input type="hidden" name="price" value="' . $price . '">';
                echo '<input type="hidden" name="qty" value="' . $qty . '">';
                echo '<input type="hidden" name="total" value="' . $total . '">';

                echo '<label for="nama">Nama Lengkap:</label><br>';
                echo '<input type="text" id="nama" name="nama" required><br>';

                echo '<label for="alamat">Alamat Pengiriman:</label><br>';
                echo '<textarea id="alamat" name="alamat" rows="4" required></textarea><br>';

                echo '<label for="kontak">No. HP / WhatsApp:</label><br>';
                echo '<input type="text" id="kontak" name="kontak" required><br>';

                echo '<label for="metode">Metode Pembayaran:</label><br>';
                echo '<select id="metode" name="metode" required>';
                echo '<option value="Transfer Bank">Transfer Bank</option>';
                echo '<option value="COD">Bayar di Tempat (COD)</option>';
                echo '</select><br>';

                echo '<button type="submit">Kirim Pesanan</button>';
                echo '</form>';
            } else {
                echo '<p>Data tidak lengkap.</p>';
            }
            ?>
        </section>
    </main>

</body>

</html>