<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_043040023');
}
function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);




  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function tambah($data)
{
  $conn = koneksi();


  $nama = $data['nama'];
  $nrp = $data['nrp'];
  $email = $data['email'];
  $jurusan = $data['jurusan'];
  $gambar = $data['gambar'];

  $query = "INSERT INTO
              mahasiswa
            VALUES (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar');  
              ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = $data['nama'];
  $nrp = $data['nrp'];
  $email = $data['email'];
  $jurusan = $data['jurusan'];
  $gambar = $data['gambar'];

  $query = "UPDATE mahasiswa SET
            nama = '$nama',
            nrp = '$nrp',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id
            ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn) or die(mysqli_error($conn));
}
function hapus($data_id)
{
  $conn = koneksi();
  $query = "DELETE FROM mahasiswa WHERE id = $data_id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
