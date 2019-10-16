<?php
echo "Php Data Types:"."\n"."\n";
echo "Php Strings:"."\n";
$x="Hello World1!";
$y='Hello World2!';
echo $x."\n";
echo $y."\n";
echo "Php Integers:"."\n";
$p=5678;
var_dump($p);
echo "Php Float:"."\n";
$q=10.345;
var_dump($q);
echo "Php Boolean:"."\n";
$a=true;
$b=false;
var_dump($a);
var_dump($b);
echo "Php Array:"."\n";
$cars=array("Volvo","BMW","Toyota");
var_dump($cars);
echo "Php Object:"."\n";
class Car{
    function Car(){
        $this->model="VM";
    }
}
//create an object 
$herbie=new Car();
//show object properties
echo $herbie->model."\n";
echo "Php Null Value:"."\n";
$n="Hello World";
$n=null;
var_dump($n);
?>
