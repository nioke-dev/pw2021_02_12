<?php
session_start();

if (isset($_SESSION['login'])) {
  # code...
  header("Location: index.php");
  exit;
}

require 'functions.php';

//ketika tombol login ditekan
if (isset($_POST['login'])) {
  # code...
  $login = login($_POST);
  // $login ini akan terjadi ketika eror jadi kalau berhasil ini gak akan manmpung erornya tapi langsung pindah ke header("Location: index.php");
  // tapi kalau gagal misalkan usernamenya bukan admin maka array yang ada di funtion login akan masuk kedalam variable login
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h3>Form Login</h3>

  <?php if (isset($login['error'])) : ?>
    <p style="color: red; font-style: italic;"><?= $login['pesan']; ?></p>
  <?php endif; ?>


  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Username :
          <input type="text" name="username" autofocus autocomplete="false" required>
        </label>
      </li>
      <li>
        <label>
          Password :
          <input type="password" name="password" required>
        </label>
      </li>
      <li>
        <button type="submit" name="login">login</button>
      </li>
    </ul>
  </form>
</body>

</html>