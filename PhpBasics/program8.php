<?php
//PHP Functions
//Create a user defined function in php
function writeMsg(){
    echo "Hello World!"."\n";
}
writeMsg();
//Php function Arguments
//Information can be passed to functions through arguments
function familyName($fname){
    echo "$fname Brown"."\n";
}
familyName("Jani");
familyName("Hege");
familyName("Stale");
familyName("Kai Jim");
//The following example has a function with two arguments
function familyNameYear($fname,$year){
    echo "$fname Brown. Born in $year"."\n";
}
familyNameYear("Hege","1975");
familyNameYear("Stale","1978");
familyNameYear("Kai Jim","1983");
//PHP Default Arguments Value
function setHeight($minheight=50){
    echo "The height is: $minheight"."\n";
}
setHeight(350);
setHeight();   //will use the default value 50
setHeight(135);
setHeight(80);
//PHP functions- Returning Values
//To let a function return a value,use return statement
function sum($x,$y){
    $z=$x+$y;
    return $z;
}
echo "5+10=".sum(5,10)."\n";
echo "7+13=".sum(7,13)."\n";
echo "2+4=".sum(2,4)."\n";

function subtract($x,$y){
    $z=$x-$y;
    return $z;
}
echo "45-22=".subtract(45,22)."\n";
echo "50-10=".subtract(50,10)."\n";
echo "34-12=".subtract(34,12)."\n";
?>