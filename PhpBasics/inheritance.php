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
class TvWithTimer extends Tv{
    public $timer=true;
}
class PlazmaTv extends Tv{
    public $plazma=true;
}
$tv=new TvWithTimer('Tv with timer',2);
$plazma=new PlazmaTv('Plazma tv',3);
echo $plazma->model."\n";
echo $tv->model."\n";
//Override constructor
class NewPlazmaTv extends Tv{
    function __construct(){

    }
}
$newplazma=new NewPlazmaTv;
echo $newplazma->model='Ryan'."\n";
$newplazma->volume=5;
echo $newplazma->volume."\n";
?>