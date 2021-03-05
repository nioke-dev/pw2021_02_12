<?php 
//pertama hubungkan halaman hapus dengan funtions.php
  require 'functions.php';


  // jika tidak ada id di url
  if( !isset($_GET['id']) ){
    header("Location: index.php");
    exit;
  }

// mengambil id dari url 
  $id = $_GET['id'];


  if (hapus( $id ) > 0) {
    // jika nilai nya 1 maka ada mahasiswa yang dihapus
    // jika nilai nya 0 maka tidak ada mahasiswa yang dihapus
    // jika nilai nya -1 artinya query nya error
    # code...
    echo "
      <script>
        alert('Data Berhasil Dihapus!!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    # code...
    echo "
      <script>
        alert('Data Gagal Ditambahkan!!');
      </script>
    ";
  }

?>