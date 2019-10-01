<?php
/*Check for largest value of the Note to return change
to get to minimum number of Notes*/ 

class VendingMachine{
    //function to return minimum number of notes
    function changeNote($amount){

        $i=floor($amount/1000);
        $amount=$amount-$i*1000;

        $j=floor($amount/500);
        $amount=$amount-$j*500;

        $k=floor($amount/100);
        $amount=$amount-$k*100;

        $l=floor($amount/50);
        $amount=$amount-$l*50;

        $m=floor($amount/10);
        $amount=$amount-$m*10;

        $n=floor($amount/5);
        $amount=$amount-$n*5;

        $o=floor($amount/2);
        $amount=$amount-$o*2;

        $p=floor($amount/1);
        $amount=$amount-$p*1;
        //total number of notes
        $total=$i+$j+$k+$l+$m+$n+$o+$p;
        echo "Total number of notes returned:".$total."\n";
        echo "Notes returned by vending machine are\n";
        echo "Notes of 1000 Rs:".$i."\n";
        echo "Notes of 500 Rs:".$j."\n";
        echo "Notes of 100 Rs:".$k."\n";
        echo "Notes of 50 Rs:".$l."\n";
        echo "Notes of 10 Rs:".$m."\n";
        echo "Notes of 5 Rs:".$n."\n";
        echo "Notes of 2 Rs:".$o."\n";
        echo "Notes of 1 Rs:".$p."\n";
    }
}
//create object of class VendingMachine
$obj=new VendingMachine;
echo "Enter amount for change in Rs\n";
//user inputs amount in Rs
fscanf(STDIN,"%d",$amount);
//is entered amount is positive
if($amount>0){
$obj->changeNote($amount);
}
else{
    echo "Please enter positive amount\n";
}
?>