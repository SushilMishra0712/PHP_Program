<?php
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $age=$_POST['age'];
    $db=new PDO("mysql:host=localhost;dbname=test","root",null);
    // echo "Connected with database test<br/>";
    $query=$db->query("INSERT INTO `user`(`firstname`, `lastname`, `age`) VALUES('$firstname','$lastname','$age')");
    echo "Data inserted successfully<br/>";
}
else
{
    echo "Form not submitted<br/>";
}
?>