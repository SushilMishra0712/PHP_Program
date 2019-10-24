<?php
//Aspect oriented programming
// aop_add_before('MyServices->doAdmin*()','adviceForDoAdmin');
session_start();
class MyServices
{
    public function doAdminStuff1()
    {
        //some stuff only admin should do
        echo "Calling doAdminStuff1<br>";
    }
    public function doAdminStuff2()
    {
        //some stuff only admin should do
        echo "Calling doAdminStuff2<br>";
    }
}
//this is called advice
function adviceForDoAdmin()
{
    if((!isset($_SESSION['user_type'])) || ($_SESSION['user_type']!=='admin'))
    {
        throw new Exception('Sorry,you should be an admin to do this');
    }
}
$_SESSION['user-type']=null;
//session is started & we added the above examples to configure MyServices & basicAdminChecker
$services=new MyServices;
try
{   if($_SESSION['user-type']=='admin')
    {
       $services->doAdminStuff1();
    }
    else
    {
       echo "You Cannot access the service,you are not an Admin<br>";
    }
}
catch(Exception $e)
{
    echo "You Cannot access the service,you are not an Admin<br>";
}
//when user_type is admin
$_SESSION['user_type']='admin';
try
{
    $services->doAdminStuff1();
    $services->doAdminStuff2();
}
catch(Exception $e)
{
    //nothing will be caught here,we're an admin
}

?>