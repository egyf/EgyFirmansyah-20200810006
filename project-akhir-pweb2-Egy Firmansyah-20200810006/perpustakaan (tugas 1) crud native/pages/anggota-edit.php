<?php
$id_anggota = $_GET['id'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);
if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-')) {
   $foto = "admin-no-photo.jpg";
} else {
   $foto = $r_tampil_anggota['foto'];
}
?>

<div id="label-page">
   <h3>Edit Data Anggota</h3>
</div>
<div id="content">
   <form action="proses/anggota-edit-proses.php" method="POST" enctype="multipart/form-data">
      <table id="tabel-input">
         <tr>
            <td class="label-formulir">Foto</td>
            <td class="isian-formulir">
               <img src="images/<?= $foto; ?>" alt="" width="70px" height="75px">
               <input type="file" name="foto" class="isian-formulir isian isian-formulir-border">
               <input type="hidden" name="foto_awal" value="<?= $r_tampil_anggota['foto']; ?>">
            </td>
         </tr>
         <tr>
            <td class="label-formulir">Id Anggota</td>
            <td class="isian-formulir"><input type="text" name="id_anggota" value="<?= $r_tampil_anggota['idanggota']; ?>" readonly class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
         </tr>
         <tr>
            <td class="label-formulir">Nama</td>
            <td class="isian-formulir">
               <input type="text" name="nama" id="" value="<?= $r_tampil_anggota['nama']; ?>" class="isian-formulir isian-formulir-border">
            </td>
         </tr>
         <tr>
            <td class="label-formulir">Jenis Kelamin</td>
            <?php
            if ($r_tampil_anggota['jeniskelamin'] == "Pria") {
               echo "
               <td class='isian-formulir'> <input type='radio' name='jenis_kelamin' value='Pria' checked> Pria </td>
               </tr>
               <tr>
               <td class='label-formulir'></td>
               <td class='isian-formulir'> <input type='radio' name='jenis_kelamin' value='Wanita'> Wanita </td> 
               </tr>";
            } else if ($r_tampil_anggota['jeniskelamin'] == "Wanita") {
               echo "
               <td class='isian-formulir'> <input type='radio' name='jenis_kelamin' value='Pria' > Pria </td>
               </tr>
               <tr>
               <td class='label-formulir'></td>
               <td class='isian-formulir'> <input type='radio' name='jenis_kelamin' value='Wanita' checked> Wanita</td> 
               </tr>";
            }
            ?>
            <!-- <input type="text" name="jenis_kelamin" value="<?= $r_tampil_anggota['jeniskelamin']; ?>" class="isian-formulir isian-formulir-border">
            </tr> -->
         <tr>
            <td class="label-formulir">Alamat</td>
            <td class="isian-formulir">
               <textarea name="alamat" id="" cols="40" rows="2" class="form-formulir isian-formulir-border"><?= $r_tampil_anggota['alamat']; ?></textarea>
            </td>
         </tr>
         <tr>
            <td class="label-formulir"></td>
            <td class="isian-formulir"><input type="submit" value="Simpan" name="simpan" id="tombol-simpan"></td>
         </tr>
      </table>
   </form>
</div>