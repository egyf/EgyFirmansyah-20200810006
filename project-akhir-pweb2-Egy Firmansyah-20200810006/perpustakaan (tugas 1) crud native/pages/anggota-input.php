<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah Data Anggota</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <div id="label-page">
      <h3>Input Data Anggota</h3>
   </div>
   <div id="content">
      <form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">
         <table id="tabel-input">
            <tr>
               <td class="label-formulir">foto</td>
               <td class="isian-formulir"><input type="file" name="foto" id="" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
               <td class="label-formulir">Id Anggota</td>
               <td class="isian-formulir"><input type="text" name="id_anggota" id="" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
               <td class="label-formulir">Nama</td>
               <td class="isian-formulir"><input type="text" name="nama" id="" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
               <td class="label-formulir">Jenis Kelamin</td>
               <td class="isian-formulir">
                  <input type="radio" name="jenis_kelamin" value="Pria"> Pria
               </td>
            </tr>
            <tr>
               <td class="label-formulir"></td>
               <td class="isian-formulir">
                  <input type="radio" name="jenis_kelamin" value="Wanita"> Wanita
               </td>
            </tr>
            <tr>
               <td class="label-formulir">Alamat</td>
               <td class="isian-formulir"><textarea name="alamat" id="" cols="40" rows="2" class="isian-formulir isian-formulir-border"></textarea></td>
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