<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi - NontonSkuy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

  <style>
    * { font-family: 'Rajdhani', sans-serif; }
    html, body {
      margin: 0;
      height: 100%;
      background: black;
      overflow: hidden;
      color: #ffffff;
    }

    dotlottie-player {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 0;
      opacity: 0.3;
    }

    .register-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(0, 0, 0, 0.8);
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 0 30px #ffdd00;
      width: 360px;
      z-index: 1;
    }

    .register-container h3 {
      text-align: center;
      margin-bottom: 25px;
      color: #ffdd00;
      letter-spacing: 2px;
    }

    .form-label {
      color: #ffdd00;
      font-size: 14px;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.08);
      border: 1px solid #ffdd00;
      color: #ffffff;
    }

    .form-control::placeholder {
      color: #ccc;
    }

    .form-control:focus {
      background-color: rgba(255, 255, 255, 0.1);
      border-color: #ffdd00;
      box-shadow: 0 0 8px #ffdd00;
      color: #ffffff;
    }

    .btn-daftar {
      background: linear-gradient(90deg, #f1c40f, #f39c12);
      border: none;
      color: #000;
      font-weight: bold;
    }

    .btn-daftar:hover {
      background: linear-gradient(90deg, #f39c12, #f1c40f);
      box-shadow: 0 0 12px #f1c40f;
    }

    .alert {
      font-size: 14px;
      text-align: center;
      margin-top: 15px;
      padding: 10px;
      border-radius: 8px;
    }

    .alert-danger {
      background-color: rgba(255, 0, 0, 0.15);
      color: #ff4c4c;
      border: 1px solid #ff4c4c;
    }

    .alert-success {
      background-color: rgba(0, 255, 0, 0.1);
      color: #00e676;
      border: 1px solid #00e676;
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .login-link a {
      color: #f1c40f;
      text-decoration: underline;
    }
  </style>
</head>
<body>

<!-- Background animasi -->
<dotlottie-player
  src="https://lottie.host/083559af-b77c-4ca7-8887-0e13a8c1118c/EUkVr9IKQu.lottie"
  background="transparent"
  speed="1"
  loop autoplay>
</dotlottie-player>

<div class="register-container">
  <h3>Register User</h3>

  <?php
  $pesan = '';
  $tipePesan = '';

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $nama     = trim($_POST['nama']);
      $email    = strtolower(trim($_POST['email']));
      $password = trim($_POST['password']);
      $role     = 'user';
      $created  = date('Y-m-d H:i:s');

      if ($nama === '' || $email === '' || $password === '') {
          $pesan = "Semua field harus diisi.";
          $tipePesan = 'alert-danger';
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $pesan = "Format email tidak valid.";
          $tipePesan = 'alert-danger';
      } else {
          $cek = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
          $cek->bind_param("s", $email);
          $cek->execute();
          $cek->store_result();

          if ($cek->num_rows > 0) {
              $pesan = "Email sudah digunakan. Gunakan email lain.";
              $tipePesan = 'alert-danger';
          } else {
              $stmt = $conn->prepare("INSERT INTO users (nama, email, password, role, created_at) VALUES (?, ?, ?, ?, ?)");
              $stmt->bind_param("sssss", $nama, $email, $password, $role, $created);
              if ($stmt->execute()) {
                  $pesan = "Registrasi berhasil! <a href='login.php'>Login sekarang</a>";
                  $tipePesan = 'alert-success';
              } else {
                  $pesan = "Gagal mendaftar: " . $stmt->error;
                  $tipePesan = 'alert-danger';
              }
          }
      }

      echo "<div class='alert $tipePesan' id='error-alert'>$pesan</div>";
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

    <button type="submit" class="btn btn-daftar w-100 mt-3">DAFTAR</button>
  </form>

  <div class="login-link">
    Sudah punya akun? <a href="login.php">Login di sini</a>
  </div>
</div>

<!-- Auto-hide error alert after 3 seconds -->
<script>
  setTimeout(() => {
    const alertBox = document.getElementById("error-alert");
    if (alertBox) {
      alertBox.style.transition = "opacity 0.5s ease";
      alertBox.style.opacity = 0;
      setTimeout(() => alertBox.remove(), 500);
    }
  }, 3000);
</script>

</body>
</html>
