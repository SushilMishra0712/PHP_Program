<?php
//JSON Inventory Data Management of Rice, Pulses and Wheats
class JsonInventory
{    //function to calculate total price of inventories
    function totalPrice($array){
        $total=0;
        $totalrice=0;
        $totalwheat=0;
        $totalpulses=0;
        for($i=0;$i<count($array["Rice"]);$i++){
        $totalrice=$totalrice+$array["Rice"][$i]["weight"]*$array["Rice"][$i]["price per kg"];
        }
        for($i=0;$i<count($array["Wheat"]);$i++){
        $totalwheat=$totalwheat+$array["Wheat"][$i]["weight"]*$array["Wheat"][$i]["price per kg"];
        }
        for($i=0;$i<count($array["Pulses"]);$i++){
        $totalpulses=$totalpulses+$array["Pulses"][$i]["weight"]*$array["Pulses"][$i]["price per kg"];
        }
        echo "Total price for Rice is : ".$totalrice."\n";
        echo "Total price for Wheat is : ".$totalwheat."\n";
        echo "Total price for Pulses is : ".$totalpulses;
    }

}
//create object of class JsonInventory
$obj_inventory=new JsonInventory;
//read json file with php
$JsonFileContent=file_get_contents("Inventory.json");
//converting json file contents to php array
$array=json_decode($JsonFileContent,true);
//var_dump($array);
$obj_inventory->totalPrice($array);
?>

