<?php
//Take a range of 0 - 1000 Numbers and find the Prime numbers in that range.
class PrimeNumber{
    //function to find prime numbers
    function prime($first,$last){
        //for loop from $first to $last number
        for($i=$first;$i<$last;$i++){
            //set initial $isprime true 
            $isprime=true;
            //another for loop to traverse till half of last value
            for($j=2;$j<=$i/2;$j++){
                //condition for not prime
                if($i%$j==0){
                    $isprime=false;
                break;
                }
            }
            //prints prime numbers
            if($isprime==true){
                echo $i."\n";
            }
        }
    }
}
//create object of class PrimeNumber
$obj=new PrimeNumber;
echo "Enter first number:\n";
fscanf(STDIN,"%d",$first);
echo "Enter last number:\n";
fscanf(STDIN,"%d",$last);
echo "Prime number between ".$first." and ".$last." are:\n";
//call function prime 
$obj->prime($first,$last);
?>