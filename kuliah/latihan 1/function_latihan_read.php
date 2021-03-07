<?php 
function koneksi(){
  return mysqli_connect('localhost', 'root', '', 'pw_043040023');
}
function query($query){
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}
function tambah($data){
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
?>