<?php
require "Linkedlist.php";
//Stock Symbol Purchased or Sold in a Stack implemented using Linked List 
class StockSymbol{
    public $totalamount;
    public $symbol;
    public $bookstock_buy=0;
    public $newspaperstock_buy=0;
    public $object_linkedlist;
    //constructor function
    public function StockSymbol($new_account,$totalamount){
        $this->new_account=$new_account;
        $this->totalamount=$totalamount;
        $this->bookstock_buy=0;
        $this->newspaperstock_buy=0;
        $this->object_linkedlist=$object_linkedlist;
    }
    //prints current balance of user
    function valueOf(){
    echo "Total balance of ".$this->new_account." is:".$this->totalamount."\n";
    }
    //function to buy stocks available in StockAccount.json file
    function buy($amount,$symbol){
    //balance should be greater than stock value to buy
    $this->object_linkedlist=new linkedlist;
    if($amount<=$this->totalamount){
        //buy book stock
        if($symbol=="Book"){
            echo $this->new_account." owned Book Stock\n";
            echo "Transaction Time:";
            echo date('Y-m-d H:i:s')."\n";
            echo "Total balance of ".$this->new_account." is:".$this->totalamount."\n";
            $this->bookstock_buy++;
            $this->object_linkedlist->add("Book: ");
            $this->object_linkedlist->add(date('Y-m-d H:i:s'));
        }
        //buy newspaper stock
        elseif($symbol=="Newspaper"){
            echo $this->new_account." owned Newspaper Stock\n";
            echo "Transaction Time:";
            echo date('Y-m-d H:i:s')."\n";
            echo "Total balance of ".$this->new_account." is:".$this->totalamount."\n";
            $this->newspaperstock_buy++;
            $this->object_linkedlist->add("Newspaper: ");
            $this->object_linkedlist->add(date('Y-m-d H:i:s'));
        }
    }
    //if balance is less than stock value
    else{
        echo "Your Balance is low than Stock price\n";
    }
    }
    //function to sell stocks of user
    function sell($amount,$symbol){
        //user should be the owner of the stock if he wants to sell
        if($symbol=="Book" && $this->bookstock_buy>0){
            echo $this->new_account." sold Book Stock\n";
            echo "Transaction Time:";
            echo date('Y-m-d H:i:s')."\n";
            echo "Total balance of ".$this->new_account." is:".$this->totalamount."\n";
            $this->bookstock_buy--;
            $this->object_linkedlist->remove_last();
        }
        elseif($symbol=="Newspaper" && $this->newspaperstock_buy>0){
            echo $this->new_account." sold Newspaper Stock\n";
            echo "Transaction Time:";
            echo date('Y-m-d H:i:s')."\n";
            echo "Total balance of ".$this->new_account." is:".$this->totalamount."\n";
            $this->newspaperstock_buy--;
            $this->object_linkedlist->remove_last();
        }
    }
    //function to show symbols in stack
    function show_symbol(){
        echo "Symbols purchased in Stack are:\n";
        $this->object_linkedlist->show();
    }
    //function to read the StockAccount.json file and find value of each stock
    function jsonfileRead(){
        $json_filecontent=file_get_contents("StockAccount.json");
        $array=json_decode($json_filecontent,true);
        $sum=0;
        $totalvalue=0;
        $array_totalvalue=array();
        //create object of class Linkedlist
        //array to store stock names 
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
        echo "\n";
        return $array_totalvalue;
       
    }
    function switchCase2($array_totalvalue){
        fscanf(STDIN,"%d",$buy_stock);
        switch($buy_stock){
        case 1:
        $new=implode($array_totalvalue[0]);
        $this->totalamount=$this->totalamount-$new;
        StockSymbol::buy($new,"Book");
        break;
        case 2:
        $new=implode($array_totalvalue[1]);
        $this->totalamount=$this->totalamount-$new;
        StockSymbol::buy($new,"Newspaper");
        }
    }
    function switchCase3($array_totalvalue){
        fscanf(STDIN,"%d",$sell_stock);
        switch($sell_stock){
            case 1:
            $new=implode($array_totalvalue[0]);
            $this->totalamount=$this->totalamount+$new;
            StockSymbol::sell($new,"Book");
            break;
            case 2:
            $new=implode($array_totalvalue[1]);
            $this->totalamount=$this->totalamount+$new;
            StockSymbol::sell($new,"Newspaper");
        }

    }
    
}
//create object of class StockAccount
$object=new  StockSymbol("Amit","10000");
//store return value of function jsonfileRead
$output_jsonfileRead=$object->jsonfileRead();
$loop=1;
//while loop to take user input choices
while($loop>0)
{ 
    echo "Enter 1 to create new Account\nEnter 2 to View Details of Stock\nEnter 3 to buy share\nEnter 4 to sell share\nEnter 5 to view symbols in stack\nEnter 6 to exit\n";
    fscanf(STDIN,"%d",$response);
    switch($response){
    //to create new user account
    case 1:
    echo "Enter your name:\n";
    fscanf(STDIN,"%s",$name);
    echo "Enter amount to deposit:\n";
    fscanf(STDIN,"%s",$deposit);
    $object=new  StockSymbol($name,$deposit);
    break;
    //to view details of stock prices
    case 2:
    StockSymbol::jsonfileRead();
    break;
    case 3:
    //to buy stock shares
    echo "Which stock you want to buy?\n1 Book\n2 Newspaper\n";
    $object->switchCase2($output_jsonfileRead);
    break;
    //to sell owned stock
    case 4:
    echo "Which stock you want to sell?\n1 Book\n2 Newspaper\n";
    $object->switchCase3($output_jsonfileRead);
    break;
    case 5:
    $object->show_symbol();
    break;
    //to exit the program
    case 6:
    exit(0);
    }
    echo "\n";
}
?>