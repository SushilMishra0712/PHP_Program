<?php
//It is related with the class & not with the object
class House{
    public static $size=2500;
    public static function getSize(){
        return self::$size."\n";
    }
}
echo House::getSize();