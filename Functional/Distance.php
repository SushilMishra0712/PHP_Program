<?php
/*Takes two integer command-line arguments x and y and prints 
the Euclidean distance from the point (x, y) to the origin (0, 0)*/

class Distance{
    //function for euclidean distance
    function euclid($x,$y){
        //distance formula
        $distance=sqrt(pow($x,2)+pow($y,2));
        //return distance 
        return $distance;
    }
}
//create object of class Distance
$obj=new Distance;
echo "Enter x:\n";
//scan user input for point x
fscanf(STDIN,"%d",$x);
echo "Enter y:\n";
//scan user input for point y
fscanf(STDIN,"%d",$y);
echo "Euclidean distance between point(".$x.",".$y.") and origin(0,0) is:\n";
//prints distance upto 2 decimals using round($var,2).
echo round($obj->euclid($x,$y),2)."\n";
?>