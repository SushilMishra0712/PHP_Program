<?php
//Regular Expression Demonstration
//use preg_replace($reg_exp,$replacement,$string)
class RegularExpression{
    //function to replace user input data
    function replaceData(){
        //message template
        $message="Hello <<name>>, We have your full name as <<full name>> 
in our system. Your contact number is 91-xxxxxxxxxx.
Please,let us know in case of any clarification. 
Thank you BridgeLabz 01-01-2016.";
        //user input details
        echo "Enter first name\n";
        fscanf(STDIN,"%s",$firstname);
        echo "Enter last name\n";
        fscanf(STDIN,"%s",$lastname);
        echo "Enter contact number\n";
        $fullname=$firstname." ".$lastname;
        fscanf(STDIN,"%s",$contact);
        //get the current date
        $currentdate=date("d/m/Y");
        // echo $currentdate."\n";
        
        //use preg_replace function 
        $result=preg_replace("/<<name>>/",$firstname,$message);
        $result=preg_replace("/<<full name>>/",$fullname,$result);
        $result=preg_replace("/xxxxxxxxxx/",$contact,$result);
        // $result=preg_replace("/^[0-3][0-9]-[0-1][0-9]-[0-9]{4}$/",$currentdate,$result);
        $result=preg_replace("/01-01-2016/",$currentdate,$result);
        //print the modified message
        echo $result."\n";
    }
}
//create object of class RegularExpression
$object=new RegularExpression;
//call the function replaceData()
$object->replaceData();
?>