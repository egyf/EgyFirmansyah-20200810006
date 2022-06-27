<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION["login"])) {
   header("Location: index.php");
   exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style-login.css">
   <title>halaman login</title>
</head>

<body>
   <div class="login-box">
      <img src="images/icon.jpg" alt="" class="avatar">
      <h1>Login</h1>
      <form action="login-proses.php" method="POST">
         <input type="text" name="user" placeholder="Enter Username" autocomplete="off">
         <p style="margin-left: 2px;">Password</p>
         <input type="password" name="pass" placeholder="Enter password">
         <input type="submit" name="login" value="Login">
         <a href="#">Forget Password</a>
         <a href="registrasi.php" style="margin-left: 55px;">Register</a>
      </form>
   </div>
</body>

</html>