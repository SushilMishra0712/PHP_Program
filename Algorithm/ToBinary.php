<?php
//binary representation of the decimal number typed as the input $number
class ToBinary{
    //function to print binary of $number
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
    }
}
//create object of class ToBinary
$obj=new ToBinary;
echo "Enter Integer Number:\n";
fscanf(STDIN,"%d",$number);
//call the function binary
$obj->binary($number);
?>