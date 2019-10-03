<?php
require ("../Algorithm/Util.php");
require ("Stack.php");
//PrimeAnagram added in a Stack
$count=0;
$next=100;
$object=new Stack;
for($i=0;$i<10;$i++){
    for($j=$next-100;$j<$next;$j++)
    {
        $x=Util::prime($j);
        $rev=strrev($j); 
        //prime number for $rev
        $Rev_response = Util::prime($rev);
        if($x == 1 && $Rev_response==1)
        {
            $object->push($j);
            $count++;
        }
    }
    $next=$next+100;
    echo "\n";
}
$object->show();


    