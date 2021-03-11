<?php
// pertama kita hubungkan dulu halaman ini dengan function_latihan_read.php

require 'function_latihan_read.php';


if (!isset($_GET['id'])) {
  # code...
  header("Location: latihan read.php");
  exit;
}


$id = $_GET['id'];

$tampung_query = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST['ubah'])) {
  # code...
  if (ubah($_POST) > 0) {
    # code...
    echo "data berhasil diubah";
  } else {
    echo "data gagal diubah";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h2>Tambah Data Mahasiswa</h2>
  <form action="" method="POST">
    <input type="hidden" value="<?= $tampung_query['id'];  ?>" name="id">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" value="<?= $tampung_query['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          Nrp :
          <input type="text" name="nrp" value="<?= $tampung_query['nrp']; ?>">
        </label>
      </li>
      <li>
        <label>
          E-Mail :
          <input type="text" name="email" value="<?= $tampung_query['email']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" value="<?= $tampung_query['jurusan']; ?>">
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" value="<?= $tampung_query['gambar']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
        <button formaction="latihan read.php">kembali ke halaman utama</button>
      </li>
    </ul>
  </form>
</body>

</html>