<?php
$koneksi = new mysqli("localhost", "root", "", "db_bioskop");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$judul = $_POST['nama_film'];
$kategori  = $_POST['genre'];
$sinopsis  = $_POST['sinopsis'];
$rilis     = date("Y-m-d");

$jam1 = $_POST['jam_tayang_1'];
$jam2 = $_POST['jam_tayang_2'];
$jam3 = $_POST['jam_tayang_3'];
$jam4 = $_POST['jam_tayang_4'];

$poster_nama = $_FILES['poster']['name'];
$poster_tmp  = $_FILES['poster']['tmp_name'];
$folder      = "uploads/";

// Cek dan buat folder jika belum ada
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if (move_uploaded_file($poster_tmp, $folder . $poster_nama)) {
    $query = "INSERT INTO movies (judul, kategori, sinopsis, poster, rilis)
              VALUES ('$judul', '$kategori', '$sinopsis', '$poster_nama', '$rilis')";

    if ($koneksi->query($query) === TRUE) {
        $id_movie = $koneksi->insert_id;

        $jamList = [$jam1, $jam2, $jam3, $jam4];
        foreach ($jamList as $jam) {
            if (!empty($jam)) {
                $koneksi->query("INSERT INTO jam_tayang (id_movie, jam) VALUES ('$id_movie', '$jam')");
            }
        }

         echo "<script>alert('Film dan jam tayang berhasil disimpan!'); window.location.href='HalamanTambah.php';</script>";
    } else {
        echo "Gagal menyimpan data film: " . $koneksi->error;
    }
} else {
    echo "Upload poster gagal.";
}

$koneksi->close();
