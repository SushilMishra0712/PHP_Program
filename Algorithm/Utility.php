<?php
class Utility{

    //function to bubblesort integers
    static function bubblesort_int($n){
        $array=array();
        //input from user
        for($i=0;$i<$n;$i++){
            fscanf(STDIN,"%d",$array[$i]);
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
        echo "Sorted Integers:\n";
        //print elements of sorted array
        for($i=0;$i<$n;$i++){
            echo $array[$i]."\n";
        }
    }

    //function to bubblesort strings
    static function bubblesort_string($n){
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

    //function to insertion sort int
    static function insertionsort_int($arr,$n){
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

    //
    static function insertionsort_string($arr,$n){
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

    //function for binary search integers
    static function binarysearch_int($array,$n){
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

    //function for binary search strings
    function binarysearch_string($array,$n){
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