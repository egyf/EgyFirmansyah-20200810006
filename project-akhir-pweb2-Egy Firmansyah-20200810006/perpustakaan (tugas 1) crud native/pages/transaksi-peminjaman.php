<div id="label-page">Transaksi Peminjaman</div>
<div id="content">
   <p id="tombol-tambah-container">
   <form action="" class="form-inline" method="POST">
      <a href="index.php?p=transaksi-peminjaman-input" class="tombol">Tambah Transaksi Peminjaman</a>
      <a href="pages/cetak.php" target="_blank"><img src="print.png" class="print" alt="print"></a>
      <div style="margin-right: 15px; float:right;">
         <form action="" method="POST">
            <input type="text" name="pencarian" id="" autofocus placeholder="masukan keyword pencarian..." autocomplete="off" size="30">
            <input type="submit" value="search" name="search" class="tombol" style="margin-top: 10px;">
         </form>
      </div>
   </form>
   </p>

   <table id="tabel-tampil" border="0" cellspacing="3" cellpadding="0">
      <tr>
         <th id="label-tampil-no">No</th>
         <th>Id Transaksi</th>
         <th>Id Anggota</th>
         <th>Nama</th>
         <th>Id Buku</th>
         <th>Judul</th>
         <th>Tanggal Pinjam</th>
         <th id="label-opsi">Opsi</th>
      </tr>

      <?php
      // include "koneksi.php";
      $batas = 5;
      extract($_GET);
      if (empty($hal)) {
         $posisi = 0;
         $hal = 1;
         $nomor = 1;
      } else {
         $posisi = ($hal - 1) * $batas;
         $nomor = $posisi + 1;
      }

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
         $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
         if ($pencarian != "") {
            // $sql = "SELECT * FROM transaksi INNER JOIN tbanggota ON transaksi.id_anggota=tbanggota.idanggota INNER JOIN buku ON transaksi.kd_buku=buku.kd_buku WHERE kd_buku LIKE '%$pencarian%' OR judul LIKE '%$pencarian%' OR id_anggota LIKE '%$pencarian%' OR nama LIKE '%$pencarian%' OR id_transaksi LIKE '%$pencarian%' ";
            $sql = "SELECT * FROM transaksi WHERE kd_buku LIKE '%$pencarian%' OR id_anggota LIKE '%$pencarian%'  OR id_transaksi LIKE '%$pencarian%' ";
            $query = $sql;
            $queryJml = $sql;
         } else {
            $query = "SELECT * FROM transaksi INNER JOIN tbanggota ON transaksi.id_anggota=tbanggota.idanggota INNER JOIN buku ON transaksi.kd_buku=buku.kd_buku LIMIT $posisi, $batas";
            $query = "SELECT * FROM transaksi INNER JOIN tbanggota ON transaksi.id_anggota=tbanggota.idanggota INNER JOIN buku ON transaksi.kd_buku=buku.kd_buku LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM transaksi INNER JOIN tbanggota ON transaksi.id_anggota=tbanggota.idanggota INNER JOIN buku ON transaksi.kd_buku=buku.kd_buku";
            $no = $posisi * 1;
         }
      } else {
         $query = "SELECT * FROM transaksi INNER JOIN tbanggota ON transaksi.id_anggota=tbanggota.idanggota INNER JOIN buku ON transaksi.kd_buku=buku.kd_buku LIMIT $posisi, $batas";
         $queryJml = "SELECT * FROM transaksi INNER JOIN tbanggota ON transaksi.id_anggota=tbanggota.idanggota INNER JOIN buku ON transaksi.kd_buku=buku.kd_buku";
         $no = $posisi * 1;
      }

      $q_tampil_transaksi = mysqli_query($db, $query);
      if (mysqli_num_rows($q_tampil_transaksi) > 0) {
         while ($r_tampil_transaksi = mysqli_fetch_array($q_tampil_transaksi)) { ?>
            <tr>
               <td style="padding-bottom:20px;"><?= $nomor; ?></td>
               <td style="padding-bottom:20px;"><?= $r_tampil_transaksi['id_transaksi']; ?></td>
               <td style="padding-bottom:20px;"><?= $r_tampil_transaksi['id_anggota']; ?></td>
               <td style="padding-bottom:20px;"><?= $r_tampil_transaksi['nama']; ?></td>
               <td style="padding-bottom:20px;"><?= $r_tampil_transaksi['kd_buku']; ?></td>
               <td style="padding-bottom:20px;"><?= $r_tampil_transaksi['judul']; ?></td>
               <td style="padding-bottom:20px;"><?= $r_tampil_transaksi['tgl_pinjam']; ?></td>
               <td>
                  <div class="tombol-opsi-container-peminjaman">
                     <a href="pages/transaksi-cetak.php?id=<?= $r_tampil_transaksi['id_transaksi']; ?>" class="tombol">Cetak Nota</a><br><br>
                  </div>
                  <div class="tombol-opsi-container-peminjaman">
                     <a href="index.php?p=transaksi-peminjaman-edit&id=<?= $r_tampil_transaksi['id_transaksi']; ?>" class="tombol">Pengembalian</a>
                  </div>

                  <div class="tombol-opsi-container-peminjaman">
                     <a href="proses/transaksi-hapus.php?id=<?= $r_tampil_transaksi['id_transaksi']; ?>" class="tombol" onclick="return confirm('apakah anda yakin akan menghapus data ini')">Hapus</a>
                  </div>
               </td>
            </tr>

      <?php
            $nomor++;
         }
      } else {
         echo "<td colspan='6'> Data tidak ditemukan </td>";
      }
      ?>
   </table>

   <?php
   if (isset($_POST['pencarian'])) {
      if ($_POST['pencarian'] != '') {
         echo "<div style='float:left;'>";
         $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
         echo "Data hasil pencarian : <b>$jml</b>";
         echo "</div>";
      }
   } else {
   ?>
      <div style="float: left; margin-top:13px; font-weight:bold;">
         <?php
         $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
         echo "Jumlah Data : <b>$jml</b>";
         ?>
      </div>
      <div class="pagination">
         <?php
         $jml_hal = ceil($jml / $batas);
         for ($i = 1; $i <= $jml_hal; $i++) {
            if ($i != $hal) {
               echo "<a href='?p=transaksi-peminjaman&hal=$i'>$i</a>";
            } else {
               echo "<a class='active'>$i</a>";
            }
         }
         ?>
      </div>
   <?php } ?>
</div>