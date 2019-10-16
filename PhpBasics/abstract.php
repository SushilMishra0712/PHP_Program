<?php
abstract class BaseEmployee{
    protected $firstname;
    protected $lastname;
    public function getFullName(){
        return $this->firstname." ".$this->lastname;
    }
    public abstract function getMonthlySalary();  //abstract function
    public function __construct($f,$l){
        $this->firstname=$f;
        $this->lastname=$l;
    }
}
class FullTimeEmployee extends BaseEmployee{
    protected $annualsalary=300000;
    public function getMonthlySalary(){
        return $this->annualsalary/12;
    }
}
class ContractEmployee extends BaseEmployee{
    protected $hourlyrate=200;
    protected $totalhours=240;
    public function getMonthlySalary(){
        return $this->hourlyrate*$this->totalhours;
    }
}
$fulltime=new FullTimeEmployee('Fulltime','Employee');
$contract=new ContractEmployee('Contract','Employee');
echo $fulltime->getFullName()."\n";
echo $contract->getFullName()."\n";
echo $fulltime->getMonthlySalary()."\n";
echo $contract->getMonthlySalary()."\n";
?>