<?php
//Observer Design Pattern
//abstract observer class
abstract class AbstractObserver{
    //abstract function update
    abstract function update(AbstractSubject $subject_in);
}
//abstract subject class
abstract class AbstractSubject{
    //abstract functions register,unregister,notify
    abstract function register(AbstractObserver $object_in);
    abstract function unregister(AbstractObserver $object_in);
    abstract function notify();
}
//function writeln to echo
function writeln($write_ln){
    echo $write_ln."\n";
}
//Observer class 
class PatternObserver extends AbstractObserver{
    public function __construct(){

    }
    //function update
    public function update(AbstractSubject $subject_in){
        writeln('IN PATTERN OBSERVER-NEW PATTERN ALERT');
        writeln('new favourite patterns:'.$subject_in->getFavorites());
        writeln('IN PATTERN OBSERVER-PATTERN GOSSIP ALERT OVER');
    }
}
//Subject class
class PatternSubject extends AbstractSubject{
    private $favorites=NULL;
    //array to store objects of Observer class
    private $observers=array();
    function __construct(){

    }
    //function register to add objects in array
    function register(AbstractObserver $observer_in){
        array_push($this->observers,$observer_in);
    }
    //function unregister to remove objects from array
    function unregister(AbstractObserver $observer_in){
        foreach($this->observers as $okey=>$oval){
            if($oval==$observer_in){
                unset($this->observers[$okey]);
                // array_pop($this->observers);
            }
        }
    }
    function notify(){
        foreach($this->observers as $obs){
            $obs->update($this);
        }
    }
    function updateFavorites($newFavorites){
        $this->favorites=$newFavorites;
        $this->notify();
    }
    function getFavorites(){
        return $this->favorites;
    }
}
writeln('BEGIN OBSERVER PATTERN');
writeln('');
//create objects of Observer class and pass it into functions of class Subject
$patternGossiper=new PatternSubject;
$patternGossipFan=new PatternObserver;
$patternGossipFan2=new PatternObserver;
$patternGossipFan3=new PatternObserver;
//pass objects of observer class into register and unregister function to add or remove
$patternGossiper->register($patternGossipFan);
$patternGossiper->updateFavorites('abstract factory,decorator,visitor');
$patternGossiper->register($patternGossipFan2);
$patternGossiper->updateFavorites('abstract factory,observer,decorator');
$patternGossiper->unregister($patternGossipFan2);
$patternGossiper->register($patternGossipFan3);
$patternGossiper->updateFavorites('abstract factory,observer,paisley');
//end the pattern 
writeln('');
writeln('END OBSERVER PATTERN');
?>