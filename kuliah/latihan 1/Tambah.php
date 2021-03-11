<?php
// pertama kita hubungkan dulu halaman ini dengan function_latihan_read.php

require 'function_latihan_read.php';


if (isset($_POST['tambah'])) {
  # code...
  if (tambah($_POST) > 0) {
    # code...
    echo "Data Berhasil Ditambahkan";
    header("Location: latihan read.php");
  } else {
    echo "Data Gagal Ditambahkan";
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
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus>
        </label>
      </li>
      <li>
        <label>
          Nrp :
          <input type="text" name="nrp">
        </label>
      </li>
      <li>
        <label>
          E-Mail :
          <input type="text" name="email">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan">
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar">
        </label>
      </li>
      <li>
        <button type="submit" name="tambah">Kirim!</button>
      </li>
    </ul>
  </form>
</body>

</html>