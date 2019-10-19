<style>
td{
    padding: 5px 20px;
}
</style>

<?php
// $db=new PDO("mysql:host=localhost;dbname=test","root",null);
// echo "Connection done";

//connecting database 
$servername="localhost";
$username="root";
$password=null;
try{
$db=new PDO("mysql:host=$servername;dbname=test",$username,$password);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo "Connetion sucessfull";
}
catch(PDOException $e){
    echo "Connection failed";
}

//select query
$query=$db->query('SELECT * FROM user');
echo '<pre>';
// while($row=$query->fetch()){
//     print_r($row);
// }

//fetch types
//numeric as well as associative type
// while($rows=$query->fetch(PDO::FETCH_BOTH)){
//     print_r($rows);
// }

//numeric type
// while($row=$query->fetch(PDO::FETCH_NUM)){
//     print_r($row);
// }

echo "<table>";
echo "<tr>
<th>Id</th>
<th>FirstName</th>
<th>LastName</th>
<th>Age</th>
</tr>";
//associative type
while($row=$query->fetch(PDO::FETCH_ASSOC)){
    //print_r($row);
    echo "<tr><td>".$row['Id']."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['age']."</td></tr>";
}

echo "</table>";
// $row=$query->fetch(PDO::FETCH_ASSOC);
// print_r($row);


//fetch all
// $row=$query->fetchAll();
// print_r($row);

//Insert
// $query=$db->query("INSERT INTO user(Id,firstname,lastname,age) VALUES('15','sonal','yadav','27')");
// $query=$db->query("INSERT INTO user(Id,firstname,lastname,age) VALUES('11','amar','patel','17')");
// $query=$db->query("INSERT INTO user(Id,firstname,lastname,age) VALUES('12','puash','singh','29')");
// $query=$db->query("INSERT INTO user(Id,firstname,lastname,age) VALUES('13','nitesh','patil','19')");
// $query=$db->query("INSERT INTO user(Id,firstname,lastname,age) VALUES('14','bablu','gupta','21')");
// $query=$db->query("INSERT INTO user(Id,firstname,lastname,age) VALUES('40','himan','kadam','25')");
// $query=$db->query("INSERT INTO user(firstname,lastname,age) VALUES('rishabh','salian','22')");

//Update
// $query=$db->query("UPDATE user set firstname='rollins' where lastname='ghod' ");
// $query=$db->query("UPDATE user set age='26' where firstname='lalit' ");

//Delete
// $query=$db->query("DELETE FROM user where lastname='patel' ");
// $query=$db->query("DELETE FROM user where Id='12' ");

//To get the id of last insert
// echo $db->lastInsertId();

//prepared statements
//first way to do is..
// $statement=$db->prepare("INSERT INTO user(firstname,lastname,age) VALUES(:first,:last,:age)");
// $statement->execute([
//     ':first'=>'sumit',
//     ':last'=>'mollan',
//     ':age'=>'50',
// ]);

//second way to do is..
// $statement=$db->prepare("INSERT INTO user(firstname,lastname,age) VALUES(?,?,?)");
// $statement->execute([
//     'lalit2','powar','33'
// ]);

?>


