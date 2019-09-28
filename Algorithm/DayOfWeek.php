<?php
//User enter date and Outputs day of the week 
class DayOfWeek{
    //function to find day of the week
    function day($d, $m, $y) 
    {   //Gregorian calendar formula 
        $year = floor($y - (14 - $m) / 12)+1;
        $x = floor($year+ $year / 4 - $year / 100 + $year / 400);
        $month = ($m + 12 * floor(((14 / $m) / 12)) - 2);
        $date = floor(($d + $x + floor(31 * $month/ 12)) % 7);  
        //switch case to print the day of week in String
        switch($date){
            case 0:
            echo "Today is Sunday\n";
            break;
            case 1:
            echo "Today is Monday\n";
            break;
            case 2:
            echo "Today is Tuesday\n";
            break;
            case 3:
            echo "Today is Wednesday\n";
            break;
            case 4:
            echo "Today is Thursday\n";
            break;
            case 5:
            echo "Today is Friday\n";
            break;
            case 6:
            echo "Today is Saturday\n";
        }
    } 
}
//create object of class DayOfWeek
$obj=new DayOfWeek;
echo "Enter date number\n";
fscanf(STDIN,"%d",$d);
echo "Enter month in number\n";
fscanf(STDIN,"%d",$m);
echo "Enter year number\n";
fscanf(STDIN,"%d",$y);
//call the function day
$obj->day($d,$m,$y);
?>