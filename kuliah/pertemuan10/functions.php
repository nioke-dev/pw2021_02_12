<?php 
function koneksi(){
  return mysqli_connect('localhost', 'root', '', 'pw_043040023');
}
function query($query){
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya satu data 
  if( mysqli_num_rows($result) == 1){
    // jadi kalau resultnya cuman 1 langsung ajah
    return mysqli_fetch_assoc($result);
    // intinya gak usah di looping
  }


  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }


  return $rows; 
}


function tambah($data){
  // var_dump($data);
  // cara menambah data cukup memanggil fungsinya yaitu query

  $conn = koneksi();

  $nama = $data['nama'];
  $nrp = $data['nrp'];
  $email = $data['email'];
  $jurusan = $data['jurusan'];
  $gambar = $data['gambar'];

  $query = "INSERT INTO
              mahasiswa
            VALUES
            (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar');
            ";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
  // buat ngasih tau ke mysql nya bahwa ada baris yang berubah di database kita
  // berubah itu entah itu tambah entah itu ilang atau dihapus atau dimodifikasi
  // kalau angkanya menghasilkan 1 berarti ada satu yang nambah atau satu yang ngilang
  // kalau angkanya 0 berarti tidak ada yang nambah
  // tapi kalu angkanya minus 1 ada yang eror
}
// dia akan ngambil data ynag dikirimin tadi, data dikirimin dalam bentuk post terus kita ambil boleh dalam bentuk apa saja




























?>