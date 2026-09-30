<?php
$products = [
    [
        "nama"     => "Monitor 24 Inch",
        "kategori" => "Display",
        "harga"    => 2000000,
        "stok"     => 4
    ],
    [
        "nama"     => "Laptop Gaming",
        "kategori" => "Computers",
        "harga"    => 20000000,
        "stok"     => 0
    ],
    [
        "nama"     => "Mouse Wireless",
        "kategori" => "Accessories",
        "harga"    => 200000,
        "stok"     => 15
    ],
    [
        "nama"     => "Mechanical Keyboard",
        "kategori" => "Accessories",
        "harga"    => 2000000,
        "stok"     => 0
    ],
    [
        "nama"     => "Headset Gaming",
        "kategori" => "Accessories",
        "harga"    => 1100000,
        "stok"     => 3
    ],
    [
        "nama"     => "Webcam HD 1080p",
        "kategori" => "Camera",
        "harga"    => 1000000,
        "stok"     => 2
    ]
];

$total_produk = count($products);

function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="wrapper">
        <h1>Cia Store</h1>
        <h2>Katalog Produk</h2>
        <div class="total-info">Total Produk: <?= $total_produk; ?></div>

        <div class="product-container">
            <?php foreach ($products as $item): ?>
                <?php
                    $dapatDiskon = $item['harga'] >= 1000000;
                    $hargaAkhir  = $dapatDiskon ? $item['harga'] * 0.9 : $item['harga'];
                    
                    $tersedia = $item['stok'] > 0;
                ?>

                <div class="card">
                    <?php if ($dapatDiskon): ?>
                        <div class="diskon-teks">Diskon 10%</div>
                    <?php endif; ?>

                    <div class="kategori-teks"><?= htmlspecialchars($item['kategori']); ?></div>
                    <div class="nama-produk"><?= htmlspecialchars($item['nama']); ?></div>

                    <div class="harga-box">
                        <?php if ($dapatDiskon): ?>
                            <div class="harga-asli"><?= formatRupiah($item['harga']); ?></div>
                            <div class="harga-diskon"><?= formatRupiah($hargaAkhir); ?></div>
                        <?php else: ?>
                            <div class="harga-normal"><?= formatRupiah($item['harga']); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="stok-teks">Stok: <?= $item['stok']; ?></div>

                    <?php if ($tersedia): ?>
                        <div class="status-tersedia">Tersedia</div>
                        <button class="btn btn-tersedia">Beli Sekarang</button>
                    <?php else: ?>
                        <div class="status-habis">Stok Habis</div>
                        <button class="btn btn-habis" disabled>Stok Habis</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>