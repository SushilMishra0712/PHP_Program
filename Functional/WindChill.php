<?php
/*Write a program that takes two double command-line arguments t 
and v and prints the wind chill. Use Math.pow(a, b) to compute ab.*/ 
class WindChill{
    //function to find effective temperature
    function wind($t,$v){
        //if temperature is greater then 50
        if($t>50){
            echo "Temperature cannot be greater than 50\n";
            //again take input from user for $t
            fscanf(STDIN,"%f",$t);
            $this->wind($t,$v);
        }
        //if wind speed is greater than 120 or less than 3
        else if($v>120 || $v<3){
            echo "Wind speed cannot be greater than 120 or less than 3\n";
            //again take input from user for $v
            fscanf(STDIN,"%f",$v);
            $this->wind($t,$v);
        }
        //if $t and $v are in range then find effective temperature
        else{
            //formula given to find effective temperature $w
            $w=35.74+0.6215*$t+(0.4275*$t-35.75)*pow($v,0.16);
            //print $w upto 4 decimals
            echo "Effective temperature is:".round($w,4)."\n";
        }
    }
}
//create object of class WindChill
$obj=new WindChill;
echo "Enter temperature (in fahrenheit):\n";
fscanf(STDIN,"%f",$t);
echo "Enter Wind speed (in miles per hour):\n";
fscanf(STDIN,"%f",$v);
//call function wind($t,$v)
$obj->wind($t,$v);
?>