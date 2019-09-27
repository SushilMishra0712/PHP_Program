<?php
/*Write a Stopwatch Program for measuring the time that 
elapses between the start and end clicks*/

class StopWatch{
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
//create object of class StopWatch
$obj=new StopWatch;
echo "Press 1 and enter to start:\n";
fscanf(STDIN,"%d");
//after user press enter call function startTime
$obj->startTime();
echo "\n\nPress 1 and enter to stop:\n";
fscanf(STDIN,"%d");
//after user press enter call function stopTime
$obj->stopTime();
//call function elapsedTime 
$obj->elapsedTime();
?>