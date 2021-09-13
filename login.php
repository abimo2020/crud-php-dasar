<?php
    session_start();
    require 'fungsi.php';

    if(isset($_COOKIE['id'])&&isset($_COOKIE['user'])){
        $id = $_COOKIE['id'];
        $user = $_COOKIE['user'];
        $result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
        $data = mysqli_fetch_assoc($result);

        if($user == hash('sha256',$data['username'])){
            $_SESSION['login'] = 1;
            exit;
        }
    }

    if(isset($_SESSION['login'])){
        header('Location: index.php');
    }
    
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($conn,"SELECT * FROM user WHERE username ='$username'");

        if(mysqli_num_rows($result)>0){
            $data = mysqli_fetch_assoc($result);
            if(password_verify($password,$data['password'])){
                $_SESSION['login'] = 1;
                if($_POST['remember']){
                    setcookie('id',$data['id'],time()+60*60*24*30);
                    setcookie('user',hash('sha256',$username),time()+60*60*24*30);
                }
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
                <label for="remember">Remember me!</label>
                <input type="checkbox" name="remember" id="remember">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>