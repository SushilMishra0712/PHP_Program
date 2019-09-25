<?php
/*Given N distinct Coupon Numbers, how many random numbers 
do you need to generate distinct coupon number? This program 
simulates this random process.*/

class Coupons{
    //function to generate random coupons
        function coupon($n){
            //initial count of random number is 0
            $count=0;
            //entered input should be positive number
            if($n>0){
                //for loop to generate $n coupons
                for($i=0;$i<$n;$i++){
                    //initialize string str to null
                    $str="";
                    //for loop to generate 10 digit number
                    for($j=0;$j<10;$j++){
                        //random function for random single digit integer
                        $r=rand(0,9);
                        $count++;
                        //append single digit random number to string $str
                        $str.=$r;
                    }
                    echo $str."\n";
                }
                //$count gives total random needed for $n coupons
                echo "Total Random number needed to have ".$n." distinct numbers: ".$count."\n";
            }
            //please enter positive number
            else{
                echo "Enter positive number\n";
                //scan new input from the user
                fscanf(STDIN,"%d",$n);
                //call function coupon to generate coupons
                $this->coupon($n);
            }
        }
}
//create object of Coupon class
$obj=new Coupons;
echo "Enter N Coupons:\n";
//scan user input number
fscanf(STDIN,"%d",$n);
//call function of the class
$obj->coupon($n);
?>