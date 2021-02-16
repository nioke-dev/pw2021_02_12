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
?>