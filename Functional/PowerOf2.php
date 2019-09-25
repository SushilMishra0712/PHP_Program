<?php
/*This program takes a command-line argument N and 
prints a table of the powers of 2 that are less than or equal to 2^N*/
class PowerOfTwo{
    //function to print the power of 2
    function power($num){
        if(0<=$num && $num<31){
            $i=0;
            $power=1;
            echo "Power of 2 that are less than 2^".$num."\n";
            //prints power of 2 upto $num
            while($i<=$num){
                echo "2^".$i."=".$power."\n";
                //$power multiplies itself by 2 every iteration
                $power=$power*2;
                //$i increments by 1
                $i++;
            }
        }
        //If $num greater than 31 
        else{
            echo "2^".$num." overflows int\n";
        }
    }
}
//Create object of PowerOfTwo class
$obj=new PowerOfTwo;
echo "Enter Power value N between 0 to 31\n";
//Scan user entered input number and store it in $num
fscanf(STDIN,"%d",$num);
//Call the function power of the class
$obj->power($num);
?>