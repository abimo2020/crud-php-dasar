<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: index.php');
        exit;
    }
    require 'fungsi.php';
    global $conn;

    

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($conn,"SELECT * FROM user WHERE username ='$username'");

        if(mysqli_num_rows($result)>0){
            $data = mysqli_fetch_assoc($result);
            if(password_verify($password,$data['password'])){
                $_SESSION['login'] = 1;
                header('Location: index.php');
                exit;
            }
            
        }
        $error = 1;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        p{
            color:red;
            font-style: italic;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if(isset($error)):?>
    <p>Username atau Password salah!</p>
    <?php endif;?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>