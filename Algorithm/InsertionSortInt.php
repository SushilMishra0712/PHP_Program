<?php
//integer sort for integer
class InsertionSortInt{
    //function for insertion sort
    function insertion($arr,$n){
        for($i=1;$i<$n;$i++) 
        { 
            $key=$arr[$i]; 
            $j=$i-1; 
            // Move elements of arr[0..i-1], 
            // that are    greater than key, to  
            // one position ahead of their  
            // current position 
            while($j>=0 && $arr[$j]>$key) 
            { 
                $arr[$j+1]=$arr[$j]; 
                $j=$j-1; 
            } 
            $arr[$j+1]=$key; 
        } 
        //print sorted integers
        echo "Sorted Integers are:\n";
        for($i=0;$i<$n;$i++){
            echo $arr[$i]." \n";
        }
    }
}
//create object of class InsertionSortInt
$obj=new InsertionSortInt;
echo "Insertion Sort\n";
echo "How many numbers you want to enter\n";
fscanf(STDIN,"%d",$n);
echo "Enter ".$n." numbers\n";
$arr=array();
//user inputs $n numbers
for($i=0;$i<$n;$i++){
    fscanf(STDIN,"%d",$arr[$i]);
} 
//call function insertion
$obj->insertion($arr,$n);
?>