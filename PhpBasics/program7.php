<?php
//PHP Loops
//Php while loop
$x=1;
echo "while loop:"."\n";
while($x<=5){
    echo "The number is: $x"."\n";
    $x++;
}
//Php do-while loop
$y=10;
echo "do-while loop:"."\n";
do{
    echo "The number is: $y"."\n";
    $y++;
}while($y<=15);
echo "for loop:"."\n";
for($x=0;$x<=10;$x++){
    echo "The number is: $x"."\n";
}
echo "for-each loop:"."\n";
$color=array("red","green","blue","yellow");
foreach($color as $value){
    echo "$value"."\n";
}
?>