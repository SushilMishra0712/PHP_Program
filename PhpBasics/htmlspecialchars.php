<html>
<head>
<title>Html Encoding</title>
</head>
</body>
<a href="http://www.google.com">
<?php
$str="<click here>";
echo htmlspecialchars($str);
?> </a>
<?php
$str2="★☂☕";
echo htmlentities($str2);
?>
</body>
</html>