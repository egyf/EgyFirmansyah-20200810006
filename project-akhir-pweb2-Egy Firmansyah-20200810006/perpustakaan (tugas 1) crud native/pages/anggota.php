<div id="label-page">Tampil Data Anggota</div>
<div id="content">
   <p id="tombol-tambah-container">
      <!-- <a href="index.php?p=anggota-input" class="tombol-anggota">Tambah Anggota</a> -->
      <!-- <a href="pages/cetak.php" target="_blank"><img src="print.png" class="print"></a> -->

   <form action="" class="form-inline" method="POST">
      <?php $level = $_SESSION['level'] == 'admin';
      if ($level) { ?>
         <a href="index.php?p=anggota-input" class="tombol">Tambah Anggota</a>
         <a href="pages/cetak.php" target="_blank"><img src="print.png" class="print"></a>
      <?php } ?>
      <!--  align="right" -->
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
         <th>ID Anggota</th>
         <th>Nama</th>
         <th style="padding-left: 20px;">Foto</th>
         <th>Jenis Kelamin</th>
         <th>Alamat</th>
         <?php $level = $_SESSION['level'] == 'admin';
         if ($level) { ?>
            <th id="label-opsi-anggota">Opsi</th>
         <?php } ?>
      </tr>

      <?php
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
            $sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian%' OR idanggota LIKE '%$pencarian%' OR jeniskelamin LIKE '%$pencarian%' OR alamat LIKE '%$pencarian%' ";
            $query = $sql;
            $queryJml = $sql;
         } else {
            $query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM tbanggota";
            $no = $posisi * 1;
         }
      } else {
         $query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
         $queryJml = "SELECT * FROM tbanggota";
         $no = $posisi * 1;
      }

      $q_tampil_anggota = mysqli_query($db, $query);
      if (mysqli_num_rows($q_tampil_anggota) > 0) {
         while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
            if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-')) {
               $foto = "admin-no-photo.jpg";
            } else {
               $foto = $r_tampil_anggota['foto'];
            }
      ?>
            <tr>
               <td><?= $nomor; ?></td>
               <td><?= $r_tampil_anggota['idanggota']; ?></td>
               <td><?= $r_tampil_anggota['nama']; ?></td>
               <td><img src="images/<?= $foto; ?>" alt="" class="foto"></td>
               <td><?= $r_tampil_anggota['jeniskelamin']; ?></td>
               <td><?= $r_tampil_anggota['alamat']; ?></td>
               <?php $level = $_SESSION['level'] == 'admin';
               if ($level) { ?>
                  <td>
                     <div class="tombol-opsi-container-anggota">
                        <a href="pages/cetak_kartu.php?id=<?= $r_tampil_anggota['idanggota']; ?>" class="tombol">Cetak Kartu</a>
                     </div>
                     <div class="tombol-opsi-container-anggota">
                        <a href="index.php?p=anggota-edit&id=<?= $r_tampil_anggota['idanggota']; ?>" class="tombol">Edit</a>
                     </div>
                     <div class="tombol-opsi-container-anggota">
                        <a href="proses/anggota-hapus.php?id=<?= $r_tampil_anggota['idanggota']; ?>" class="tombol" onclick="return confirm('apakah anda yakin akan menghapus data ini')">Hapus</a>
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
         echo "Data hasil pencarian : <b>" . $jml . "</b>";
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
               echo "<a href='?p=anggota&hal=$i'>$i</a>";
            } else {
               echo "<a class='active'>$i</a>";
            }
         }
         ?>
      </div>
   <?php } ?>
</div>