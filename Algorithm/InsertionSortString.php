<?php
//insertion sort for string
class InsertionSortString{
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
        //prints sorted strings
        echo "Sorted Strings are:\n";
        for($i=0;$i<$n;$i++){
            echo $arr[$i]." \n";
        }
    }
}
//create object of class InsertionSortString
$obj=new InsertionSortString;
echo "Insertion Sort\n";
echo "How many strings you want to enter\n";
fscanf(STDIN,"%d",$n);
echo "Enter ".$n." string\n";
$arr=array();
//user inputs $n strings
for($i=0;$i<$n;$i++){
    fscanf(STDIN,"%s",$arr[$i]);
}
//call function insertion
$obj->insertion($arr,$n);
?>