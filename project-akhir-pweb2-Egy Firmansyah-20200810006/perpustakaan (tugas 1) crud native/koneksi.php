<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "dbperpus";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db) {
   die('Gagal terhubung dengan database' . mysqli_connect_error());
}

function registrasi($data)
{
   global $db;
   $username = strtolower(stripslashes($data["username"]));
   $password = $data["password"];
   $password2 = $data["password2"];

   // cek username udah ada apa belom
   $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
   if (mysqli_fetch_assoc($result)) {
      echo "<script>
               alert('username telah terdaftar');
            </script>";
      return false;
   }

   // cek konfirmasi password
   if ($password !== $password2) {
      echo "<script>
               alert('konfirmasi password tidak sesuai');
            </script>";
      return false;
   } else {
      echo "<script>
               alert('user baru berhasil ditambahkan');
            </script>";
      echo "<meta http-equiv='refresh' content='0; url=login.php?user='>";
   }
   // enkripsi password
   // $password = password_hash($password, PASSWORD_DEFAULT);

   // tambahkan password baru ke database
   mysqli_query($db, "INSERT INTO users VALUES('','$username','$password')");
   mysqli_affected_rows($db);
}
