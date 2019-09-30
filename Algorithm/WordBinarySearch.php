<?php
/*Read in a list of words from File. Then prompt the user 
to enter a word to search the list*/

require 'Utility.php'; //include file
$string='';
$fp = fopen('word.txt', "r"); //open file in read mode    
$string= fread($fp,filesize('word.txt')); //concate charecter in the file at the string 
echo $string;
echo "\n";
$arr = explode(" ", $string);
print_r($arr);
//add charecter in array until white space ant make string of charecter
echo"enter word for search\n";
fscanf(STDIN,"%s\n",$search);
$find=Utility::binarysearch_string($arr,$search); //call function from utility file
if($find)
    echo "$search word is present\n";
else 
    echo "$search is not present in list\n";
?>
