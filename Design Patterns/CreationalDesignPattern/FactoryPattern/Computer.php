<?php
//interface class Computer
interface Computer{
public function getInfo();
}
//class PC implements interface
class PC implements Computer{
    private $RAM;
    private $HDD;
    private $CPU;
    //public constructor
    public function PC($ram,$hdd,$cpu){
        $this->RAM=$ram;
        $this->HDD=$hdd;
        $this->CPU=$cpu;
    }
    public function getRAM(){
        return $this->RAM;
    }
    public function getHDD(){
        return $this->HDD;
    }
    public function getCPU(){
        return $this->CPU;
    }
    //function to get info of pc
    public function getInfo(){
        echo "PC is created\n";
        echo "Ram of Pc is:".PC::getRAM()."\n";
        echo "Hdd of Pc is:".PC::getHDD()."\n";
        echo "Cpu of Pc is:".PC::getCPU()."\n";
    }
}
//class Server implements interface
class Server implements Computer{
    private $RAM;
    private $HDD;
    private $CPU;
    //public constructor
    public function Server($ram,$hdd,$cpu){
        $this->RAM=$ram;
        $this->HDD=$hdd;
        $this->CPU=$cpu;
    }
    public function getRAM(){
        return $this->RAM;
    }
    public function getHDD(){
        return $this->HDD;
    }
    public function getCPU(){
        return $this->CPU;
    }
    //function to get info of sever
    public function getInfo(){
        echo "Server is created\n";
        echo "Ram of Server is:".Server::getRAM()."\n";
        echo "Hdd of Server is:".Server::getHDD()."\n";
        echo "Cpu of Server is:".Server::getCPU()."\n";
    }
}
//class Laptop implements interface
class Laptop implements Computer{
    private $RAM;
    private $HDD;
    private $CPU;
    //public constructor
    public function Laptop($ram,$hdd,$cpu){
        $this->RAM=$ram;
        $this->HDD=$hdd;
        $this->CPU=$cpu;
    }
    public function getRAM(){
        return $this->RAM;
    }
    public function getHDD(){
        return $this->HDD;
    }
    public function getCPU(){
        return $this->CPU;
    }
    //function to get info of laptop
    public function getInfo(){
        echo "Laptop is created\n";
        echo "Ram of Laptop is:".Laptop::getRAM()."\n";
        echo "Hdd of Laptop is:".Laptop::getHDD()."\n";
        echo "Cpu of Laptop is:".Laptop::getCPU()."\n";
    }
}
//factory class 
class ComputerFactory{
    public static function createComputer($computer_type,$ram,$hdd,$cpu){
        switch($computer_type){
            case "PC":
            $comp_object=new PC($ram,$hdd,$cpu);
            $comp_object->getInfo();
            break;
            case "Server":
            $comp_object=new Server($ram,$hdd,$cpu);
            $comp_object->getInfo();
            break;
            case "Laptop":
            $comp_object=new Laptop($ram,$hdd,$cpu);
            $comp_object->getInfo();
        }
    }
}
//create object of class ComputerFactory
$object=new ComputerFactory;
//call the function by giving parameters
$object->createComputer("PC","4GB","256GB","Intel Core 2 Duo");
$object->createComputer("Server","32GB","1TB","Am Ryzen7 2700x");
$object->createComputer("Laptop","4GB","512GB","Intel Core");
?>
