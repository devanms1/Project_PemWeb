<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Daftar Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Form Registrasi</h2>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
      echo $conn->query($sql)
          ? "<div class='alert alert-success'>Registrasi berhasil! <a href='login.php'>Login</a></div>"
          : "<div class='alert alert-danger'>Gagal: " . $conn->error . "</div>";
  }
  ?>
  <form method="post" class="w-50">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Daftar</button>
  </form>
</div>
</body>
</html>
