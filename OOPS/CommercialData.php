<?php
class StockAccount{
    public $totalamount;
    public $symbol;
    function StockAccount($new_account,$totalamount){
    $this->new_account=$new_account;
    $this->totalamount=$totalamount;
    }
    function valueOf(){
    echo "Total balance of ".$this->new_account." is:".$this->totalamount."\n";
    }
    function buy($amount,$symbol){
    if($amount<=$this->totalamount){

    }
    }
    function sell($amount,$symbol){
    
    }
    function save($new_account){

    }
    function printReport(){

    }
    function jsonfileRead(){
        $json_filecontent=file_get_contents("StockAccount.json");
        $array=json_decode($json_filecontent,true);
        $sum=0;
        $totalvalue=0;
        $array_stockname=array("Book","Newspaper");
        echo "Details of stock\n";
        for($j=0;$j<count($array_stockname);$j++){
        echo "\n";
        for($i=0;$i<count($array[$array_stockname[$j]]);$i++){
            echo "value of ".$array[$array_stockname[$j]][$i]["symbol"].":".($array[$array_stockname[$j]][$i]["no_of_shares"]*$array[$array_stockname[$j]][$i]["price"])."\n";
            $sum=($array[$array_stockname[$j]][$i]["no_of_shares"]*$array[$array_stockname[$j]][$i]["price"]);
            $totalvalue=$totalvalue+$sum;
        }
        echo "Total value of ".$array_stockname[$j].":".$totalvalue."\n";
        $array_totalvalue=array($totalvalue);
        $totalvalue=0;
        }
    }
    function switchCase(){
        echo "Enter 1 to create new Account\nEnter 2 to View Details of Stock\nEnter 3 to buy share\nEnter 4 to sell share\n";
        fscanf(STDIN,"%d",$response);
        switch($response){
        case 1:
        echo "Enter your name:\n";
        fscanf(STDIN,"%s",$name);
        echo "Enter amount to deposit:\n";
        fscanf(STDIN,"%s",$deposit);
        $object=new StockAccount($name,$deposit);
        break;
        case 2:
        StockAccount::jsonfileRead();
        break;
        case 3:
        echo "Which stock you want to buy?\n1 Book\n2 Newspaper\n";
        StockAccount::switchCase2();
        }
    }
    function switchCase2(){
        fscanf(STDIN,"%n",$buy_stock);
        switch($buy_stock){
        case 1:
        echo "buy book\n";
        break;
        case 2:
        echo "buy newspaper\n";
        }
    }
    
}
$object=new StockAccount("Null","null");
// echo "Enter 1 to create new Account\nEnter 2 to View Details of Stock\n";
// fscanf(STDIN,"%d",$response);
// switch($response){
//     case 1:
//     echo "Enter your name:\n";
//     fscanf(STDIN,"%s",$name);
//     echo "Enter amount to deposit:\n";
//     fscanf(STDIN,"%s",$deposit);
//     $object=new StockAccount($name,$deposit);
//     break;
//     case 2:
//     $object->jsonfileRead();
// }
$object->switchCase();
// $object->valueOf();
// $object->valueOf();
// $object->jsonfileRead();





