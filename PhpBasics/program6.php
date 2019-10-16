<?php
//PHP Conditional Statements
//Php-The if statement
$t=date("H");
if($t<"20"){
    echo "Have a good day!"."\n";
}
//Php-The if-else statement
$x=date("H");
if($x>"20"){
    echo "Have a good day!"."\n";
}
else{
    echo "Have a good night!"."\n";
}
//Php-The if-elseif-else statement
$y=date("H");
if($y<"10"){
    echo "Have a good morning"."\n";
}
elseif($y<"20"){
    echo "Have a good day!"."\n";
}
else{
    echo "Have a good night!"."\n";
}
//Php Switch Statement
$favcolor="blue";
switch($favcolor){
    case "red":
    echo "Your favorite color is red!"."\n";
    break;
    case "blue":
    echo "Your favorite color is blue!"."\n";
    break;
    case "green":
    echo "Your favorite color is green!"."\n";
    break;
    default:
    echo "Your favorite color is neither red, blue nor green"."\n";
}
?>