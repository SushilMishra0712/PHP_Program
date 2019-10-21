<html>
<head>
<title>User Details</title>
</head>
<body>

<?php //form to insert data ?>
<form action="insert.php" method="POST">
<h3>Fill details to insert</h3>
Firstname:&nbsp;<input type="text" name="firstname"><br/><br/>
Lastname:&nbsp;<input type="text" name="lastname"><br/><br/>
Age&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="age"><br/><br/>
<input type="submit" name="submit"><br/><br/><br/>
</form>

<?php //form to delete data ?>
<form action="delete.php" method="POST">
<h3>Enter Id to delete user</h3> 
<input type="text" name="id"><br/><br/>
<input type="submit" name="delete" value="Delete"><br/><br/>
</form>

<?php //form to fetch data ?>
<form action="fetch.php" method="POST">
<h3>Enter table name to fetch data</h3>
Tablename<input type="text" name="table"><br/><br/>
<input type="submit" name="fetch" value="Fetch"><br/><br/>
</form>

<?php //form to update data ?>
<form action="update.php" method="POST">
<h3>Enter Id to update data</h3>
Id:&nbsp;<input type="text" name="id"><br/><br/>
<h4>Enter updated details</h4>
Firstname:&nbsp;<input type="text" name="firstname"><br/><br/>
Lastname:&nbsp;<input type="text" name="lastname"><br/><br/>
Age&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="age"><br/><br/> 
<input type="submit" name="update" value="Update"><br/><br/>
</form>

</body>
</html>