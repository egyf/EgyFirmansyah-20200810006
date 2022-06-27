<?php
include "../koneksi.php";
$kd_buku = $_POST['kd_buku'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$kategori = $_POST['kategori'];


if (isset($_POST['simpan'])) {
   $sql = "INSERT INTO buku VALUES ('$kd_buku','$judul','$kategori','$pengarang','$penerbit')";
   $query = mysqli_query($db, $sql);
   header('location:../index.php?p=buku');
}
