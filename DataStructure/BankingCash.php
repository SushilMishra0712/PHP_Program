<?php
require ("Queue.php");
class BankingCash{
    public $balance;
    public $last_transaction;
    public $count;
    public function __construct(){
        $this->balance=null;
        $this->last_transaction=null;
        $this->count=null;
    }
    
    public function deposit($v){
        if($v>0){
        $this->balance=$this->balance+$v;
        $this->last_transaction=$v;
        $this->count++;
        }
        else{
            echo "Deposit cannot be negative\n";
        }
    }
    public function withdraw($v){
        if($v>0){
            if($v<$this->balance){
                $this->balance=$this->balance-$v;
                $this->last_transaction=-$v;
                $this->count++;
            }
            else{
                echo "Cannot withdraw more than balance\n";
            }
        }
        else{
            "Cannot withdraw negative amount\n";
        }
    }
    public function statement(){
        echo "Your balance is:".$this->balance."\n";
        echo "Last transaction was:".$this->last_transaction."\n";
    }
    public function totalTransaction(){
        echo "Total transaction:".$this->count."\n";
    }
}
$obj=new BankingCash;
$obj->deposit(100);
$obj->deposit(500);
$obj->statement();
$obj->withdraw(200);
$obj->statement();
$obj->totalTransaction();
?>