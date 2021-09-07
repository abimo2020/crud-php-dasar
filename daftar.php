<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: login.php');
        exit;
    }
    require 'fungsi.php';
    global $conn;
    if(isset($_POST['submit'])){
        if(daftar($_POST)>0){
            echo "<script>alert('Akun anda berhasil didaftarkan');document.location.href='index.php';</script>";
        }else{
            // echo "<script>alert('Akun anda gagal didaftarkan');</script>";
            mysqli_error($conn);
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
    <h1>Daftar Akun</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="username">Username&nbsp; : </label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password &nbsp;&nbsp;&nbsp;: </label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Confirm Password&nbsp;: </label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>
</html>