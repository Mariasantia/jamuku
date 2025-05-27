<?php include 'fungsi.php'; ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <h1>Form Pembayaran</h1>
    <form action="hasil.php" method="post">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br><br>
        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>
        <input type="submit" value="Proses">
    </form>
</div>
</body>
</html>
