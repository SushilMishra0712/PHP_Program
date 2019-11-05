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
                        echo '<h2 style="font-family: Arial, Helvetica, sans-serif;color:red;text-align: center;margin-bottom:-40px;">Email and password does not match</h2>';
                        //echo "<script>window.alert('Email and password does not match');window.location.href='../Frontend/login.html';</script><br>";
                    }
                    else if($flag=="true")
                    {
                        echo "<h2 style='font-family: Arial, Helvetica, sans-serif;color:red;text-align: center;margin-bottom:-40px;'>Hello $name Login Successful!</h2>";
                        // echo json_encode(array('success' => 1));
                        //header("Location:../Frontend/home.html");
                    }
                }
                else
                {
                    echo '<h2 style="font-family: Arial, Helvetica, sans-serif;color:red;text-align: center;">Email is not a valid email address</h2>';
                    //echo "<script>window.alert('Email is not a valid email address');window.location.href='../Frontend/login.html';</script><br>";
                }
            }
           
        }
        else
        {
            echo '<h2 style="font-family: Arial, Helvetica, sans-serif;color:red;text-align: center;">Form does not submitted</h2>';
            //echo "Form does not submitted<br>";
        }
    }
}
$object_login_validate=new login_validate;
$object_login_validate->validate();

?>




