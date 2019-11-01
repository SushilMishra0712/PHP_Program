<?php
    session_start();
        $_SESSION['email']=null;
        $_SESSION['user']=null;
        $_SESSION['log']= '0';
    session_destroy();
    echo "<script>window.alert('Logout Successful!');window.location.href='../Frontend/login.php';</script><br>";
?>
