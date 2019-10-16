<?php
//PHP Constants
/* A constant is an identifier(name) for a simple value.The
value cannot be changed during the script.A valid constant
name starts with a letter or underscore */
define("GREETING","Welcome to W3Schools.com!");
echo GREETING."\n";
//The example below creates a constant with a case-insensitive name:
define("Fundoo","Welcome to Fundoo Notes!",true);
echo fundoo."\n";
//Constants are Automatically Global and can be used across the entire Script.
define("Fundoo1","This is an example of php constant");
function myTest(){
    echo Fundoo1."\n";
}
myTest();
echo Fundoo1."\n";
?>