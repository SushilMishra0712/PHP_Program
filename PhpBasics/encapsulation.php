<?php
class Tv{
    protected $model;   //Cannot be modified by other class
    private $volume;    //Can only be modified by child class
    public function volumeUp(){
        $this->volume++;
    }
    public function volumeDown(){
        $this->volume--;
    }
    public function getModel(){
        return $this->model;
    }
    public function __construct($m,$n){
        $this->model=$m;
        $this->volume=$n;
    }
}
class plazma extends Tv{
    public function getModel(){
        return $this->model;
    }
}

$tv=new plazma('abc model',1);
echo $tv->getModel()."\n";
//$tv->model='xyz';       This gives fatal error cannot modify protected variable
$tv->volume=20;           //child object can modify private variable
echo $tv->volume."\n";
?>