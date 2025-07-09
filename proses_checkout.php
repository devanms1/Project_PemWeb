<?php
session_start();
include 'koneksi.php';
$id = $_POST['id'] ?? null;
$nama   = $_POST['nama'];
$email  = $_POST['email'];
$film   = $_POST['film'];
$tanggal = (int)$_POST['tanggal'];
$jumlah = $_POST['jumlah'];

// Optional: Hitung total harga (misalnya 1 tiket = 35000)
$harga_per_tiket = 35000;
$total = $jumlah * $harga_per_tiket;

// Simpan ke database
$query = "INSERT INTO checkout (nama, email, film, tanggal, jumlah, total) 
          VALUES ('$nama', '$email', '$film', '$tanggal', '$jumlah', '$total')";

$_SESSION['checkout'] = [
  'id' => $conn->insert_id, // Ambil ID terakhir yang dimasukkan
  'nama' => $nama,
  'email' => $email,
  'film' => $film,
  'tanggal' => $tanggal,
  'jumlah' => $jumlah
];

header('Location: detail_checkout.php');
exit;

if ($conn->query($query)) {
  echo "<script>alert('Pesanan berhasil!'); window.location.href='detail_checkout.php';</script>";
} else {
  echo "Gagal menyimpan: " . $conn->error;
}
