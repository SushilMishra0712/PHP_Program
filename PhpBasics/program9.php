<?php
//Arrays-An array stores multiple values in one single variables
//Create an Array in PHP
//The array() function is used to create an Array:
//1)PHP indexed arrays
$cars=array("Volvo","BMW","Toyota");
//count() function is used to return the length of an array
echo count($cars)."\n";
//Loop through an indexed array
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++){
    echo $cars[$x]."\n";
}
//2)PHP associative arrays
$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"45");
//The named keys can than be used in a script
echo "Peter is ".$age['Peter']." years old"."\n";
//Loop through an associative array
/*To loop through and print all the values of an associative array you could use a foreach loop*/
foreach($age as $x=>$x_value){
    echo "key=".$x." value=".$x_value."\n";
}
?>