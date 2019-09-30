<?php
/*Input Number N and then recursively ask true/false 
if the number is between a high and low value*/

class Question{
    //function to search guessed number
   function search_number($low,$high){
        $ress = $high-$low;
        //if difference becomes 1 we found the number
        if($ress == 1)
        {
            echo "Result is ".$low."\n";
            return $low;
        }
        //to find middle element
        $mid = $low+ ceil(($high - $low)/2);
        
        echo "If number is less than ".$mid." enter 1 else 0\n";

        fscanf(STDIN,"%d",$choice);
        //if less than mid $mid becomes $high
        if($choice == 1)
        {
           Question::search_number($low,$mid);
        }
        //if greater than mid $mid becomes $low
        else
        {
           Question::search_number($mid,$high);
        }
        
   }
}
//create object of class Question
$obj=new Question;
echo "Enter N\n";
fscanf(STDIN,"%d",$n);
$N = pow(2,$n);
echo "Think any number between 0 to ".($N-1)."\n";
//call the function search number
$result=$obj->search_number(0,$N-1);
?>