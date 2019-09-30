<?php
class util
{   //$d=day,$m=month,$y=year
    // PHP program to find 
    // day of a given date
    static function dayofweek($d, $m, $y) 
    { 
        $year = floor($y - (14 - $m) / 12);
        $x = floor($year+ $year / 4 - $year / 100 + $year / 400);
        $month = ($m + 12 * floor(((14 / $m) / 12)) - 2);
        $date = floor(($d + $x + floor(31 * $month/ 12)) % 7);  
        return $date;
    } 
     //convert into temperature
    static function convert_into_cel($Fahrenheit)
    {
        $temprature=($Fahrenheit-32)*5/9;
        return $temprature;
    }
    
    //convert into $Fahrenheit
    static function convert_into_fah($temprature)
    {
        $Fahrenheit= ($temprature* 9/5) + 32 ;
        return $Fahrenheit;
    }
    //calculate salary
    //$p= principal amount
    static function Salary($p,$year,$rate)
    {
        $n=12*$year;
        $r=$rate/(12*100);
        $payment=($p*$r)/(1-pow((1+$r),(-$n)));
        return $payment;
    }
    //find binary of Decimal number
    static function binary($number)
    {
        $binary=0;
        $i=1;
        //convert into binary
        while($number>0)
        {
            $binary=$binary+(((int)($number%2))*$i);
            $i=$i*10;
            $number=((int)($number)/2);

        }
        return $binary;
    }
    //find decimal of binary number
    static function decimal($binary)
    {
        $decimal=0;
        $i=0;
        //convert into deciml
        while($binary>0)
        {
            $decimal=$decimal+(((int) pow(2,$i))*(int)($binary%10));
            $binary=((int)($binary/10));
            $i++;
        }
       //swap the nibbles and give new decimal number
        $decimal=((($decimal & 0x0F)<<4) | (($decimal & 0xF0)>>4));

        return $decimal;
    }
    //compute the Square root of non negarive number
    static function sqrootnonnegativ($number)
    {
        $epsilon = 1e-15;    // relative error tolerance
        $t = $number;       // estimate of the square root of $number
        
         // repeatedly apply Newton update step until desired precision is achieved
        while (abs($t - $number/$t) > $epsilon*$t)
        {
            $t = ($number/$t + $t) / 2.0;
        }
        return $t;
    }
    // check prime number
   static function prime($number)
    {
        $count=0;
        //prime number is divisile by 1 and itself
        for($k=1;$k<=$number;$k++)
        {
            if($number%$k==0)
            {
                $count++;
            }
        }
        if($count==2)
            return true;
        else
            return false;
    }
    //function to find palindrome number
    static function palindrome($number)
    {  
        $rev= 0; //collect reverse of number
        $temp=$number;//it hold the orignal number
        //reverse the Number
        while((int)$number>0)
        {  
            $a=(int)($number%10);
            $rev=(int)(($rev*10)+$a);
            $number=(int) ($number/10);
        }
        //check rev and temp number are same or not
        if($temp==$rev)
            return true;
        else
            return false;
    }
    //Function to Find Anagram
    static function isAnagram($string1,$string2)
    {  
        //Lenght is not equal then retun
        if(strlen($string1)!=strlen($string2))
            {    
                return false;
            }
        //convert array to string
        $stringArr1=str_split($string1);
        $stringArr2=str_split($string2);
        //Sort String
        sort($stringArr1);
        sort($stringArr2);
        //check both string are same or not
        for($i=0;$i<count($stringArr2);$i++)
            {    //if not same then return
                if($stringArr2[$i]!=$stringArr1[$i])
                    {
                        return false;
                    }
            }
        return true;
    }
    //function for leap year
    public static function leap($year)
    {
        if(($year%4==0 && $year%100!=0 ) || $year%400==0)
            return true;
        else
            return false;
    }

}
?>