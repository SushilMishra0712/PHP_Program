<?php
//PHP program to print all permutations of a given string.
class StringPermutation{
    //function to find permutation
    function permute($str, $l, $r) 
    {   //if string has only 1 character
        if ($l == $r) 
        {
            echo $str. "\n";
        }     
        //else swap the characters
        else
        {   //for loop to traverse from left to right character
            for ($i = $l; $i <= $r; $i++) 
            { 
                $str = StringPermutation::swap($str, $l, $i); 
                //function calls itself
                StringPermutation::permute($str, $l + 1, $r); 
                $str = StringPermutation::swap($str, $l, $i); 
            } 
        } 
    } 
    //function to swap characters
    function swap($a, $i, $j) 
    { 
        $temp; 
        //convert string into an array
        $charArray = str_split($a); 
        $temp = $charArray[$i] ; 
        $charArray[$i] = $charArray[$j]; 
        $charArray[$j] = $temp; 
        //convert back array into an string
        return implode($charArray); 
    } 
}   
//create object of class StringPermutation
$obj=new StringPermutation;
echo "Enter String:\n";
fscanf(STDIN,"%s",$str);
//find length of the string
$n=strlen($str);
echo "Permutation of $str:\n";
//call the function permute
$obj->permute($str, 0, $n - 1); 
?>