<?php
session_start();
$_SESSION['Name']='mark';
$_SESSION['Age']=23;
$_SESSION['Weight']=60;
echo "Session is set";
?>