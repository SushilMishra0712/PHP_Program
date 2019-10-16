<?php
//PHP-Sort Functions for Arrays
/* The Elements in an array can be sorted in alphabetical 
or numerical order,descending or ascending.
1)sort()-sort arrays in ascending order
2)rsort()-sort arrays in descending order
3)asort()-sort associative arrays in ascending order according to value
4)ksort()-sort associative arrays in ascending order according to key
5)arsort()-sort associative arrays in descending order,according to value
6)krsort()-sort associative arrays in descending order according to key*/
//sort array in ascending order
$cars=array("Volvo","BMW","Toyota");
sort($cars);
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++){
    echo $cars[$x]."\n";
}
$numbers=array(4,2,5,77,43,1,22,11);
sort($numbers);
$arrlength2=count($numbers);
for($x=0;$x<$arrlength2;$x++){
    echo $numbers[$x]."\n";
}
//sort array in descending order
rsort($cars);
for($x=0;$x<$arrlength;$x++){
    echo $cars[$x]."\n";
}
rsort($numbers);
for($x=0;$x<$arrlength2;$x++){
    echo $numbers[$x]."\n";
}
//sort associative array(Ascending order)
$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");

asort($age);   //According to value
foreach($age as $x=>$x_value){
    echo "key=".$x." value=".$x_value."\n";
}

ksort($age); //According to key
foreach($age as $x=>$x_value){
    echo "key=".$x." value=".$x_value."\n";
}
//sort associative array(Descending order)

arsort($age);    //According to value
foreach($age as $x=>$x_value){
    echo "key=".$x." value=".$x_value."\n";
}

krsort($age);   //According to key
foreach($age as $x=>$x_value){
    echo "key=".$x." value=".$x_value."\n";
}

?>
