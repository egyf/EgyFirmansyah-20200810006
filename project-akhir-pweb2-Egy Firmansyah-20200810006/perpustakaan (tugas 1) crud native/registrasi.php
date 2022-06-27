<?php
require 'koneksi.php';

if (isset($_POST["register"])) {
   if (registrasi($_POST) > 0) {
      echo "<script>
               alert('user baru berhasil ditambahkan');
            </script>";
   } else {
      mysqli_error($db);
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Halaman Login</title>
   <style>
      label {
         display: block;
      }
   </style>
</head>

<body>

   <form action="" method="POST">
      <div class="form-registrasi">
         <label for="username">Username</label>
         <input type="text" name="username" id="username">
      </div>
      <div>
         <label for="password">Password</label>
         <input type="password" name="password" id="password">
      </div>
      <div>
         <label for="password2">Password</label>
         <input type="password" name="password2" id="password2">
      </div>
      <div>
         <button type="submit" name="register">Registrasi</button>
      </div>

   </form>

</body>

</html>