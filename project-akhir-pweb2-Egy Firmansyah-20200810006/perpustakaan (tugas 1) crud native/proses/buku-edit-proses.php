<?php
include "../koneksi.php";

$kd_buku = $_POST['kd_buku'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$kategori = $_POST['kategori'];

if (isset($_POST['simpan'])) {
   mysqli_query($db, "UPDATE buku SET judul='$judul', pengarang='$pengarang', kategori='$kategori', penerbit='$penerbit' WHERE kd_buku='$kd_buku' ");
   header("location:../index.php?p=buku");
}
