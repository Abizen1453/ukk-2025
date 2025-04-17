<?php
// Inisialisasi variabel hasil, yang nanti akan diisi dengan hasil perhitungan
$hasil = "";

// Cek apakah form dikirim dengan metode POST (artinya tombol submit ditekan)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari input form
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];

    // Validasi: harga harus lebih dari 0 dan diskon antara 0-100
    if ($harga > 0 && $diskon >= 0 && $diskon <= 100) {
        // Hitung potongan diskon
        $potongan = $harga * ($diskon / 100);
        // Hitung total harga setelah diskon
        $total = $harga - $potongan;

        // Format hasilnya ke dalam HTML
        $hasil = "
        <div class='hasil'>
            <h2>Hasil Perhitungan</h2>
            <p><strong>Harga Awal:</strong> Rp " . number_format($harga, 0, ',', '.') . "</p>
            <p><strong>Diskon:</strong> $diskon%</p>
            <p><strong>Potongan:</strong> Rp " . number_format($potongan, 0, ',', '.') . "</p>
            <p><strong>Total Harga Setelah Diskon:</strong> Rp " . number_format($total, 0, ',', '.') . "</p>
        </div>";
    } else {
        // Jika input tidak valid, tampilkan pesan error
        $hasil = "<p class='error'>Input tidak valid! Harga harus > 0 dan diskon antara 0-100% punten cobian deui</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Diskon</title>
    <!-- Menghubungkan file CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Perhitungan Diskon Barang</h1>

    <!-- Form input harga dan diskon -->
    <form method="POST" action="">
        <label for="harga">Harga Barang (Rp)</label>
        <input type="number" name="harga" id="harga" required>

        <label for="diskon">Diskon (%)</label>
        <input type="number" name="diskon" id="diskon" required>

        <button type="submit">Hitung</button>
    </form>

    <!-- Menampilkan hasil atau pesan error -->
    <?= $hasil ?>
</div>
</body>
</html>
