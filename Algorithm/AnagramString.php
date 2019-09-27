<?php
//Program to detect Two Strings are Anagram or not...
class AnagramString{
    //function to check two strings anagram or not
    function anagram($str1,$str2){
        //if length of strings are not equal
        if(strlen($str1)!=strlen($str2)){
            echo "Strings are not Anagram\n";
        }
        //if length of strings are equal
        else{
            //convert strings into an array
            $str_1=str_split($str1);
            $str_2=str_split($str2);  
            //sort both the strings      
            sort($str_1);
            sort($str_2);
            //convert back into string
            $new_str1=implode($str_1);
            $new_str2=implode($str_2);
            //now if both strings are equal
            if($new_str1==$new_str2){
                echo "Strings are Anagram to each other\n";
            }
            //if strings not equal
            else{
                echo "Strings are not an Anagram\n";
            }
        }
    }
}
//create object of class AnagramString
$obj=new AnagramString;
echo "Enter first string:\n";
fscanf(STDIN,"%s",$str1);
echo "Enter second string:\n";
fscanf(STDIN,"%s",$str2);
//call function anagram
$obj->anagram($str1,$str2);
?>