<?php
session_start();
include 'koneksi.php';
// $id = $_POST['id'] ?? null;
$nama   = $_POST['nama'];
$email  = $_POST['email'];
$film   = $_POST['film'];
// $tanggal = (int)$_POST['tanggal'];
$jadwal = $_POST['jadwal'];
$jumlah = (int) ($_POST['jumlah']);


// Validasi sederhana
if ($nama === '' || $email === '' || $film === '' || $jadwal === '' || $jumlah <= 0) {
  die("Data tidak lengkap!");
}

// Optional: Hitung total harga (misalnya 1 tiket = 35000)
$harga_per_tiket = 35000;
$total = $jumlah * $harga_per_tiket;

// Simpan ke database
$query = "INSERT INTO checkout (nama, email, film, tanggal, jumlah, total) 
          VALUES ('$nama', '$email', '$film', '$tanggal', '$jumlah', '$total')";

if ($conn->query($query)) {
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
} else {
  echo("Gagal Menyimpan: " . $conn->error);
}