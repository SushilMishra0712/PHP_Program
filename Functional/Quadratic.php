<?php
// find the roots of the equation a*x*x + b*x + c.
class Quadratic{
    //function to find roots of quadratic equation
    function roots($a,$b,$c){
        //formula to calculate delta value
        $delta=abs(pow($b,2)-4*$a*$c);
        $root1=(-$b+pow($delta,1/2))/2*$a;
        $root2=(-$b-pow($delta,1/2))/2*$a;
        //print two roots of quadratic equation
        echo "Root 1:".$root1."\n";
        echo "Root 2:".$root2."\n";
    }
}
//create object of class Quadratic
$obj=new Quadratic;
echo "Enter a:\n";
fscanf(STDIN,"%d",$a);
echo "Enter b:\n";
fscanf(STDIN,"%d",$b);
echo "Enter c:\n";
fscanf(STDIN,"%d",$c);
//call the function roots
$obj->roots($a,$b,$c);
?>