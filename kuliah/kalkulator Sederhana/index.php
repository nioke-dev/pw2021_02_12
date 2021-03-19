<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator Sederhana By MalasNgoding</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php
  if (isset($_POST['hitung'])) {
    $bil1 = $_POST['bil1'];
    $bil2 = $_POST['bil2'];
    $operasi = $_POST['operasi'];
    switch ($operasi) {
      case 'tambah':
        $hasil = $bil1 + $bil2;
        break;
      case 'kurang':
        $hasil = $bil1 - $bil2;
        break;
      case 'kali':
        $hasil = $bil1 * $bil2;
        break;
      case 'bagi':
        $hasil = $bil1 / $bil2;
        break;
    }
  }
  ?>
  <?php

  ?>
  <div class="kalkulator">
    <h2 class="judul">KALKULATOR</h2>
    <a href="https://github.com/nioke-dev" class="brand">nioke-dev</a>
    <form action="" method="POST">
      <input type="text" name="bil1" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Pertama">
      <input type="text" name="bil2" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Kedua">
      <select name="operasi" id="" class="opt">
        <option value="tambah">+</option>
        <option value="kurang">-</option>
        <option value="kali">*</option>
        <option value="bagi">/</option>
      </select>
      <input type="submit" name="hitung" value="hitung" class="tombol">
    </form>
    <?php if (isset($_POST['hitung'])) { ?>
      <input type="text" value="<?= $hasil; ?>" class="bil">
    <?php } else { ?>
      <input type="text" value="0" class="bil">
    <?php } ?>
  </div>
</body>

</html>