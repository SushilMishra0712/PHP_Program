<?php
//Print the year is a Leap Year or not.
class LeapYear{
    //function to find leap year
    function leap($year){
        //Year should be of 4 digit
        if("1000"<$year && $year<9999){
            //Year is leap if divisible by 400
            if($year%400==0){
                $flag=true;
            }
            //Year is not leap if divisible by 100
            else if($year%100==0){
                $flag=false;
            }
            //Year is leap if divisible by 4
            else if($year%4==0){
                $flag=true;
            }
            //Else year is not leap year
            else{
                $flag=false;
            }
            //If flag is true then leap year
            if($flag==true){
                echo $year." is a leap year"."\n";
            }
            //Else not a leap year
            else{
                echo $year." is not a leap year"."\n";
            }
        }
        //Please Enter 4 digit number 
        else{
            echo "Please Enter 4 digit Number"."\n";
            //Scan for new Input from user
            fscanf(STDIN,"%d",$year);
            //Call again this leap function
            $this->leap($year);
        }
    }
}
//Create object of LeapYear class
$obj=new LeapYear;
echo "Enter Year:"."\n";
//Scan user input and store it in $year variable
fscanf(STDIN,"%d",$year);
//Call the function leap of the class
$obj->leap($year);
?>