<?php
//print the Nth Harmonic Value.
class Harmonic{
    //function for finding harmonic number 
    function nthHarmonic($num){
            if($num!=0){
                //initial value of $harmonic is 1
                $harmonic=1;
                //for loop to traverse till $num
                for($i=2;$i<$num;$i++){
                    //harmonic number logic
                    $harmonic=$harmonic+1/$i;
                }
                //prints the nth harmonic number
                echo $num."th harmonic number is:".$harmonic."\n";
            }
            //User input number should not be zero
            else{
                echo "Entered number cannot be zero\n";
                //again take input from the user and scan it to store in $num
                fscanf(STDIN,"%d",$num);
                //call this function again to find the harmonic number
                $this->nthHarmonic($num);
            }
    }
}
//create object of Harmonic class
$obj=new Harmonic;
echo "Enter N:\n";
//scan user input number
fscanf(STDIN,"%d",$num);
//call function nthHarmonic
$obj->nthHarmonic($num);
?>