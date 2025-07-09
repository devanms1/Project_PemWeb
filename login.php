<?php
include 'koneksi.php';
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    $q = $conn->prepare("SELECT * FROM users WHERE LOWER(email)=?");
    $q->bind_param("s", $email);
    $q->execute();
    $result = $q->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin/home_admin.php");
            } else {
                header("Location: home.php");
            }
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - NontonSkuy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
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

    .login-container {
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

    .login-container h3 {
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

    .btn-login {
      background: linear-gradient(90deg, #f1c40f, #f39c12);
      border: none;
      color: #000;
      font-weight: bold;
    }

    .btn-login:hover {
      background: linear-gradient(90deg, #f39c12, #f1c40f);
      box-shadow: 0 0 12px #f1c40f;
    }

    .alert-danger {
      background-color: rgba(255, 0, 0, 0.15);
      color: #ff4c4c;
      border: 1px solid #ff4c4c;
      text-align: center;
      font-size: 13px;
      border-radius: 6px;
      padding: 8px;
    }

    .register-link {
      text-align: center;
      margin-top: 12px;
      font-size: 13px;
      color: #fff;
    }

    .register-link a {
      color: #f1c40f;
      text-decoration: underline;
    }
  </style>
</head>
<body>

<!-- Background Animasi -->
<dotlottie-player
  src="https://lottie.host/083559af-b77c-4ca7-8887-0e13a8c1118c/EUkVr9IKQu.lottie"
  background="transparent"
  speed="1"
  loop
  autoplay>
</dotlottie-player>

<!-- Form Login -->
<div class="login-container">
  <h3>Login User</h3>

  <?php if (!empty($error)) : ?>
    <div class="alert alert-danger" id="error-alert"><?= $error ?></div>
  <?php endif; ?>

  <form method="post" novalidate>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
    </div>
    <button type="submit" class="btn btn-login w-100 mt-2">LOGIN</button>
  </form>

  <div class="register-link">
    Belum punya akun? <a href="register.php">Daftar di sini</a>
  </div>
</div>

<script>
  setTimeout(() => {
    const alertBox = document.getElementById("error-alert");
    if (alertBox) {
      alertBox.style.transition = "opacity 0.5s ease";
      alertBox.style.opacity = 0;
      setTimeout(() => alertBox.style.display = "none", 500);
    }
  }, 3000);
</script>

</body>
</html>
