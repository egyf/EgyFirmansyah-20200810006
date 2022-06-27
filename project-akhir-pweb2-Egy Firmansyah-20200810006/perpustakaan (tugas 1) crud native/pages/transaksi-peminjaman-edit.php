<?php
$id_transaksi = $_GET['id'];
$q_tampil_transaksi = mysqli_query($db, "SELECT * FROM transaksi INNER JOIN tbanggota ON transaksi.id_anggota=tbanggota.idanggota INNER JOIN buku ON transaksi.kd_buku=buku.kd_buku   WHERE id_transaksi='$id_transaksi'");
$r_tampil_transaksi = mysqli_fetch_array($q_tampil_transaksi);
?>

<div id="label-page">
   <h3>Edit Data Transaksi</h3>
</div>
<div id="content">
   <form action="proses/transaksi-peminjaman-edit-proses.php" method="POST">
      <table id="tabel-input">
         <tr>
            <td class="label-formulir">Id Transaksi</td>
            <td class="isian-formulir"><input type="text" name="id_transaksi" id="" class="isian-formulir isian-formulir-border tabel-formulir-disable" value="<?= $r_tampil_transaksi['id_transaksi']; ?>"></td>
         </tr>
         <tr>
            <td class="label-formulir">Anggota</td>
            <td class="isian-formulir">
               <select name="id_anggota" id="" class="isian-formulir isian-formulir-border">
                  <option value="<?= $r_tampil_transaksi['id_anggota']; ?>"><?= $r_tampil_transaksi['nama']; ?></option>
                  <?php
                  $query = mysqli_query($db, "SELECT * FROM tbanggota ORDER BY nama ASC");
                  while ($anggota = mysqli_fetch_array($query)) { ?>
                     <option value="<?= $anggota['idanggota']; ?>"><?= $anggota['nama']; ?></option>
                  <?php } ?>
               </select>
            </td>
         </tr>
         <tr>
            <td class="label-formulir">Buku</td>
            <td class="isian-formulir">
               <select name="kd_buku" id="" class="isian-formulir isian-formulir-border">
                  <option value="<?= $r_tampil_transaksi['kd_buku']; ?>"><?= $r_tampil_transaksi['judul']; ?></option>
                  <?php
                  $query = mysqli_query($db, "SELECT * FROM buku ORDER BY judul ASC");
                  while ($buku = mysqli_fetch_array($query)) { ?>
                     <option value="<?= $buku['kd_buku']; ?>"><?= $buku['judul']; ?></option>
                  <?php } ?>
               </select>
            </td>
         </tr>
         <tr>
            <td class="label-formulir">Tanggal Pinjam</td>
            <td class="isian-formulir">
               <input type="date" name="tgl_pinjam" class="isian-formulir isian-formulir-border" value="<?= $r_tampil_transaksi['tgl_pinjam']; ?>">
            </td>
         </tr>
         <tr>
            <td class="label-formulir">Tanggal Pengembalian</td>
            <td class="isian-formulir">
               <input type="date" name="tgl_kembali" class="isian-formulir isian-formulir-border">
            </td>
         </tr>

         <tr>
            <td class="label-formulir"></td>
            <td class="isian-formulir"><input type="submit" name="simpan" value="simpan" class="tombol"></td>
         </tr>
      </table>
   </form>
</div>