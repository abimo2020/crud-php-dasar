<?php
    $conn = mysqli_connect("localhost","root","","crud");

    function query($query){
        global $conn;
        mysqli_query($conn,$query);
    }
    function ambilData($query){
        global $conn;

        $result = mysqli_query($conn,$query);
        $rows =[];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function upload(){
        $namaFile = $_FILES['foto']['name'];
        $error = $_FILES['foto']['error'];
        $ukuranFile = $_FILES['foto']['size'];
        $tmpName = $_FILES['foto']['tmp_name'];

        if($error === 4){
            echo "<script>alert('Upload foto terlebih dahulu!')</script>";
            return 0;
        }
        if($ukuranFile >2000000){
            echo "<script>alert('Ukuran foto harus kurang dari 2mb')</script>";
            return 0;
        }

        $ekstensiFileValid = ['jpg','jpeg','png'];
        $ekstensiFile = explode('.',$namaFile);
        $ekstensiFile = strtolower(end($ekstensiFile));

        if(!in_array($ekstensiFile,$ekstensiFileValid)){
            echo "<script>alert('Foto harus berupa gambar(jpg, jpeg, png)!')</script>";
            return 0;
        }
        
        $namaFileBaru = uniqid().'.'.$ekstensiFile;
        move_uploaded_file($tmpName,"foto/".$namaFileBaru);

        return $namaFileBaru;
    }

    function tambahData($data){
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $foto = upload();
        if(!$foto){
            return 0;
        }
        query("INSERT INTO mahasiswa VALUES('','$nama','$nim','$jurusan','$foto')");
        return mysqli_affected_rows($conn);
    }
?>