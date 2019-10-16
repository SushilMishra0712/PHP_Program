<?php
//Php also stores all global variables in an array called $GLOBALS[index].
//The index holds name of variable.
$x=5;
$y=10;
function myTest(){
    $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
}
myTest();
echo $y."\n"."\n";
echo "Php Static keyword"."\n";
echo "Normally when a function is completed/executed,all of it's variables are deleted"."\n";
echo "However sometimes we want a local variable Not to be deleted"."\n";
echo "To do this use Static keyword"."\n";
function myTest1(){
    static $y=0;
    echo $y."\n";
    $y++;
}
myTest1();
myTest1();
myTest1();
echo "\n"."Echo and Print"."\n";
$txt1="Learn Php";
$txt2="W3Schools.com";
$a=5;
$b=4;
echo "Study Php at ".$txt2."!"."\n";
echo $a+$b."\n";
print "Study Java at ".$txt2."!"."\n";
print $a+$b."\n";
?>