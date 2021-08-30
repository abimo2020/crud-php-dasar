<?php
    require 'fungsi.php';

    $mahasiswa = ambilData("SELECT * FROM mahasiswa");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 50px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; font-family:'Times New Roman', Times, serif">Daftar Mahasiswa</h1>
    <a href="">Tambah Data</a> | <a href="">Logout</a>
    <br><br>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php $i= 1;?>
        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$mhs["nama"];?></td>
            <td><?=$mhs["nim"];?></td>
            <td><?=$mhs["jurusan"];?></td>
            <td><img src="<?=$mhs["foto"];?>" alt=""></td>
            <td><a href="">Ubah</a> / <a href="">Hapus</a></td>
        </tr>
        <?php $i++?>
        <?php endforeach;?>
    </table>

</body>
</html>