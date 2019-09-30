<?php
class ToDecimal{
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

        echo $decimal."\n";
    }
    static function binary($number)
    {   //initially $binary is zero
        $binary=0;
        $i=1;
        //convert into binary
        while($number>0)
        {
            $binary=$binary+(((int)($number%2))*$i);
            $i=$i*10;
            $number=((int)($number)/2);

        }
        //prints $number in binary form
        echo "The binary form is:\n";
        echo $binary."\n";
        echo "After swapping nibbles we get integer:\n";
        self::decimal($binary);
    }
}
//create object of class ToBinary
$obj=new ToDecimal;
echo "Enter Integer Number:\n";
fscanf(STDIN,"%d",$number);
//call the function binary
$obj->binary($number);
?>
