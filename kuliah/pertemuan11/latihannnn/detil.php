<?php 
// panggil dulu si functionnya ok.....
require 'function_latihan_read.php';

// ambil id dari url lalu simpan ke variable id ex -->> $_GET['id']
$id = $_GET['id'];


// query mahasiswa berdasarkan id
// jika datanya hanya 1 maka normal jika datanya lebih dari satu maka tambahkan array 0 ex -->> [0] di akhir function query
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
var_dump($mhs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>latihann detail php</title>
</head>
<body>
  <h3>DETAIL MAHASISWA</h3>
  <table border="1" cellpadding = "10" cellspacing = "0">
    <tr>
      <th>gambar</th>
      <th>nrp</th>
      <th>nama</th>
      <th>email</th>
      <th>jurusan</th>
    </tr>
    <tr>
      <td><img src="../img/<?= $mhs['gambar']; ?>" alt=""  style="width: 100px; height: 100px;"></td>
      <td><?= $mhs['nrp']; ?></td>
      <td><?= $mhs['nama']; ?></td>
      <td><?= $mhs['email']; ?></td>
      <td><?= $mhs['jurusan']; ?></td>
    </tr>
  </table>
</body>
</html>