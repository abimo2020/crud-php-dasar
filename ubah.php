<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: login.php');
        exit;
    }
    require 'fungsi.php';
    $id = $_GET['id'];
    $mhs = ambilData("SELECT * FROM mahasiswa WHERE id = $id")[0];
    if(isset($_POST['ubah'])){
        if(ubah($_POST)>0){
            echo "<script>alert('Data berhasil diubah');document.location.href='index.php';</script>";
        }elseif(ubah($_POST)==0){
            echo "<script>alert('Data Tidak Ada Yang Dirubah');document.location.href='index.php';</script>";
        }else{
            echo"<script>alert('Data gagal diubah');document.location.href='index.php';</script>";
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
    <h1>Edit</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fotoLama" value="<?=$mhs['foto']?>">
        <ul>
            <li>
                <label for="nama">Nama&nbsp; : </label>
                <input type="text" name="nama" id="nama" value="<?=$mhs['nama']?>"required>
            </li>
            <li>
                <label for="nim">NIM &nbsp;&nbsp;&nbsp;: </label>
                <input type="text" name="nim" id="nim" value="<?=$mhs['nim']?>" required>
            </li>
            <li>
                <label for="jurusan">Jurusan &nbsp;: </label>
                <input type="text" name="jurusan" id="jurusan" value="<?=$mhs['jurusan']?>"required>
            </li>
            <li>
                <label for="foto">Foto</label><br>
                <br>
                <img src="foto/<?=$mhs['foto']?>" width="50px" alt="">
                <br>
                <input type="file" name="foto">
            </li>
            <li>
                <button type="submit" name="ubah">Submit</button>
            </li>
        </ul>
    </form>
</body>
</html>