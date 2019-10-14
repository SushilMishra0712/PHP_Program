<?php
class LazyInitializedSingleton{
    private static $instance=null;
    private function __construct(){

    }
    public static function getInstance(){
        if(self::$instance==null){
           self:: $instance=new LazyInitializedSingleton();
        }
        return self::$instance;
    }
}
$object1=LazyInitializedSingleton::getInstance();
var_dump($object1);
$object2=LazyInitializedSingleton::getInstance();
var_dump($object2);
$object3=LazyInitializedSingleton::getInstance();
var_dump($object3);
?>