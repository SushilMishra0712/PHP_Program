<?php
/*compute the square root of a nonnegative number
c given in the input using Newton's method*/

class NewtonMethod{
    //function to find the square root of non-negative
    static function sqroot($c)
    {   // relative error tolerance
        $epsilon = 1e-15; 
        // initialize $c with $t
        $t = $c;     
        //repeat until desired accuracy reached
        while (abs($t - $c/$t) > $epsilon*$t)
        {   //replace t with the average of c/t and t
            $t = ($c/$t + $t) / 2.0;
        }
        //prints square root of $c
        echo "Square root of ".$c." is:\n".round($t,2)."\n";
    }
}
//create object of class NewtonMethod
$obj=new NewtonMethod;
echo "Enter non-negative number:\n";
fscanf(STDIN,"%d",$c);
//call the function sqroot
$obj->sqroot($c);
?>