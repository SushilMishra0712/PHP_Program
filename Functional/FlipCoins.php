<?php
// Use Random Function to get value between 0 and 1. If < 0.5 then tails or heads
class FlipCoins{
    //function flipcoin to count heads and tails
    function flipcoin($num){
        //initially $head and $tail is zero
        $head=0;
        $tail=0;
        //number of trails should be positive
        if($num>0){
            //for loop for $num trails
            for($x=0;$x<$num;$x++){
                //random function to give either 0 or 1
                $r=rand(0,1);
                //0 for head outcome
                if($r=="0"){
                    $head++;
                }
                //1 for tail outcome
                else{
                    $tail++;
                }
            }
            echo "Number of heads:".$head."\n";
            echo "Number of tails:".$tail."\n";
            //percentage of heads outcome
            echo "% of heads:".$head*100/$num."\n";
            //percentage of tail outcome
            echo "% of tails:".$tail*100/$num."\n";
        }
        //number of trails should be positive 
        else{
            echo "Enter a positive number"."\n";
            //again scan user input and store it in $num
            fscanf(STDIN,"%d",$num);
            //call function flipcoin 
            $this->flipcoin($num);
        }
    }
}
//create object of class FlipCoins
$obj=new FlipCoins;
echo "Enter number of times to flip coins:"."\n";
//scan user input number
fscanf(STDIN,"%d",$num);
//call function flipcoin
$obj->flipcoin($num);
?>