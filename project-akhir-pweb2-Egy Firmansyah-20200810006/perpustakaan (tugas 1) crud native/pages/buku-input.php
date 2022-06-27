<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah Data Buku</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <div id="label-page">
      <h3>Input Data Buku</h3>
   </div>
   <div id="content">
      <form action="proses/buku-input-proses.php" method="post">
         <table id="tabel-input">
            <tr>
               <td class="label-formulir">ID Buku</td>
               <td class="isian-formulir"><input type="text" name="kd_buku" class="isian-formulir isian-formulir-border" required></td>
            </tr>
            <tr>
               <td class="label-formulir">Judul</td>
               <td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
               <td class="label-formulir">Kategori</td>
               <td class="isian-formulir">
                  <select name="kategori" class="isian-formulir isian-formulir-border">
                     <option value="">Pilih Kategori Buku</option>
                     <option value="Karya Sastra">Karya Sastra</option>
                     <option value="Ilmu Komputer">Ilmu Komputer</option>
                     <option value="Matematika">Matematika</option>
                  </select>
               </td>
            </tr>
            <tr>
               <td class="label-formulir">Penulis</td>
               <td class="isian-formulir"><input type="text" name="pengarang" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
               <td class="label-formulir">Penerbit</td>
               <td class="isian-formulir"><input type="text" name="penerbit" class="isian-formulir isian-formulir-border"></td>
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