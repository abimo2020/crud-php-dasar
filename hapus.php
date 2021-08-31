<?php
    require 'fungsi.php';
    $id = $_GET['id'];
    query("DELETE FROM mahasiswa WHERE id =$id");
    if(mysqli_affected_rows($conn)>0){
        echo "<script>alert('Data berhasil dihapus!');document.location.href='index.php';</script>";
    }else{
        echo "<script>alert('Data gagal dihapus!');document.location.href='index.php';</script>";
    };
    
?>