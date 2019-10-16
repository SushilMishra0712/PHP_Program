<?php
/* Interface class does not contain variables.
It contains only abstract functions,cannot create 
object of interface class. Interface functions must be public. */
interface abc{
    public function test();
    public function xyz();
}
class def implements abc{
    public function test(){
        echo "Test function\n";
    }
    public function xyz(){
        echo "Xyz function\n";
    }
}

$obj=new def;
echo $obj->test();
echo $obj->xyz();
?>