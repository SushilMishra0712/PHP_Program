<?php
class User{
    protected $loggedIn=false;
    protected $data=[];
    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data=$data;
    }
    public function isLoggedIn(){
        return $this->loggedIn;
    }
}
//create object of ReflectionClass
$rc=new ReflectionClass('User');
//all the class methods are show in array
echo ' '.print_r(get_class_methods($rc),true);
if($rc->hasMethod('isLoggedIn')){
    echo "Class User has function isLoggedIn()\n";
}
//methods related to function getData
$rm_getData=new ReflectionMethod('User','getData');
echo ' '.print_r(get_class_methods($rm_getData),true);
//methods related to function setData
$rm_setData=new ReflectionMethod('User','setData');
echo ' '.print_r(get_class_methods($rm_setData),true);
//methods related to function isLoggedIn
$rm_isloggedIn=new ReflectionMethod('User','isLoggedIn');
echo ' '.print_r(get_class_methods($rm_isloggedIn),true);
?>
