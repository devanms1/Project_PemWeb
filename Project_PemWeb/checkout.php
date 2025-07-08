<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    die("Anda harus login dahulu.");
}

$id_user = $_SESSION['id_user'];
$id_product = $_POST['id_product'];
$jumlah = $_POST['jumlah'];

// Ambil data produk
$q = $conn->query("SELECT * FROM products WHERE id_product=$id_product");
$produk = $q->fetch_assoc();
$harga = $produk['harga'];
$total = $harga * $jumlah;

// Insert ke orders
$conn->query("INSERT INTO orders (id_user, total_harga) VALUES ($id_user, $total)");
$id_order = $conn->insert_id;

// Insert ke order_items
$conn->query("INSERT INTO order_items (id_order, id_product, jumlah, harga_satuan)
              VALUES ($id_order, $id_product, $jumlah, $harga)");

echo "Pesanan berhasil dibuat! <a href='produk.php'>Kembali</a>";
?>
