<?php
//include utility classs
include('Utility.php');
//Store the numbers in slot
class Hashing{
    //function to read numbers from the files
    function readText(){
        $data = Utility::readText("number.txt");
        return $data;
    }
    //function to hash the data
    function hash($data){
        for($i=0;$i<count($data);$i++){
            $current=$data[$i];
            $temp=$current%11;
            $list[$temp][$current]=$current;
        }
        print_r($list);
    }

}
//create object of class Hashing
$object=new Hashing;
//store all numbers in $data
$data=$object->readText();
//call function hash
$object->hash($data);
?>

