<?php
class Tv{
    public $model='xyz';
    public $volume=1;
    function volumeUp(){
        $this->volume++;
    }
    function volumeDown(){
        $this->volume--;
    }
}
//Create objects
$tv_one=new Tv;
$tv_two=new Tv;
$tv_one->volumeUp();
$tv_two->volumeDown();
echo $tv_one->volume."\n";
echo $tv_one->model."\n";
echo $tv_two->volume."\n";
echo $tv_two->model."\n";
?>