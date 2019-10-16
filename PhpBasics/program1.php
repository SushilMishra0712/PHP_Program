<?php
//Global & Local Scope
/* A Variable declared outside a function has a 
GLOBAL scope and can be only accessed outside a function */
$x=5;  //global scope
function myTest(){
    //using x inside this function will generate error
    echo "Variable x inside function is:$x"."\n";
}
myTest();
echo "Variable x outside function is:$x"."\n"."\n";
/*A variable declared within a function has Local scope
& can only be accessed within that function*/
function myTest1(){
    $y=5;    //local scope
    echo "Variable x inside function is:$y"."\n";
}
myTest1();
//Using x outside the function will generate an error
echo "Variable x outside function is:$y"."\n"."\n";
echo "PHP global keyword:"."\n";
$a=20;
$b=30;
function myTest2(){
    global $a,$b;
    $b=$a+$b;
}
myTest2();
echo $b."\n";

?>
