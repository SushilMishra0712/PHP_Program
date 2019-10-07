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
        $array_totalvalue=array();
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
        $array_total=array($totalvalue);
        array_push($array_totalvalue,$array_total);
        $totalvalue=0;
        }
        return $array_totalvalue;
        // print_r($array_totalvalue);
    }
    // function switchCase(){
    //     $loop=1;
    //     while($loop>0){
    //         echo "Enter 1 to create new Account\nEnter 2 to View Details of Stock\nEnter 3 to buy share\nEnter 4 to sell share\nEnter 5 to Check balance\nEnter 6 to exit\n";
    //         fscanf(STDIN,"%d",$response);
    //         switch($response){
    //         case 1:
    //         echo "Enter your name:\n";
    //         fscanf(STDIN,"%s",$name);
    //         echo "Enter amount to deposit:\n";
    //         fscanf(STDIN,"%s",$deposit);
    //         $object=new StockAccount($name,$deposit);
    //         $object->valueOf();
    //         break;
    //         case 2:
    //         StockAccount::jsonfileRead();
    //         break;
    //         case 3:
    //         echo "Which stock you want to buy?\n1 Book\n2 Newspaper\n";
    //         StockAccount::switchCase2();
    //         case 5:
    //         StockAccount::valueOf();
    //         break;
    //         case 6:
    //         exit(0);
    //         }
    //         echo "\n";
    //     }
    // }
    function switchCase2($array_totalvalue){
        fscanf(STDIN,"%d",$buy_stock);
        switch($buy_stock){
        case 1:
        $this->totalamount=$this->totalamount-$array_totalvalue[0];
        echo "Your current balance is:".$this->totalamount."\n";
        break;
        case 2:
        $this->totalamount=$this->totalamount-$array_totalvalue[1];
        }
    }
    
}
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
// $object->switchCase();
// $object->valueOf();
// $object->valueOf();
// $object->jsonfileRead();
$object=new StockAccount("Amit","100");
$output_jsonfileRead=$object->jsonfileRead();
$loop=1;
while($loop>0)
{
    echo "Enter 1 to create new Account\nEnter 2 to View Details of Stock\nEnter 3 to buy share\nEnter 4 to sell share\nEnter 5 to Check balance\nEnter 6 to exit\n";
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
    StockAccount::switchCase2($output_jsonfileRead);
    break;
    case 4:
    echo "Which stock you want to sell?\n";
    break;
    case 5:
    $object->valueOf();
    break;
    case 6:
    exit(0);
    }
    echo "\n";
}





