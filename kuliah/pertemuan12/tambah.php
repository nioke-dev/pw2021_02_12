<?php

session_start();

if (!isset($_SESSION['login'])) {
  # code...
  header("Location: login.php");
  exit;
}

// pertama pastikan kita terhubung ke function
require 'functions.php';

// cek apakah tombol tambah sudah di tekan 
if (isset($_POST['tambah'])) {
  # code...
  // kita akan ambil semua data yang udah di ketikkan
  // var_dump($_POST);


  // kalau udah diklik tombol tambah ambil semua data post tadi terus kirimkan ke sebuah function namanya tambah
  if (tambah($_POST) > 0) {
    // kalu tambah ini menghasilkan nilai yang lebih besar dari  0 
    # code...
    echo "
      <script>
        alert('Data Berhasil Ditambahkan!!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    # code...
    echo "
      <script>
        alert('Data Gagal Ditambahkan!!');
        document.location.href = 'index.php';
      </script>
    ";
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
  <h3>Form Tambah Data Mahasiswa</h3>
  <form action="" method="POST">
    <!-- actionnya di kosongkan karena kalau di kosongkan itu data yang ada didalam form nya ketika di submit akan dikembalikan ke halaman yang sama -->
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required>
        </label>
        <!-- jika name nya di database menggunakan huruf besar maka name diatas harus sama dengan field yang ada di database -->
      </li>
      <li>
        <label>
          Nrp :
          <input type="text" name="nrp" required>
        </label>
      </li>
      <li>
        <label>
          Username :
          <input type="text" name="username" required>
        </label>
      </li>
      <li>
        <label>
          E-Mail :
          <input type="text" name="email" required>
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required>
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required>
        </label>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data!</button>
      </li>
    </ul>
  </form>



</body>

</html>