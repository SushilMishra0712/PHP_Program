<html>
<head>
<title>Update data</title>
</head>
<body>
<?php
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $age=$_POST['age'];
    $db=new PDO("mysql:host=localhost;dbname=test","root",null);
    $query=$db->query("UPDATE user set firstname='$firstname',lastname='$lastname',age='$age' where Id='$id' ");
    if($query){
        echo "Data updated sucessfully<br/>";
    }
    else{
        echo "Id does not found in table<br/>";
    }
}
else{
    echo "Form not submitted<br/>";
}
?>
</body>
</html>