<?php
//Proxy Pattern Example

//interface Subject having functions
interface Subject{
    public function request():void;
}
//class RealSubject
class RealSubject implements Subject{
    public function request():void{
        echo "RealSubject:Handling requests\n";
    }
}
//class Proxy
class Proxy implements Subject{
    private $realSubject;
    //dependency injection
    public function __construct(RealSubject $realSubject){
        $this->realSubject=$realSubject;
    }
    public function request():void{
        if($this->checkAccess()){
            $this->realSubject->request();
            $this->logAccess();
        }
    }
    private function checkAccess():bool{
    echo "Proxy:Checking access prior to firing a real request\n";
    return true;
    }
    private function logAccess():void{
        echo "Proxy:Logging the time of request\n";
    }
}
//client code
function clientCode(Subject $subject){
    $subject->request();
}

//call function clientCode with object of RealSubject class
echo "Client:Executing the client code with a real Subject:\n";
$realSubject=new RealSubject;
clientCode($realSubject);

//call function clientCode with object of Proxy class
echo "Client:Executing the same client code with a proxy:\n";
$proxy=new Proxy($realSubject);
clientCode($proxy);

?>