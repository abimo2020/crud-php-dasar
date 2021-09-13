<?php
    session_start();
    $_SESSION['login'] ='';
    session_unset();
    session_destroy();
    setcookie('id','',time()-60*10000000);
    setcookie('user','',time()-60*10000000);
    header('Location: login.php');
?>