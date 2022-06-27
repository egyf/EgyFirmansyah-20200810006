<?php
$kd_buku = $_GET['id'];
$q_tampil_buku = mysqli_query($db, "SELECT * FROM buku WHERE kd_buku='$kd_buku'");
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);
?>

<div id="label-page">
   <h3>Edit Data buku</h3>
</div>
<div id="content">
   <form action="proses/buku-edit-proses.php" method="POST">
      <table id="tabel-input">
         <tr>
            <td class="label-formulir">Kode Buku</td>
            <td class="isian-formulir"><input type="text" name="kd_buku" value="<?= $r_tampil_buku['kd_buku']; ?>" readonly class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
         </tr>
         <tr>
            <td class="label-formulir">Judul Buku</td>
            <td class="isian-formulir">
               <input type="text" name="judul" id="" value="<?= $r_tampil_buku['judul']; ?>" class="isian-formulir isian-formulir-border">
            </td>
         </tr>
         <tr>
            <td class="label-formuli">Kategori</td>
            <td class="isian-formuli">
               <select name="kategori" class="isian-formulir isian-formulir-border">
                  <option value="<?= $r_tampil_buku['kategori']; ?>"><?= $r_tampil_buku['kategori']; ?></option>
                  <option value="Karya Sastra">Karya Sastra</option>
                  <option value="Ilmu Komputer">Ilmu Komputer</option>
                  <option value="Matematika">Matematika</option>
               </select>
            </td>
         </tr>
         <tr>
            <td class="label-formulir">Pengarang</td>
            <td class="isian-formulir">
               <input type="text" name="pengarang" id="" value="<?= $r_tampil_buku['pengarang']; ?>" class="isian-formulir isian-formulir-border">
            </td>
         </tr>
         <tr>
            <td class="label-formulir">Penerbit</td>
            <td class="isian-formulir">
               <input type="text" name="penerbit" id="" value="<?= $r_tampil_buku['penerbit']; ?>" class="isian-formulir isian-formulir-border">
            </td>
         </tr>
         <tr>
            <td class="label-formulir"></td>
            <td class="isian-formulir"><input type="submit" value="Simpan" name="simpan" id="tombol-simpan"></td>
         </tr>
      </table>
   </form>
</div>