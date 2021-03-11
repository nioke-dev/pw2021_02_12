<?php
// pertama hubungkan halaman ini dengan function
require 'function_latihan_read.php';

// lakukan pengamanan
if (!isset($_GET['id'])) {
  # code...
  header("location: latihan read.php");
  exit;
}

// mengambil id dari url
$id = $_GET['id'];

if (hapus($id) > 0) {
  # code...
  echo "data berhasil di hapus";
  header("location: latihan read.php");
} else {
  echo "data gagal dihapus";
}
