<?php
//User Input and Replace String Template “Hello <<UserName>>, How are you?” 

class ReplaceString{
    function userName($name){
        //String template
        $str="Hello <<Username>>, How are you?";
        //Username should not be less than 3 characters
        $len=strlen("$name");
        if($len<"3"){
            echo "Username should have minimum 3 character"."\n";
        }
        //Replace <<Username>> with entered name
        else{
        echo str_replace("<<Username>>","$name",$str)."\n";
        }
    }
}
//Create object of ReplaceString class
$obj=new ReplaceString;
echo "Enter Username:"."\n";
//Scan username and put into $name variable
fscanf(STDIN,"%s",$name);
//Call function userName of the class
$obj->userName($name);
?>