<?php
class Foo{
        /**
     * @var integer
     * @range(0, 100)
     * @label('Number of Bars')
     */
    public $bar;
    function __construct(){
        $this->bar=null;
    }
    function display(){
        $this->bar="Hi\n";
        echo $this->bar;
    }
}
$obj=new Foo;
$obj->display();