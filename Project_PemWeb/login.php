<?php
include 'koneksi.php';
session_start();

$error = '';
if (isset($_SESSION['flash_error'])) {
    $error = $_SESSION['flash_error'];
    unset($_SESSION['flash_error']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    $q = $conn->query("SELECT * FROM users WHERE LOWER(email)='$email'");
    if ($q && $q->num_rows == 1) {
        $user = $q->fetch_assoc();
        if ($password == $user['password']) { // Gantilah dengan password_verify() jika pakai hashing
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];
            header("Location: home.php");
            exit;
        } else {
            $_SESSION['flash_error'] = "Password salah.";
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['flash_error'] = "Email tidak ditemukan.";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Stark Industries</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Fonts -->
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
      background-color: #000;
      overflow: hidden;
    }

    lottie-player {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 0;
      opacity: 0.35;
    }

    .login-container {
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

    .login-container h3 {
      text-align: center;
      color: #ffffff;
      margin-bottom: 30px;
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
    color: #ffffff; /* teks input */
    caret-color: #00f0ff; /* warna kursor saat mengetik */
    }

    .form-control::placeholder {
    color: #cccccc; /* warna placeholder */
    opacity: 1;
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

    .alert-danger {
      background-color: rgba(255, 0, 0, 0.1);
      color: #ff4c4c;
      font-size: 14px;
      border: 1px solid #ff4c4c;
      text-align: center;
      margin-top: 15px;
      padding: 10px;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<!-- Latar Animasi -->
<lottie-player
  src="https://assets2.lottiefiles.com/packages/lf20_jtbfg2nb.json"
  background="transparent"
  speed="1"
  loop autoplay>
</lottie-player>

<!-- Form Login -->
<div class="login-container">
  <h3>Login User</h3>
  <form method="post" novalidate>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="masukkan email" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" placeholder="masukkan password" required>
    </div>
<?php if (!empty($error)) : ?>
  <div class="alert alert-danger" id="error-alert"><?php echo $error; ?></div>
<?php endif; ?>

<script>
  // Menghilangkan pesan error setelah 3 detik
  setTimeout(() => {
    const alertBox = document.getElementById("error-alert");
    if (alertBox) {
      alertBox.style.transition = "opacity 0.5s ease";
      alertBox.style.opacity = 0;
      setTimeout(() => alertBox.style.display = "none", 500);
    }
  }, 3000);
</script>



    <button type="submit" class="btn btn-avengers w-100 mt-3">LOGIN</button>
  </form>
</div>

</body>
</html>
