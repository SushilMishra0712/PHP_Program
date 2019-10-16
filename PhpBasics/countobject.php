<?php
//To count how many objects created of an class
class abc{
    public static $objectCount=0;
    public static function getCount(){
        return self::$objectCount."\n";
    }
    public function __construct(){
        self::$objectCount++;
    }
}
$a=new abc();
$b=new abc();
$c=new abc();
$d=new abc();
echo abc::getCount();

class xyz extends abc{
    public static function getCount(){
       echo parent::getCount();
        //new functionality
    }
}
$e=new xyz();
$f=new xyz();
echo $e->getCount();
?>