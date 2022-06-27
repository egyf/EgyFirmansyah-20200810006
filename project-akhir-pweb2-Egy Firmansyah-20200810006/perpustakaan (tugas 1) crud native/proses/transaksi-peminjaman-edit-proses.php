<?php
include "../koneksi.php";

$id_transaksi = $_POST['id_transaksi'];
$id_anggota = $_POST['id_anggota'];
$kd_buku = $_POST['kd_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

// var_dump($id_transaksi, $id_anggota, $kd_buku, $tgl_pinjam, $tgl_kembali);
// die();

if (isset($_POST['simpan'])) {
   mysqli_query($db, "UPDATE transaksi SET id_anggota='$id_anggota', kd_buku='$kd_buku', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali' WHERE id_transaksi='$id_transaksi' ");
   header("location:../index.php?p=transaksi-peminjaman");
}
