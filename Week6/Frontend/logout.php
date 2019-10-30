<?php
    session_start();
        $_SESSION['email']=null;
        $_SESSION['user']=null;
        $_SESSION['log']= '0';
    session_destroy();
    header("Location:login.php");
?>