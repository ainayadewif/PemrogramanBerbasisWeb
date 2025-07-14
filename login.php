<?php

  session_start();

      if(isset($_SESSION["login"]))
      {
          header("Location: datamahasiswa.php");
          exit;
      }

  require 'function.php';

  $error = false;

  if(isset($_POST["login"]))
  {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username='$username'";

    $result = mysqli_query($koneksi, $query);

    $user = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0)
    {
      
      if(password_verify($password, $user["password"]))
      {

        $_SESSION['login'] = $user['id'];
        
        header("Location: datamahasiswa.php");
        exit;
      }
    }

    $error = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Web Informatika</title>
  </head>
  <body>
    <h1 style="text-align left;" >LOGIN</h1>
    <?php if ($error): ?>
      <script>alert("Login gagal! Username atau password salah.");</script>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="">Username</label>
      <input type="username" name="username" placeholder="username" />
      <br />
      <label for="">Password</label>
      <input type="password" name="password" id="" placeholder="password" />
      <br />
      <input type="checkbox" value="remember" /><label for=""
        >Ingatkan Saya</label
      >
      <br />
      <button type="submit" name="login">LOGIN</button>
    </form>
    <p>Belum Punya Akun? <a href="register.html">Daftar</a></p>
  </body>
</html>
