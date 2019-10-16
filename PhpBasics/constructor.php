<?php
class Tv{
    public $model;
    public $volume;
    function volumeUp(){
        $this->volume++;
    }
    function volumeDown(){
        $this->volume--;
    }
    function __construct($m,$n){
        $this->model=$m;
        $this->volume=$n;
    }
}
$tv_one=new Tv('xyz',2);
$tv_two=new Tv('abc',4);
echo $tv_one->model."\n";
echo $tv_one->volume."\n";
echo $tv_two->model."\n";
echo $tv_two->volume."\n";
?>