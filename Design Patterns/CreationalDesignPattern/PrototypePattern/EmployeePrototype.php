<?php
//Prototype Design Pattern Example
//abstract class BookPrototype
abstract class EmployeePrototype{
    protected $fullname;
    protected $department;
    //abstract function
    abstract function __clone();
    function getFullname(){
        return $this->fullname;
    }
    function setFullname($nameIn){
        $this->fullname=$nameIn;
    }
    function getDepartment(){
        return $this->department;
    }
}
//subclass AccountsPrototype
class AccountsPrototype extends EmployeePrototype{
    function __construct(){
        $this->department='Accounts';
    }
    //clone function for php
    function __clone(){
    echo "Clone of Accounts Prototype created\n";
    }
}
//subclass HRPrototype
class HRPrototype extends EmployeePrototype{
    function __construct(){
        $this->department='HR';
    }
    //clone function forsql
    function __clone(){
    echo "Clone of HR Prototype created\n";
    }
}

writeln("Begin Prototype Pattern");
writeln("");
//create an objects of sub classes
$accounts_Proto=new AccountsPrototype;
$hr_Proto=new HRPrototype;
//clone the first object
$emp1=clone $accounts_Proto;
$emp1->setFullname("Ryan David");
writeln("Emp 1 name:".$emp1->getFullname());
writeln("Emp 1 department:".$emp1->getDepartment());
writeln("");
//clone the second object
$emp2=clone $hr_Proto;
$emp2->setFullname("Nitesh Patil");
writeln("Emp 2 name:".$emp2->getFullname());
writeln("Emp 2 department:".$emp2->getDepartment());
writeln("");
//clone the second object
$emp3=clone $accounts_Proto;
$emp3->setFullname("Rahul Pal");
writeln("Emp 3 name:".$emp3->getFullname());
writeln("Emp 3 department:".$emp3->getDepartment());
writeln("");

writeln("End Prototype Pattern");
//function to echo
function writeln($line_in){
    echo $line_in."\n";
}
?>