<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah Transaksi Peminjaman</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <div id="label-page">
      <h3>Input Transaksi Peminjaman</h3>
   </div>
   <div id="content">
      <form action="proses/transaksi-peminjaman-input-proses.php" method="post">
         <table id="tabel-input">
            <tr>
               <td class="label-formulir">Id Transaksi</td>
               <td class="isian-formulir"><input type="text" name="id_transaksi" id="" class="isian-formulir isian-formulir-border" required=""></td>
            </tr>
            <tr>
               <td class="label-formulir">Anggota</td>
               <td class="isian-formulir">
                  <select name="id_anggota" id="" class="isian-formulir isian-formulir-border">
                     <option value="">Pilih Anggota</option>
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
                     <option value="">Pilih Buku</option>
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
                  <input type="date" name="tgl_pinjam" class="isian-formulir isian-formulir-border">
               </td>
            </tr>
            <tr>
               <td class="label-formulir"></td>
               <td class="isian-formulir"><input type="submit" name="simpan" value="simpan" class="tombol"></td>
            </tr>
         </table>
      </form>
   </div>
</body>

</html>