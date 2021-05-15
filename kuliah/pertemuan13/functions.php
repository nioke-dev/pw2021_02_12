<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_043040023');
}
function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya satu data 
  if (mysqli_num_rows($result) == 1) {
    // jadi kalau resultnya cuman 1 langsung ajah
    return mysqli_fetch_assoc($result);
    // intinya gak usah di looping
  }


  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }


  return $rows;
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];


  // lakukan serangkaian pengecekan


  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    // echo "<script>
    //         alert('pilih gambar terlebih dahulu!');
    //       </script>";
    return 'nophoto.png';
    // kenapa dikasih return false supaya uploadnya false jadi nanti upload() berisi false $gambarnya berisi false
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  // explode() parameternya ada 2 yang pertama mau dipecah pakai apa misall pakai titik
  // terus string apa yang mau di pecah yaitu string $nama_file
  // maka nanti jika sandhika.jpg maka akan menjadi koma jpg

  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    // in_array() = apakah suatu nilai ada di dalam array atau tidak
    // kita mau bikin kebalikannya atau negasi nya 
    // rumusnya mencari jarum di tumpukan jerami <--- rumus dari paramater in_array
    echo "<script>
            alert('Yang Anda Pilih Bukan Gambar!');
          </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
            alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5Mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
            alert('ukuran terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
  // move_uploaded_file = memindahkan file yang sudah diupload ke tempat penyimpanan sementara dipindahkan ke tempat penyimpanan yang kita inginkan
  // 

  return $nama_file_baru;
  // return $nama_file_baru; supaya begitu filenya berhasil masuk ke upload() masuk ke $gambar dan $gambar berisi nama file tadi
  // sehinnga waktu diinsert ke database nama file barunya masuk
}

function tambah($data)
{
  // var_dump($data);
  // cara menambah data cukup memanggil fungsinya yaitu query

  $conn = koneksi();


  // htmlspecialchars() artinya semua data yang dikirim oleh user di cek
  // ada simbol "<"  kalau ada jangan tampilin itu

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  // $gambar = htmlspecialchars($data['gambar']);


  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  // supaya sekarang function tambahnya yang berhenti dan menghasilkan nila false  

  $query = "INSERT INTO
              mahasiswa
            VALUES
            (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar');
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
  // buat ngasih tau ke mysql nya bahwa ada baris yang berubah di database kita
  // berubah itu entah itu tambah entah itu ilang atau dihapus atau dimodifikasi
  // kalau angkanya menghasilkan 1 berarti ada satu yang nambah atau satu yang ngilang
  // kalau angkanya 0 berarti tidak ada yang nambah
  // tapi kalu angkanya minus 1 ada yang eror
}
// dia akan ngambil data ynag dikirimin tadi, data dikirimin dalam bentuk post terus kita ambil boleh dalam bentuk apa saja




function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
  // jika ada eror kita langsug bisa matikan perogramnya or die(mysqli_eror($conn))

  return mysqli_affected_rows($conn);
}



// duplicate dari funtion tambah
function ubah($data)
{
  // var_dump($data);
  // cara menambah data cukup memanggil fungsinya yaitu query

  $conn = koneksi();


  // htmlspecialchars() artinya semua data yang dikirim oleh user di cek
  // ada simbol "<"  kalau ada jangan tampilin itu
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE mahasiswa SET
              nama = '$nama',
              nrp = '$nrp',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
            WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
  // buat ngasih tau ke mysql nya bahwa ada baris yang berubah di database kita
  // berubah itu entah itu tambah entah itu ilang atau dihapus atau dimodifikasi
  // kalau angkanya menghasilkan 1 berarti ada satu yang nambah atau satu yang ngilang
  // kalau angkanya 0 berarti tidak ada yang nambah
  // tapi kalu angkanya minus 1 ada yang eror
}
// dia akan ngambil data ynag dikirimin tadi, data dikirimin dalam bentuk post terus kita ambil boleh dalam bentuk apa saja
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM mahasiswa
            WHERE 
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%'
            ";

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // cek dulu username

  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    // cek passwordnya
    if (password_verify($password, $user['password'])) {
      // password_verify() = dia akan ngebandingin string biasa dengan string yang sudah di acak





      // sama dengan nya 2 untuk membandingkan hati hati salah

      // set session
      $_SESSION['login'] = true;
      // $_SESSION merupakan variable superglobal
      // session ini bisa kita cek di semua halaman selama session nya masih ada
      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => 'true',
    'pesan' => 'Username / Password Salah!'
  ];
}
function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);
  // untuk menghindari sql injection kita butuh ini :
  // yang akan ngecek apakah password user itu ada script jahat atau engga itu mysqlnya sekarang bukan phpnya
  // strtolower = supaya saya memaksa apapun yang ditulisin sama usernya menjadi huruf kecil semua


  // lakukan serangkaian pengecekan

  // jika username atau password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
            alert('username atau password tidak boleh kosong!');
            document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // jika username sudah ada di database
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
            alert('Username Sudah Terdaftar');
            document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
            alert('Konfirmasi Password Tidak Sesuai');
            document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // Jika Password Lebih kecil dari 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
          alert('Password Terlalu Pendek');
          document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // jika username dan passwordnya sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
  $query = "INSERT INTO user
              VALUES
            (null, '$username', '$password_baru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
