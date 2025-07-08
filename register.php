<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi - NontonSkuy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap + Font + Animasi -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <style>
    * {
      font-family: 'Rajdhani', sans-serif;
    }
    html, body {
      height: 100%;
      margin: 0;
      background-color: black;
      color: #00f0ff;
      overflow: hidden;
    }

    lottie-player {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 0;
      opacity: 0.35;
    }

    .register-container {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 360px;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.75);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px #00f0ff;
      z-index: 1;
    }

    .register-container h3 {
      text-align: center;
      margin-bottom: 25px;
      color: #ffffff;
      letter-spacing: 2px;
    }

    .form-label {
      color: #00f0ff;
      font-size: 14px;
      margin-bottom: 4px;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.07);
      border: 1px solid #00f0ff;
      color: #ffffff;
    }

    .form-control::placeholder {
      color: #aaa;
    }

    .form-control:focus {
      background-color: rgba(0, 255, 255, 0.12);
      border-color: #00ffff;
      box-shadow: 0 0 8px #00f0ff;
      color: #ffffff;
    }

    .btn-avengers {
      background: linear-gradient(90deg, #ff0000, #ff7300);
      border: none;
      color: white;
      font-weight: bold;
      transition: 0.3s;
    }

    .btn-avengers:hover {
      background: linear-gradient(90deg, #ff7300, #ff0000);
      box-shadow: 0 0 12px #ff0000;
    }

    .alert {
      background-color: rgba(255, 0, 0, 0.1);
      color: #ff4c4c;
      font-size: 14px;
      border: 1px solid #ff4c4c;
      text-align: center;
      margin-top: 15px;
      padding: 10px;
      border-radius: 8px;
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .login-link a {
      color: #00f0ff;
      text-decoration: underline;
    }
  </style>
</head>
<body>

<!-- Background animasi -->
<lottie-player
  src="https://assets2.lottiefiles.com/packages/lf20_jtbfg2nb.json"
  background="transparent"
  speed="1"
  loop autoplay>
</lottie-player>

<!-- Form Registrasi -->
<div class="register-container">
  <h3>Register User</h3>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nama     = trim($_POST['nama']);
      $email    = strtolower(trim($_POST['email']));
      $password = trim($_POST['password']);
      $role     = 'user';
      $created  = date('Y-m-d H:i:s');

      $cek = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
      $cek->bind_param("s", $email);
      $cek->execute();
      $cek->store_result();

      if ($cek->num_rows > 0) {
          echo "<div class='alert'>Email sudah digunakan. Gunakan email lain.</div>";
      } else {
          $stmt = $conn->prepare("INSERT INTO users (nama, email, password, role, created_at) VALUES (?, ?, ?, ?, ?)");
          $stmt->bind_param("sssss", $nama, $email, $password, $role, $created);
          if ($stmt->execute()) {
              echo "<div class='alert alert-success'>Registrasi berhasil! <a href='login.php'>Login sekarang</a></div>";
          } else {
              echo "<div class='alert'>Gagal mendaftar: " . $stmt->error . "</div>";
          }
      }
  }
  ?>

  <form method="post" novalidate>
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Buat password" required>
    </div>

    <button type="submit" class="btn btn-avengers w-100 mt-3">DAFTAR</button>
  </form>

  <div class="login-link">
    Sudah punya akun? <a href="login.php">Login di sini</a>
  </div>
</div>

</body>
</html>
