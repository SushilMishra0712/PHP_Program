<html>
<head>
<title>Delete data</title>
</head>
<body>
<?php
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $servername = "localhost";
    $username = "root";
    $password = null;
    $dbname = "test";
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // sql to delete a record
        $sql = "DELETE FROM `user` WHERE id='$id'";
    
        // use exec() because no results are returned
        $db->exec($sql);
        echo "Record deleted successfully";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
}
else{
    echo "Form not submitted<br/>";
}
?>
</body>
</html>
