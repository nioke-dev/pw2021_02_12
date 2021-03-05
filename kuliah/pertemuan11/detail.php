<?php
require 'functions.php'; 

// ambil id dari URL
$id = $_GET['id'];



// query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>
<body>
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li><img src="img/<?= $m['gambar']; ?>" alt=""  style="width: 100px; height: 100px;"></li>
    <li><?= $m['nrp']; ?></li>
    <li><?= $m['nama']; ?></li>
    <li><?= $m['email']; ?></li>
    <li><?= $m['jurusan']; ?></li>
    <li><a href="ubah.php?id=<?= $m['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $m['id']; ?>" 
    onclick="return confirm('apakah anda yakiiinnn');"
    >hapus</a></li>
    <!-- return confirm buat nampilin popup ya atau tidak -->
    <!-- harus menggunakan return karena kalau engga confirm nya ngak akan mengembalikan nilai true atau false -->
    <!-- true kalau tombol ok di klik false kalau tombol cancel di klik -->
    <!-- kalau menghasilkan true maka hrefnya jalan, kalau menghasilkan false maka href nya gagal -->
    <li><a href="index.php">kembali ke daftar mahasiswa</a></li>
  </ul>
</body>
</html>