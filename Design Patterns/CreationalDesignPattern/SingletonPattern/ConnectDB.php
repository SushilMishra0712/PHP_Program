<?php
//LazyInitialization Singleton Example
class ConnectDB{
    //Hold the class instance
    private static $instance=null;
    private $conn;

    private $host='localhost';
    private $user='username';
    private $password='password';
    private $name='name';
    //The DB connection is established in the private constructor
    private function __construct(){
    $this->conn=new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user,$this->password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    //global access method getInstance
    public static function getInstance(){
        if(!self::$instance){
            self::$instance=new ConnectDB();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->conn;
    }
}
//create three instances out of the class and var_dump it
$instance1 = ConnectDb::getInstance();
$conn1 = $instance1->getConnection();
var_dump($conn1);
$instance2 = ConnectDb::getInstance();
$conn2 = $instance2->getConnection();
var_dump($conn2);
$instance3 = ConnectDb::getInstance();
$conn3 = $instance3->getConnection();
var_dump($conn3);
?>