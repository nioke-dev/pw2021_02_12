<?php 
require 'function_latihan_read.php';

$id = $_GET['id'];

$detail_mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id");

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
  <h2>Detail Mahasiswa</h2>
  <table border="1" cellpadding = "10" cellspacing = "0">
    <tr>
      <th>No</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>nrp</th>
      <th>email</th>
      <th>jurusan</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1;
    foreach($detail_mahasiswa as $dm) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="../img/<?= $dm['gambar']; ?>" alt="" width="100px" height="100px"></td>
        <td><?= $dm['nama']; ?></td>
        <td><?= $dm['nrp']; ?></td>
        <td><?= $dm['email']; ?></td>
        <td><?= $dm['jurusan']; ?></td>
        <td>
          <a href="latihan read.php"><button>Kembali Ke Halaman Utama</button></a><br><br>
          <a href=""><button>Ubah</button></a><br><br>
          <a href=""><button>Hapus</button></a>
        </td>        
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>