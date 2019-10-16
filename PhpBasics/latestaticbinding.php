<?php
class DB{
    protected static $table='baseTable';
    public function select(){
        echo "SELECT * FROM ".static::$table."\n";
    }
    public function insert(){
        echo "INSERT INTO ".static::$table."\n";
    }
}
class abc extends DB{
    protected static $table='abc';
}
class userAccount extends DB{
    protected static $table='user_accounts';
}
$accounts=new userAccount;
$abc=new abc;
$abc->select();
$accounts->select();
?>