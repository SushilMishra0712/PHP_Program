<?php
session_start();

class registration_validate
{
    public function create_table_if_notexist()
    {
        $db=new PDO("mysql:host=localhost;dbname=test","root",null);
        $sql="CREATE TABLE IF NOT EXISTS Userlogin(
            id INT AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR (30) NOT NULL,
            lastname VARCHAR (30) NOT NULL,
            email VARCHAR (30) NOT NULL,
            password VARCHAR (30) NOT NULL,
            age INT (30) NOT NULL,
            address VARCHAR (100) NOT NULL,
            phonenumber INT (50) NOT NULL,
        )";
        $db->exec($sql);
    }

    public function validate()
    {
        if(isset($_POST['submit']))
        {
            if (isset($_POST['email'])) 
            { 
                if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) === false) 
                { 
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $age=$_POST['age'];
                    $address=$_POST['address'];
                    $phone_number=$_POST['phone_number'];

                    $db=new PDO("mysql:host=localhost;dbname=test","root",null); 
                    $query=$db->query('SELECT * FROM Userlogin');
                    echo "<pre>";
                    $flag="false";
                    while($row=$query->fetch(PDO::FETCH_ASSOC))
                    {
                        if($row['email']==$email)
                        {
                            $flag="true";
                        }
                    }
                    if($flag=="true")
                    {
                        echo "<script>window.alert('Account already exists in database please log in with another email.');window.location.href='../Frontend/registration.html';</script><br>";
                    }
                    else if($firstname!=null && $lastname!=null && $email!=null && $password!=null && $age!=null && $address!=null && $phone_number!=null)
                    {
                        $query=$db->query("INSERT INTO `Userlogin`(`firstname`, `lastname`,`email`,`password`, `age`,`address`,`phone_number`) 
                        VALUES('$firstname','$lastname','$email','$password','$age','$address','$phone_number')");
                        echo "<script>window.alert('Account Created Successfully!');window.location.href='../Frontend/login.html';</script><br>";
                    }
                    else
                    {
                        echo "Please insert all the details<br>";
                    }
                }
                else
                {
                    echo "<script>window.alert('Email is not a valid email address');window.location.href='../Frontend/registration.html';</script><br>";
                }
            }
        }
        else
        {
            echo "Form not submitted<br>";
        }
    }
}
$object_registration_validate=new registration_validate;
$object_registration_validate->create_table_if_notexist();
$object_registration_validate->validate();

?>


