<?php 
// koneksi ke database dan pilih database
$conn = mysqli_connect('localhost', 'root', '', 'pw_043040023');
// mysqli_connect('localhost', 'username', 'password', 'nama database');
// lalu tampung kedalam variable yang bernama $conn



// query isi tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// parameter yang pertama koneksinya yaitu $conn
// parameter yang kedua string querynya apa..??? >>>>> "SELECT * FROM mahasiswa"
// lalu simpan kedalam variable yang namanya $result 



// ubah data ke dalam array
// $row = mysqli_fetch_row($result);    >>>>>>>array numerik
// $row = mysqli_fetch_assoc($result);     >>>>>>>array associative
// $row = mysqli_fetch_array($result);        >>>>>>>>>>>keduanya

$rows = [];
while($row = mysqli_fetch_assoc($result)){
  $rows[] = $row;
}




// tampung ke variable mahasiswa 
$mahasiswa = $rows;




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
</head>
<body>
  <h3>Daftar Mahasiswa</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1; 
    foreach($mahasiswa as $m) : ?>

    <tr>
      <td><?= $i++; ?></td>
      <td><img src="img/<?= $m['gambar']; ?>" alt="" style="width: 100px;" height="100px"></td>
      <td><?= $m['nrp']; ?></td>
      <td><?= $m['nama']; ?></td>
      <td><?= $m['email']; ?></td>
      <td><?= $m['jurusan']; ?></td>
      <td>
      <!-- <button type="button" class="btn btn-primary" href="test.html">Ubah</button>
      <button type="button" class="btn btn-primary" href="">Hapus</button> -->
        <a href="">Ubah</a> | <a href="">Hapus</a>
      </td>
    </tr>

      <?php endforeach; ?>

  </table>
</body>
</html>