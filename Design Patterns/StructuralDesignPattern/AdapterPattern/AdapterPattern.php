<?php
//Adapter Pattern Example 
//The target defines the domain-specific interface used by the client code
class Target{
    public function request():string{
        return "Target:The default target's behavior\n";
    }
}
//The adaptee contains some useful behavior but its interface is incompatible with the existing client code
class Adaptee{
    public function specificRequest():string{
        return "neetpadA eht fo roivaheb laicepS";
    }
}
//The adapter makes the adaptee's interface compatible with the Target's interface
class Adapter extends Target{
    private $adaptee;
    //dependency injection
    public function __construct(Adaptee $adaptee){
        $this->adaptee=$adaptee;
    }
    public function request():string{
        return "Adapter:(Translated)".strrev($this->adaptee->specificRequest());
    }
}

//The Client code supports all classes that follows the Target interface
function clientCode(Target $target){
echo $target->request();
}
//call request function of class Target
echo "Client:I work just fine with the Target objects\n";
$target=new Target;
clientCode($target);
//call specificRequest function of class Adaptee
$adaptee=new Adaptee;
echo "Client:The Adaptee class has a weird interface\n";
echo "Adaptee:".$adaptee->specificRequest();
//call request function of class Adapter
echo "\nClient:But I can work with it via Adapter\n";
$adapter=new Adapter($adaptee);
clientCode($adapter);
echo "\n";

?>