<?php
include 'fungsi.php';
if (isset($_GET['add'])) addToCart($_GET['add']);

$cart = getCartItems();
$items = [];
$db = connectDB();
$total = 0;
foreach ($cart as $id) {
    $stmt = $db->prepare("SELECT * FROM jamu WHERE id = ?");
    $stmt->execute([$id]);
    $item = $stmt->fetch();
    $items[] = $item;
    $total += $item['harga'];
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <h1>Keranjang</h1>
    <ul>
    <?php foreach ($items as $item): ?>
        <li><?= $item['nama'] ?> - Rp<?= number_format($item['harga'], 0, ',', '.') ?></li>
    <?php endforeach; ?>
    </ul>
    <p><strong>Total:</strong> Rp<?= number_format($total, 0, ',', '.') ?></p>
    <a href="index.php">Kembali</a>
    <a href="bayar.php">Bayar</a>
</div>
</body>
</html>

