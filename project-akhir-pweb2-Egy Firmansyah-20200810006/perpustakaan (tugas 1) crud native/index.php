<?php
session_start();

if (!isset($_SESSION["login"])) {
   header("Location: login.php");
   exit;
}

include "koneksi.php";
$tlg = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistem Informasi Perpustakaan</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
   <div id="container">
      <div id="header">
         <div id="logo-perpustakaan-container">
            <img src="images/book.png" alt="" id="logo-perpustakaan" style="border-radius:20%; width:70px; height:70px; text-decoration: none; outline: none;">
         </div>

         <div id="nama-alamat-perpustakaan-container">
            <div class="nama-alamat-perpustakaan">
               <h1 style="color: #5c3701;;">PERPUSTAKAAN UMUM</h1>
            </div>
            <div class="nama-alamat-perpustakaan">
               <h4 style="color: #5c3701;">Jl. Kaliabang No 21, Telp: (021)5667889</h4>
            </div>
         </div>
      </div>

      <div id="header2">
         <div id="nama-user">Hi, <?= $_SESSION['level'] ?></div>
      </div>

      <div id="sidebar">
         <a href="index.php?p=beranda">Beranda</a>
         <p class="label-navigasi">Data Master</p>
         <ul>
            <li><a href="index.php?p=anggota">Data anggota</a></li>
            <li><a href="index.php?p=buku">Data Buku</a></li>
         </ul>
         <?php $level = $_SESSION['level'] == 'admin';
         if ($level) { ?>
            <p class="label-navigasi">Data Transaksi</p>
            <ul>
               <li><a href="index.php?p=transaksi-peminjaman">Transaksi Peminjaman</a></li>
               <li><a href="index.php?p=transaksi-pengembalian">Transaksi Pengembalian</a></li>
            </ul>
         <?php } ?>
         <p class="label-navigasi">Laporan Transaksi</p>

         <ul>
            <li><a href="logout.php">Logout</a></li>
         </ul>
      </div>

      <div id="content-container">
         <div class="container">

            <div class="row"><br><br><br>
               <div class="col-md-10 col-md-offset-1" style="background-image: url('../');">
                  <div class="col-md-10 col-md-offset-4">
                     <div class="panel panel-warning login-panel" style="background-color: rgba(255, 255,255 0.6); position:relative;">
                        <div class="panel-footer">

                           <?php
                           $pages_dir = 'pages'; //tempat penyimpanan file nya

                           if (!empty($_GET['p'])) {

                              $pages = scandir($pages_dir, 0);
                              unset($pages[0], $pages[1]);

                              $p = $_GET['p'];

                              if (in_array($p . ".php", $pages)) {
                                 include($pages_dir . '/' . $p . '.php');
                              } else {
                                 echo "<div style='text-align:center;'> Halaman Tidak Ditemukan </div>";
                              }
                           } else {
                              include($pages_dir . '/beranda.php');
                           }
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>

   <div id="footer">
      <h3>Sistem Informasi Perpustakaan (Sipus)</h3>
   </div>


</body>

</html>