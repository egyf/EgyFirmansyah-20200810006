<?php
include "../koneksi.php";
$kd_buku = $_GET['id'];

mysqli_query($db, "DELETE FROM buku WHERE kd_buku='$kd_buku'");
header('location:../index.php?p=buku');
