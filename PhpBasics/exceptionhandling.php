<?php
echo "Enter first number:\n";
fscanf(STDIN,"%d",$first_number);
echo "Enter second number:\n";
fscanf(STDIN,"%d",$second_number);
try{
    if($second_number==0)
    throw new Exception("Division by zero\n");
    $result=$first_number/$second_number;
    echo "Result:".round($result,2)."\n";
}
catch(Exception $e){
    echo $e->getMessage();
}
?>