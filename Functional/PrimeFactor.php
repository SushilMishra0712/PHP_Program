<?php
// Print the prime factors of number N.
class PrimeFactor{
    //function to find primefactor
    function Factor($n){
        while($n%2==0){
            echo "2 \n";
            $n=$n/2;
        }
        for($i=3;$i<=sqrt($n);$i=$i+2){
            while($n%$i==0){
                echo "$i \n";
                $n=$n/$i;
            }
        }
        if($n>2){
            echo "$n\n";
        }
    }
}
//Create object of PrimeFactor class
$obj=new PrimeFactor;
echo "Enter Number:\n";
//Scan user entered input number
fscanf(STDIN,"%d",$n);
echo "Prime factors of number ".$n."\n";
//Call the function Factor of the class
$obj->Factor($n);
?>