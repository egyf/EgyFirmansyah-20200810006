<?php
include "../koneksi.php";
$id_transaksi = $_GET['id'];
$q_tampil_transaksi = mysqli_query($db, "SELECT * FROM transaksi INNER JOIN tbanggota ON transaksi.id_anggota=tbanggota.idanggota INNER JOIN buku ON transaksi.kd_buku=buku.kd_buku WHERE id_transaksi='$id_transaksi' ");
$r_tampil_transaksi = mysqli_fetch_array($q_tampil_transaksi); ?>


<div id="label-page">
   <h3>Transaksi Peminjaman Buku</h3>
</div>
<div id="content">
   <table id="tabel-input">
      <tr>
         <td class="label-formulir">Nama </td>
         <td class="isian-formulir"> : <?= $r_tampil_transaksi['nama']; ?></td>
      </tr>
      <tr>
         <td class="label-formulir">Judul Buku </td>
         <td class="isian-formulir"> : <?= $r_tampil_transaksi['judul']; ?></td>
      </tr>
      <tr>
         <td class="label-formulir">Tanggal Pinjam</td>
         <td class="isian-formulir"> : <?= date('d F Y', strtotime($r_tampil_transaksi['tgl_pinjam'])); ?></td>
      </tr>
      <tr>
         <td class="label-formulir">Tanggal Pengembalian </td>
         <td class="isian-formulir"> : <?= date('d F Y', strtotime($r_tampil_transaksi['tgl_kembali'])); ?></td>
      </tr>
   </table>
</div>

<script>
   window.print();
</script>