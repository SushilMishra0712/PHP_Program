<?php
//The temperature in fahrenheit as input outputs the temperature in Celsius or viceversa
class Temperature{
    //convert into $celsius function
    static function convert_into_cel($fahrenheit)
    {   //formula to convert into celsius
        $celsius=($fahrenheit-32)*5/9;
        echo round($celsius,4)."\n";
    }

    //convert into $fahrenheit function
    static function convert_into_fah($celsius)
    {   //formula to convert into fahrenheit
        $fahrenheit= ($celsius* 9/5) + 32 ;
        echo round($fahrenheit,4)."\n";
    }
}
//create object of class Temperature
$obj=new Temperature;
echo "Enter temperature in Celsius\n";
fscanf(STDIN,"%f",$celsius);
echo "Temperature converted in fahrenheit is:\n";
//call function convert into fahrenheit
$obj->convert_into_fah($celsius);
echo "Enter temperature in Fahrenheit\n";
fscanf(STDIN,"%f",$fahrenheit);
echo "Temperature converted in celsius is:\n";
//call function convert into celsius
$obj->convert_into_cel($fahrenheit);
?>