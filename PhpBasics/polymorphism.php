<?php
//polymorphism Example:Method of same name in different classes
interface Shape{
    public function Cal_Area();
}
class Circle implements Shape{
    private $radius;
    public function __construct($radius){
        $this->radius=$radius;
    }
    public function Cal_Area(){
        echo round($this->radius*$this->radius*pi(),2)."\n";
    } 
}
class Rectangle implements Shape{
    private $length;
    private $breath;
    public function __construct($l,$b){
        $this->length=$l;
        $this->breath=$b;
    }
    public function Cal_Area(){
        echo round($this->length*$this->breath,2)."\n";
    } 
}
$circle=new Circle(2.4);
$circle->Cal_Area();
$rectangle=new Rectangle(4,8);
$rectangle->Cal_Area();