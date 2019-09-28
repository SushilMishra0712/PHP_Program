<?php
/*calculate monthlyPayment that reads in three command-line arguments 
P, Y, and R and calculates the monthly payments you would have to 
make over Y years to pay off a P principal loan amount at R per cent 
interest compounded monthly*/

class MonthlyPayment{
    //function to find monthly payment
    static function Salary($p,$year,$rate)
    {   //formula to find monthly payment 
        $n=12*$year;
        $r=$rate/(12*100);
        $payment=($p*$r)/(1-pow((1+$r),(-$n)));
        //prints monthly amount upto 2 decimals
        echo round($payment,2)."\n";
    }
}
//create object of class MonthlyPayment
$obj=new MonthlyPayment;
echo "Enter principal loan amount\n";
fscanf(STDIN,"%f",$p);
echo "Enter years to pay off\n";
fscanf(STDIN,"%f",$year);
echo "Enter rate of interest\n";
fscanf(STDIN,"%f",$rate);
echo "Monthly amount which needs to be payed:\n";
//call the function Salary
$obj->Salary($p,$year,$rate);
?>