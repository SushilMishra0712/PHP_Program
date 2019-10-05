<?php
//Inventory Management Program
class InventoryManagement{
    //function to read json file
    public function readJsonfile(){
        //read json file with php
        $JsonFileContent=file_get_contents("Inventoryfactory.json");
        //converting json file contents to php array
        $array=json_decode($JsonFileContent,true);
        //return to use in function getTotal
        return $array;
    }
    //function to get total value of each inventory
    public function getTotal($array){
        //for mobile inventory
        $mobileSum=0;
        for($i=0;$i<count($array["mobile"]);$i++){
        $mobileSum=$mobileSum+$array["mobile"][$i]["count"]*$array["mobile"][$i]["price"];
        }
        echo "Total value for inventory mobile : ".$mobileSum."\n";
        //for tv inventory
        $tvSum=0;
        for($i=0;$i<count($array["tv"]);$i++){
        $tvSum=$tvSum+$array["tv"][$i]["count"]*$array["tv"][$i]["price"];
        }
        echo "Total value for inventory tv : ".$tvSum."\n";
        $new_array=array("mobile"=>$mobileSum,"tv"=>$tvSum);
        //return to use in function printresult
        return $new_array;
    }
    //function to print values of inventories in new json file
    public function printresult($new_array){
    var_dump($new_array);    
    $result=file_put_contents("inventoryfactoryvalue.json",json_encode($new_array));
    }
}
//create object of class InventoryManagement
$object=new InventoryManagement;
//call function readJsonfile 
$readJsonfile_output=$object->readJsonfile();
//call function getTotal
$getTotal_output=$object->getTotal($readJsonfile_output);
//call function printresult
$object->printresult($getTotal_output);
?>

