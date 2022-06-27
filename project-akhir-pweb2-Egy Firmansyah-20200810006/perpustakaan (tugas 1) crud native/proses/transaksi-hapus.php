<?php
include "../koneksi.php";

$id_transaksi = $_GET['id'];

mysqli_query($db, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
header('location:../index.php?p=transaksi-peminjaman');
