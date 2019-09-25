<?php
/**
 * Simulates a gambler who start with $stake and place fair $1 bets until he/she goes broke 
 * (i.e. has no money) or reach $goal. Keeps track of the number of times he/she wins and 
 * the number of bets he/she makes. Run the experiment N times, averages the results, and 
 * prints them out.
 */

class gambler
{
    //function gamble
    function gamble($stake,$goal,$num){
        //Initially bets and wins are Zero
        $bets=0;
        $wins=0;
        //For loop upto num trails
        for($i=0;$i<$num;$i++){
            $cash=$stake;
            //Cash should be greater than zero but less than goal
            while($cash>0 && $cash<$goal){
                $bets++;
                $r=rand(0,1);
                if($r==0){
                    $cash++;
                }
                else{
                    $cash--;
                }
            }
            //If cash equals goal then wins incremented
            if($cash==$goal){
                $wins++;
            }
        }
        echo "\n".$wins." wins out of ".$num." times\n";
        echo "Percentage of games won:".$wins*100/$num."\n";
        $lost=$num-$wins;
        echo "Percentage of games lost:".$lost*100/$num."\n";
        echo "Total bets:".$bets."\n";
    }
}
//Created object of gambler class
$obj=new gambler;

//Taking input Stake amount
echo "Enter Amount:\n";
fscanf(STDIN,"%d",$stake);
//Stake amount should be positive number
if($stake<=0)
{
    echo "Stake Amount cannot be Zero\n";
    fscanf(STDIN,"%d",$stake);
}
//Taking input Goal amount
echo "Enter Goal Amount:\n";
fscanf(STDIN,"%d",$goal);
//Goal amount should be greater than Stake amount
if($stake>$goal){
    echo "Stake Amount cannot be greater than Goal Amount\n";
    fscanf(STDIN,"%d",$goal);
}
//Taking input for number of trails
echo "Number of times to Gamble:\n";
fscanf(STDIN,"%d",$num);
//Trials should be positive number
if($num<=0){
    echo "Trial should be positive number\n";
    fscanf(STDIN,"%d",$num);
}
//Call function of gambler class
$obj->gamble($stake,$goal,$num);
?>