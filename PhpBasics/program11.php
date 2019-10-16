<?php
//Not completed...
function coupon($n){
    $count=0;
    $array=array();
    if($n>0){
        for($i=0;$i<$n;$i++){
            $str="";
            for($j=0;$j<1;$j++){
                $r=rand(0,9);
                $count++;
                $str.=$r;
            }
            $check = 0;
            for($k=0;$k<count($array);$k++){
                if($str==$array[$k]){
                    $check=1;
                }
                else{
                    $check=0;
                }
        }
        echo $check;
        if($check==0){
            $array[$k]=$str;
            }
    }
        print_r($array);
        echo "Total Random number needed to have ".$n." distinct numbers: ".$count."\n";
      }
      else{
        echo "Enter positive number\n";
        //scan new input from the user
        fscanf(STDIN,"%d",$n);
        //call function coupon to generate coupons
        $this->coupon($n);
    }
}
echo "Enter n\n";
fscanf(STDIN,"%d",$n);
coupon($n);

