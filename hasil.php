<?php
include 'fungsi.php';
$nama = $_POST['nama'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$cart = getCartItems();
$db = connectDB();

$items = [];
$total = 0;
foreach ($cart as $id) {
    $stmt = $db->prepare("SELECT * FROM jamu WHERE id = ?");
    $stmt->execute([$id]);
    $item = $stmt->fetch();
    $items[] = $item;
    $total += $item['harga'];
}
clearCart();
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <h1>Pesanan Berhasil</h1>
    <p>Terima kasih, <?= htmlspecialchars($nama) ?>!</p>
    <p>Pesanan Anda akan dikirim ke:</p>
    <p><?= nl2br(htmlspecialchars($alamat)) ?></p>
    <h3>Rincian Pesanan:</h3>
    <ul>
    <?php foreach ($items as $item): ?>
        <li><?= $item['nama'] ?> - Rp<?= number_format($item['harga'], 0, ',', '.') ?></li>
    <?php endforeach; ?>
    </ul>
    <p><strong>Total Pembayaran:</strong> Rp<?= number_format($total, 0, ',', '.') ?></p>
    <a href="index.php">Kembali ke Beranda</a>
</div>
</body>
</html>
