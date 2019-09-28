<?php
class BubbleSortString{
    //function for bubblesort
    function bubblesort($n){
        $array=array();
        //input from user
        for($i=0;$i<$n;$i++){
            fscanf(STDIN,"%s",$array[$i]);
        }
        for($i=0;$i<count($array);$i++){
            for($j=0;$j<$n-$i-1;$j++){
                if($array[$j]>$array[$j+1]){
                //swap numbers
                $temp=$array[$j];
                $array[$j]=$array[$j+1];
                $array[$j+1]=$temp;
                }
            }
        }
        echo "Sorted Strings:\n";
        //print elements of sorted array
        for($i=0;$i<$n;$i++){
            echo $array[$i]."\n";
        }
    }
}
//create object of class BubbleSortInt
$obj=new BubbleSortString;
echo "How many strings you want to enter\n";
fscanf(STDIN,"%d",$num);
echo "Enter ".$num." strings\n";
//call function bubblesort
$obj->bubblesort($num);
?>