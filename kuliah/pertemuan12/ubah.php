<?php

session_start();

if (!isset($_SESSION['login'])) {
  # code...
  header("Location: login.php");
  exit;
}


// pertama pastikan kita terhubung ke function
require 'functions.php';


// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}


//ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");


if (isset($_POST['ubah'])) {
  // cek apakah tombol ubah  sudah di tekan 
  # code...
  // kita akan ambil semua data yang udah di ketikkan
  // var_dump($_POST);


  // kalau udah diklik tombol tambah ambil semua data post tadi terus kirimkan ke sebuah function namanya tambah
  if (ubah($_POST) > 0) {
    // kalu tambah ini menghasilkan nilai yang lebih besar dari  0 
    # code...
    echo "
      <script>  
        alert('Data Berhasil Diubah!!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    # code...
    echo "
      <script>
        alert('Data Gagal Diubah !!');
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
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah Data Mahasiswa</h3>
  <form action="" method="POST">
    <!-- actionnya di kosongkan karena kalau di kosongkan itu data yang ada didalam form nya ketika di submit akan dikembalikan ke halaman yang sama -->
    <input type="hidden" name="id" value="<?= $m['id']; ?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $m['nama']; ?>">
        </label>
        <!-- jika name nya di database menggunakan huruf besar maka name diatas harus sama dengan field yang ada di database -->
      </li>
      <li>
        <label>
          Nrp :
          <input type="text" name="nrp" required value="<?= $m['nrp']; ?>">
        </label>
      </li>
      <li>
        <label>
          E-Mail :
          <input type="text" name="email" required value="<?= $m['email']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required value="<?= $m['jurusan']; ?>">
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required value="<?= $m['gambar']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>



</body>

</html>