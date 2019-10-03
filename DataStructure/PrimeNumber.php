<?php
require ("../Algorithm/Util.php");
//PrimeNumber store in 2dArray
$count=0;
$next=100;
$array2d[][]=array();
for($i=0;$i<10;$i++){
    echo "Range from ".($next-100)." to ".$next." \n";
    for($j=$next-100;$j<$next;$j++)
    {
        $x=Util::prime($j);
        if($x == 1)
        {
            $array2d[$count][$j]=$j;
            echo $j." ";
            $count++;
        }
    }
    $next=$next+100;
    echo "\n";
}


    