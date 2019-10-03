<?php
require ("Utility.php");
require ("Singlelinkedlist.php");
    //array with null value size of 11
    $arr = array_fill(0,11,null);
    
    /** 
     * functon add is to get value and add in the hash map
     */
    function add($data)
    {
        global $arr;
        //get index where we want to hold the data
        $index = $data%11;
        //if index is null the it will save the object of the ordered linked list 
        if ($arr[$index]==null) {
            $arr[$index] = new linkedlist;
            //and add the data 
            $arr[$index]->add($data);
            return;
        }
        // if not null then is will add data in the sorted way
        $arr[$index]->add($data);
    }
    /**
     * function search is to find data is present in the list of not if yes then it
     * will remove and if no then is will add data in the list 
     */
    function search($data){
        global $arr;
        //loction of data index 
        $location = $data%11;
        // search is ture then is will remove data 
        if ($arr[$location]->search($data)) {
            echo "data is remove\n";
            $arr[$location]->remove($data);
            $s = "";
            for ($i=0; $i < sizeof($arr); $i++) { 
                $s .= $arr[$i]->getStr()." ";
            }
            $s = substr($s,0,-1);
            Utility::writeFl($s,"number.txt");
        } 
        //it will add data
        else {
            echo "data is added\n";
            $arr[$location]->add($data);
            $filec = fopen("number.txt","a+") or die("unable to open");
            fwrite($filec," ".$data);
        }
        
    }
    
    //save the value from the file into the array 
    $sArr = explode(" ",Utility::readFl("number.txt"));
    //store value in the hash map one by one 
    for ($i=0; $i < sizeof($sArr); $i++) { 
        add((int)$sArr[$i]);
    }
    //show all the value of list
    for ($i=0; $i < sizeof($arr); $i++) { 
        echo $arr[$i]->getStr()."\n";
    }
    //ask use to search the number 
    echo "enter number to search\n";
    $num = Utility::getInt();
    //call search function
    search($num);
    //show all the value of list
    for ($i=0; $i < sizeof($arr); $i++) { 
        echo $arr[$i]->getStr()."\n";
    }
    
?>
