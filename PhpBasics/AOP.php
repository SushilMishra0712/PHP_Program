<?php
//Aspect oriented programming
aop_add_before('MyServices->doAdmin*()','adviceForDoAdmin');
class MyServices
{
    public function doAdminStuff1()
    {
        //some stuff only admin should do
        echo "Calling doAdminStuff1";
    }
    public function doAdminStuff2()
    {
        //some stuff only admin should do
        echo "Calling doAdminStuff2";
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

//session is started & we added the above examples to configure MyServices & basicAdminChecker
$services=new MyServices;
try
{
    $services->doAdminStuff1();
}
catch(Exception $e)
{
    echo "You Cannot access the service,you are not an Admin";
}
//when user_type is admin
$_SESSION['user_type']='admin';
try
{
    $service->doAdminStuff1();
    $service->doAdminStuff2();
}
catch(Exception $e)
{
    //nothing will be caught here,we're an admin
}

?>