<?php
include "../koneksi.php";

$id_transaksi = $_POST['id_transaksi'];
$id_anggota = $_POST['id_anggota'];
$kd_buku = $_POST['kd_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];

if (isset($_POST['simpan'])) {
   $sql = "INSERT INTO transaksi VALUES ('$id_transaksi','$id_anggota','$kd_buku','$tgl_pinjam','')";
   $query = mysqli_query($db, $sql);
   header('location:../index.php?p=transaksi-peminjaman');
}
