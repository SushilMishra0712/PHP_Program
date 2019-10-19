<?php
session_start();
$name=$_SESSION['Name'];
$age=$_SESSION['Age'];
$weight=$_SESSION['Weight'];
echo $name.'<br>';
echo $age.'<br>';
echo $weight.'<br>';
?>