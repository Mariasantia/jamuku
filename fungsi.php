<?php
function connectDB() {
    return new PDO('sqlite:jamuku.db');
}

function getAllJamu() {
    $db = connectDB();
    return $db->query("SELECT * FROM jamu");
}

function addToCart($id) {
    session_start();
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    $_SESSION['cart'][] = $id;
}

function getCartItems() {
    session_start();
    return $_SESSION['cart'] ?? [];
}

function clearCart() {
    session_start();
    $_SESSION['cart'] = [];
}
?>
