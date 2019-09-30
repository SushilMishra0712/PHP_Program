<?php
require "Utility.php";
class StopWatch2{
    //$start and $stop are public so that we can use in all function
    public $start;
    public $stop;
    //constructor 
    function __construct()
    {
        //initialise variables to zero
        $this->start = 0;
        $this->stop = 0;
    }
    //function to get start time
    function startTime(){
        //set timezone of Asia/kolkata
        date_default_timezone_set("Asia/Kolkata");
        //print start time 
        echo "Start time:".date("H:i:s");
        $hour = (int)date("H");
        $min = (int)date("i");
        $sec = (int)date("s");
        //put current time in $start 
        $this->start=($hour*60+$min+$sec/60);

    }
    //function to get stop time
    function stopTime(){
        //set timezone of Asia/kolkata
        date_default_timezone_set("Asia/Kolkata");
        //print stop time
        echo "Stop time:".date("H:i:s");
        $hour = (int)date("H");
        $min = (int)date("i");
        $sec = (int)date("s");
        //put current time in $stop 
        $this->stop=($hour*60+$min+$sec/60);

    }
    //function to get elapsed time
    function elapsedTime(){
        //diffence of stop and start is elapsed time
        $elapsed=($this->stop-$this->start)*60;
        //prints elapsed time in seconds upto 2 decimals
        echo "\n\nElapsed time is:".round($elapsed,2)." seconds\n";
    }
}
//create object of class StopWatch2
$obj=new StopWatch2;

//array of integers
$array=array(23,45,3,4,98,07,5,11,45);
$n=5;
echo "Press Enter for binary search Int\n";
$obj->startTime();
fscanf(STDIN,"%d");
Utility::binarysearch_int($array,$n);
$obj->stopTime();
$obj->elapsedTime();

//array of strings
$array2=array("aaa","bbb","fff","ddd","eee","sss");
$n2="fff";
echo "Press Enter for binary search String\n";
$obj->startTime();
fscanf(STDIN,"%d");
Utility::binarysearch_string($array2,$n2);
$obj->stopTime();
$obj->elapsedTime();

//insertion search for int
echo "Press Enter for insertion search Int\n";
$obj->startTime();
fscanf(STDIN,"%d");
Utility::insertionsort_int($array,$n);
$obj->stopTime();
$obj->elapsedTime();

//insertion search for string
echo "Press Enter for insertion search String\n";
$obj->startTime();
fscanf(STDIN,"%d");
Utility::binarysearch_int($array2,$n2);
$obj->stopTime();
$obj->elapsedTime();

//bubblesort for integer
echo "Press Enter for bubblesort integer\n";
$obj->startTime();
fscanf(STDIN,"%d");
echo "How many integers you want to sort?\n";
fscanf(STDIN,"%d",$num);
Utility::bubblesort_int($num);
$obj->stopTime();
$obj->elapsedTime();

//bubblesort for string
echo "Press Enter for bubblesort string\n";
$obj->startTime();
fscanf(STDIN,"%d");
echo "How many strings you want to sort?\n";
fscanf(STDIN,"%d",$str);
Utility::bubblesort_string($str);
$obj->stopTime();
$obj->elapsedTime();

?>