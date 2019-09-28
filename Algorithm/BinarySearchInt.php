<?php
//Binary search for integers
class BinarySearchInt{
    //function for binary search
    function binary($array,$n){
    $high=count($array)-1;   //last index
    $low=0;                  //first index
    sort($array);            //sort before search
    echo "Sorted array:\n";
    print_r($array);
        while($low<=$high){
            $mid=($low+$high)/2;   //middle index
            //if present on middle index
            if($n==$array[$mid]){
                echo $n." is present at index:";
                echo floor($mid)."\n";
                break;
            }
            //if present after the middle
            else if($array[$mid]<$n){
                $low=$mid+1;
            }
            //if present before the middle
            else{
                $high=$mid-1;
            }
        }
    }
}
//create object of class BinarySearchInt
$obj=new BinarySearchInt;
echo "How many numbers you want to enter\n";
fscanf(STDIN,"%d",$num);
$array=array();
echo "Enter ".$num." numbers\n";
//user input $num numbers
for($i=0;$i<$num;$i++){
    fscanf(STDIN,"%d",$array[$i]);
}
echo "Which numbers index you want to find\n";
fscanf(STDIN,"%d",$n);
//call the binary function
$obj->binary($array,$n);
?>