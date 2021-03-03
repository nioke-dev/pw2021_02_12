<?php 
require 'function_latihan_read.php';
$mahasiswa = query('SELECT * FROM mahasiswa');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>latihan read</title>
</head>
<body>
  <h1>daftar mahasiswa</h1>
  <table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>no</th>
    <th>gambar</th>
    <th>nama</th>
    <th>Aksi</th>
    
  </tr>
  <?php $i = 1; 
  foreach($mahasiswa as $mhs) : ?>
  <tr>
    <td><?= $i++; ?></td>
    <td><img src="../img/<?= $mhs['gambar']; ?>" alt="" style="width: 100px;" height="100px"></td>    
    <td><?= $mhs['nama']; ?></td>    
    <td>
    <a href="detil.php?id=<?= $mhs['id']; ?>">aksi</a>
    </td>
  </tr>

  <?php endforeach; ?>

  </table>
</body>
</html>