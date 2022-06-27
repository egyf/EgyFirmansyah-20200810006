<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['user'];
$password = $_POST['pass'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

   $data = mysqli_fetch_assoc($login);

   // cek jika user login sebagai admin
   if ($data['level'] == "admin") {

      // buat session login dan username
      $_SESSION['username'] = $username;
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['level'] = "admin";
      $_SESSION["login"] = true;
      // alihkan ke halaman dashboard admin
      header("location:index.php");

      // cek jika user login sebagai user
   } else if ($data['level'] == "user") {
      // buat session login dan username
      $_SESSION['username'] = $username;
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['level'] = "user";
      $_SESSION["login"] = true;
      // alihkan ke halaman dashboard user
      header("location:index.php");
   } else {
      // alihkan ke halaman login kembali
      echo "<meta http-equiv='refresh' content='0; url=login.php'>";
      echo "<script> alert('Anda gagal Log In') </script>";
   }
} else {
   echo "<meta http-equiv='refresh' content='0; url=login.php'>";
   echo "<script> alert('Anda gagal Log In') </script>";
}
