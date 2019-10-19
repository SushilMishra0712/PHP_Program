<html>
<head>
<title>Validation Destination</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    if(strlen($name<"6")){
        echo "Username too short!";
    }
    else if(!is_numeric($age)){
        echo "Only digits are allowed!";
    }
    else if(empty($email)){
        echo "Please provide email address!";
    }
    else{
        echo "You logged in Successfully";
    }
}
else{
    echo "Form was not submitted";
}
?>
</body>
</html>