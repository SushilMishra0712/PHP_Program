<?php
require ("Dequeue.php");
//object of deque
    $d = new Deque();
    //get string
    echo "Enter word\n";
    fscanf(STDIN,"%s",$str);
    //for loop to add all value in deque
    for ($i=0; $i < strlen($str); $i++) { 
        $d->addRear($str[$i]);
    }
    //b for boolean valure
    $b = true;
    //for loop to check string char
    for ($i=0; $i < strlen($str)/2; $i++) { 
        //pop value from front and rear and check they are equal or not
        if ($d->removeFront() != $d->removeRear()) {
           $b = false;
           break;
        }
    }
    //print true false
    if ($b) {
        echo "true\n";
    }else {
        echo "false\n";
    }