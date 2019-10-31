<?php
session_start();
class login_validate
{
    function validate()
    {
        if(isset($_POST['submit']))
        {
            $email=$_POST['email'];
            $password=$_POST['password'];
            if (isset($_POST['email'])) 
            { 
                if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) === false) 
                { 
                    $db=new PDO("mysql:host=localhost;dbname=test","root",null);
                    
                    $query=$db->query('SELECT * FROM Userlogin');
                    echo "<pre>";
                    $flag="false";
                    while($row=$query->fetch(PDO::FETCH_ASSOC))
                    {
                        if($row['email']== $email && $row['password']==$password)
                        {
                            $flag="true";
                            $name=$row['firstname'];
                            $_SESSION['email']=$email;
                            $_SESSION['user']=$row['firstname']." ".$row['lastname'];
                            $_SESSION['log']='1';
                        }
                    }
                    if($flag=="false")
                    {
                        echo "<script>window.alert('Email and password does not match');window.location.href='../Frontend/login.php';</script><br>";
                    }
                    else if($flag=="true")
                    {
                        header("Location:../Frontend/home.php");
                    }
                }
                else
                {
                    echo "<script>window.alert('Email is not a valid email address');window.location.href='../Frontend/login.php';</script><br>";
                }
            }
           
        }
        else
        {
            echo "Form does not submitted<br>";
        }
    }
}
$object_login_validate=new login_validate;
$object_login_validate->validate();

?>




