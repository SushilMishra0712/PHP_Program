<?php
include('Util.php');

//find the Prime numbers that are anagrams
class PrimeAnagram{
    //function to find prime numbers
    function primeAnag($first,$last){
        //for loop from $first to $last number
        for($i=$first;$i<$last;$i++){
            //prime number call from util class for $i
            $Prime_responce = Util::prime($i);
            //reverse the number $i
            $rev=strrev($i); 
            //prime number for $rev
            $Rev_responce = Util::prime($rev);
            //if $i and $rev both are prime
            if($Prime_responce == 1 && $Rev_responce==1)
            {   //prints numbers which are prime and anagram
                echo "Number which are prime Anagram :".$i;
                echo "\n";  
            }         
        }
    }
}
//create object of class PrimeAnagram
$obj=new PrimeAnagram;
echo "Enter first number:\n";
fscanf(STDIN,"%d",$first);
echo "Enter last number:\n";
fscanf(STDIN,"%d",$last);
echo "Number which are prime and anagram between ".$first." and ".$last." are:\n";
//call function primeAnag
$obj->primeAnag($first,$last);
?>