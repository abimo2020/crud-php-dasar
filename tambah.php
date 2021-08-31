<?php
    require 'fungsi.php';
    if(isset($_POST['submit'])){
        if(tambahData($_POST)>0){
            echo "<script>alert('Data berhasil ditambahkan')</script>";
        }else{
            echo "<script>alert('Data gagal ditambahkan')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama&nbsp; : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nim">NIM &nbsp;&nbsp;&nbsp;: </label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="jurusan">Jurusan &nbsp;: </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="foto">Foto</label><br>
                <input type="file" name="foto">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>
</html>