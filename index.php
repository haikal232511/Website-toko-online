<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Toko Baju</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Toko Baju</h1>
        <nav>
            <a href="cek_pesanan.php" style="color: #6c3374; font-weight: bold;">Lihat Pesanan</a>

        </nav>
    </header>

    <main>
        <section class="products">
            <?php
            $products = [
                [
                    "name" => "Jaket varsity",
                    "price" => 69000,
                    "img" => "jaket.jpg"
                ],

            ];

            foreach ($products as $product) {
                echo '<div class="product">';
                echo '<img src="' . $product["img"] . '" alt="' . $product["name"] . '" style="width:200px;">';
                echo '<h3>' . $product["name"] . '</h3>';
                echo '<p>Rp ' . number_format($product["price"], 0, ',', '.') . '</p>';
                echo '<div class="buy-section">';
                echo '<form action="beli.php" method="GET">';
                echo '<input type="hidden" name="name" value="' . $product["name"] . '">';
                echo '<input type="hidden" name="price" value="' . $product["price"] . '">';
                echo '<input type="hidden" name="img" value="' . $product["img"] . '">';
                echo '<input type="number" name="qty" value="1" min="1">';
                echo '<button type="submit">Beli</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </section>
    </main>

</body>

</html>