<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Style/HalamanTambah.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <link
        href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"
        rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg fixed-top shadow-lg"
        style="background-color: yellow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold m-3" href="#">Nonton Skuy</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarNavDropdown">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/home_admin.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/drink_admin.php">Tambah Snack</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/RiwayatTransaksi.php">Pantau User</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End -->
    <form action="simpan.php" method="POST" enctype="multipart/form-data" class="mt-5 pt-5">
        <div class="container mt-4 p-4 border rounded bg-light shadow">
            <h2 class="text-center mb-4">Tambah Film</h2>

            <div class="row">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Judul Film</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">-- Pilih Genre --</option>
                            <option value="Aksi">Aksi</option>
                            <option value="Drama">Drama</option>
                            <option value="Komedi">Komedi</option>
                            <option value="Horor">Horor</option>
                            <option value="Romantis">Romantis</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Sinopsis</label>
                        <textarea name="sinopsis" rows="4" class="form-control" placeholder="Tulis deskripsi..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Rilis</label>
                        <input type="date" name="rilis" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Upload Poster</label>
                        <input type="file" name="poster" accept="image/*" class="form-control" required>
                    </div>
                </div>

                <!-- Kolom kanan (jika mau simpan jam tayang ke tabel lain) -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Jam Tayang 1</label>
                        <input type="time" name="jam_tayang_1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Jam Tayang 2</label>
                        <input type="time" name="jam_tayang_2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Jam Tayang 3</label>
                        <input type="time" name="jam_tayang_3" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Jam Tayang 4</label>
                        <input type="time" name="jam_tayang_4" class="form-control">
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-dark px-5 py-2">Simpan</button>
            </div>
        </div>
    </form>

</body>

</html>