<?php
$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];

    // Validasi input
    if ($harga > 0 && $diskon >= 0 && $diskon <= 100) {
        $potongan = $harga * ($diskon / 100);
        $total = $harga - $potongan;

        // Format hasil
        $hasil = "
        <div class='hasil'>
            <h2>Hasil Perhitungan</h2>
            <p><strong>Harga Awal:</strong> Rp " . number_format($harga, 0, ',', '.') . "</p>
            <p><strong>Diskon:</strong> $diskon%</p>
            <p><strong>Potongan:</strong> Rp " . number_format($potongan, 0, ',', '.') . "</p>
            <p><strong>Total Harga Setelah Diskon:</strong> Rp " . number_format($total, 0, ',', '.') . "</p>
        </div>";
    } else {
        $hasil = "<p class='error'>Input tidak valid! Harga harus > 0 dan diskon antara 0-100%</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Diskon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Perhitungan Diskon Barang</h1>
    <form method="POST" action="">
        <label for="harga">Harga Barang (Rp)</label>
        <input type="number" name="harga" id="harga" required>

        <label for="diskon">Diskon (%)</label>
        <input type="number" name="diskon" id="diskon" required>

        <button type="submit">Hitung</button>
    </form>

    <?= $hasil ?>
</div>
</body>
</html>
