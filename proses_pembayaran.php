<?php
session_start();
include 'koneksi.php';

// Cek apakah form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama   = $_SESSION['checkout']['nama'] ?? '';
  $metode = $_POST['metode'] ?? '';
  $bukti  = $_FILES['bukti'];

  // Validasi file upload
  if ($bukti['error'] === 0 && in_array($bukti['type'], ['image/jpeg', 'image/png', 'image/jpg'])) {
    $ext = pathinfo($bukti['name'], PATHINFO_EXTENSION);
    $nama_file = 'bukti_' . time() . '.' . $ext;
    $tujuan = 'uploads/' . $nama_file;
    $folder = 'uploads/';
    if (!is_dir($folder)) {
    mkdir($folder, 0777, true); // Buat folder jika belum ada
    }


    if (move_uploaded_file($bukti['tmp_name'], $tujuan)) {
      // Simpan ke database
      $stmt = $conn->prepare("INSERT INTO tb_pembayaran (nama, metode, bukti) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $nama, $metode, $nama_file);
      $stmt->execute();
      $stmt->close();

      // Hapus session checkout agar tidak bayar dua kali
      unset($_SESSION['checkout']);

      // Redirect ke halaman sukses
      header('Location: pembayaran_sukses.php');
      exit;
    } else {
      echo "Gagal upload bukti pembayaran.";
    }
  } else {
    echo "Format bukti tidak valid. Gunakan JPG atau PNG.";
  }
} else {
  header('Location: pembayaran.php');
  exit;
}
?>
