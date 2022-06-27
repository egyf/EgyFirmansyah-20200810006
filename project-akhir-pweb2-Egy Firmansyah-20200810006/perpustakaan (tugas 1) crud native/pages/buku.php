<div id="label-page">Tampil Data buku</div>
<div id="content">
   <p id="tombol-tambah-container">
      <!-- <a href="index.php?p=buku-input" class="tombol">Tambah Data Buku</a>
      <a href="pages/cetak.php" target="_blank"><img src="print.png" class="print" alt="print"></a> -->

   <form action="" class="form-inline" method="POST">
      <?php $level = $_SESSION['level'] == 'admin';
      if ($level) { ?>
         <a href="index.php?p=buku-input" class="tombol">Tambah Data Buku</a>
         <a href="pages/cetak.php" target="_blank"><img src="print.png" class="print" alt="print"></a>
      <?php } ?>
      <div style="margin-right: 15px; float:right;">
         <form action="" method="POST">
            <input type="text" name="pencarian" id="" autofocus placeholder="masukan keyword pencarian..." autocomplete="off" size="30">
            <input type="submit" value="search" name="search" class="tombol" style="margin-top: 10px;">
         </form>
      </div>
   </form>
   </p>

   <table id="tabel-tampil" border="0" cellspacing="3">
      <tr>
         <th id="label-tampil-no">No</th>
         <th>Kode Buku</th>
         <th>Judul</th>
         <th>Kategori</th>
         <th>Penulis</th>
         <th>Penerbit</th>
         <?php $level = $_SESSION['level'] == 'admin';
         if ($level) { ?>
            <th id="label-opsi-buku">Opsi</th>
         <?php } ?>
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
            $sql = "SELECT * FROM buku WHERE kd_buku LIKE '%$pencarian%' OR judul LIKE '%$pencarian%' OR pengarang LIKE '%$pencarian%' OR tgl_terbit LIKE '%$pencarian%' ";
            $query = $sql;
            $queryJml = $sql;
         } else {
            $query = "SELECT * FROM buku LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM buku";
            $no = $posisi * 1;
         }
      } else {
         $query = "SELECT * FROM buku LIMIT $posisi, $batas";
         $queryJml = "SELECT * FROM buku";
         $no = $posisi * 1;
      }

      $q_tampil_buku = mysqli_query($db, $query);
      if (mysqli_num_rows($q_tampil_buku) > 0) {
         while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) { ?>
            <tr>
               <td><?= $nomor; ?></td>
               <td><?= $r_tampil_buku['kd_buku']; ?></td>
               <td><?= $r_tampil_buku['judul']; ?></td>
               <td><?= $r_tampil_buku['kategori']; ?></td>
               <td><?= $r_tampil_buku['pengarang']; ?></td>
               <td><?= $r_tampil_buku['penerbit']; ?></td>
               <?php $level = $_SESSION['level'] == 'admin';
               if ($level) { ?>
                  <td>
                     <div class="tombol-opsi-container-buku">
                        <a href="index.php?p=buku-edit&id=<?= $r_tampil_buku['kd_buku']; ?>" class="tombol">Edit</a>
                     </div>
                     <div class="tombol-opsi-container-buku">
                        <a href="proses/buku-hapus.php?id=<?= $r_tampil_buku['kd_buku']; ?>" class="tombol" onclick="return confirm('apakah anda yakin akan menghapus data ini')">Hapus</a>
                     </div>
                  </td>
               <?php } ?>
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
               echo "<a href='?p=buku&hal=$i'>$i</a>";
            } else {
               echo "<a class='active'>$i</a>";
            }
         }
         ?>
      </div>
   <?php } ?>
</div>