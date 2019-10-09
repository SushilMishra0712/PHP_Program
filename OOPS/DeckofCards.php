<?php
$suit_array=array("Clubs","Diamond","Heart","Spades");
$rank_array=array("2","3","4","5","6","7","8","9","King","Queen","Jack","Ace");
$cards_array=array(
    array(array("Clubs","Diamonds","Hearts","Spades"),"2","3","4","5","6","7","8","9","King","Queen","Jack","Ace"));
for($i=0;$i<4;$i++){
    for($j=1;$j<13;$j++){
        $suit=rand(0,3);
        $rank=rand(1,12);
        print_r($cards_array[0][0][$suit]);
        echo " ";
        print_r($cards_array[0][$rank]);
        echo "\n";
    }
    // echo "\n";
}
// print_r($cards_array[0][0][0]);
// print_r($cards_array[0][1]);
