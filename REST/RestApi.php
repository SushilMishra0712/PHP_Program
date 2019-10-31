<?php
    //when user insert new record
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
    //when user deletes record
    else if(isset($_POST['delete']))
    {
        $id=$_POST['id'];
        $servername = "localhost";
        $username = "root";
        $password = null;
        $dbname = "test";
        try 
        {
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
    //when user updates record
    else if(isset($_POST['update']))
    {
        $id=$_POST['id'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $age=$_POST['age'];
        $db=new PDO("mysql:host=localhost;dbname=test","root",null);
        $query=$db->query("UPDATE user set firstname='$firstname',lastname='$lastname',age='$age' where Id='$id' ");
        if($query)
        {
            echo "Data updated sucessfully<br/>";
        }
        else
        {
            echo "Id does not found in table<br/>";
        }
    }
    //when user wants to fetche data
    else if(isset($_POST['fetch']))
    {
        $table=$_POST['table'];
        $db=new PDO("mysql:host=localhost;dbname=test","root",null);
        $query=$db->query("SELECT * FROM $table");
        if($query)
        {
            echo "<pre>";
            echo "<table>";
            echo "<tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Age</th>
            </tr>";
            while($row=$query->fetch(PDO::FETCH_ASSOC))
            {
                // print_r($row);
                echo "<tr><td>".$row['Id']."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['age']."</td></tr>";
            }
            echo "</table>";
        }
        else
        {
            echo $table." table does not exits<br/>";
        }
    }
    //if form not submitted
    else
    {
        echo "Form not submitted<br/>";
    }

?>

