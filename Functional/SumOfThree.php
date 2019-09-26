<?php
/*A program with cubic running time. Read in N integers and counts
 the   number of triples that sum to exactly 0.*/

class SumOfThree{
    //function to find triplets of sum zero
    function findTriplets($inputs,$n){
        //initial $found set to false
        $found=false;
        echo "\nTriplets whose sum is zero are:\n";
        for($i=0;$i<$n-2;$i++){
            for($j=$i+1;$j<$n-1;$j++){
                for($k=$j+1;$k<$n;$k++){
                    //sum of 3 elements of array are zero then print elements
                    if($inputs[$i]+$inputs[$j]+$inputs[$k]==0){
                        echo "$inputs[$i],";
                        echo "$inputs[$j],";
                        echo "$inputs[$k] ";
                        //$found set to true
                        $found=true;
                    }
                }
            }
            echo "\n";
        }
        //if does not find any triplet then print not exits
        if($found==false){
            echo "Does Not exits\n";
        }
    }
    //function to scan inputs from user
    function ipArray($n){
        for($i=0;$i<$n;$i++){
            fscanf(STDIN,"%d",$ipArray[$i]);
        }
        //return array $ipArray 
        return $ipArray;
    }
}
//create object of class SumOfThree
$obj=new SumOfThree;
//$arr=array(2,1,-1,-2,3,4,0);
echo "Enter N:\n";
fscanf(STDIN,"%d",$n);
echo "Enter ".$n." integers:\n";
//$n=sizeof($arr);
//put function ipArray into variable $inputs
$inputs =  $obj->ipArray($n);
$obj->findTriplets($inputs,$n);

?>