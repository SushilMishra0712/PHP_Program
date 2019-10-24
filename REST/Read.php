<html>
    <head>
        <style>
            td{
                padding: 5px 20px;
            }
        </style>
        <title>Fetch data</title>
    </head>
    <body>
        <?php
            if(isset($_POST['fetch']))
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
        ?>
    </body>
</html>