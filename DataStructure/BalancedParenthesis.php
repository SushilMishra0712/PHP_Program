<?php
 require("Stack.php");
 //object of stack
 $st = new Stack();
 //take arithmetic expression from user and split it into array
 $arr = str_split(readline("Enter Arithmetic Expression: "),1);
 //access element one by one
 foreach ($arr as $key) {
     //if t get open parentheses then it will push in the stack
     if ($key == "(" || $key=="{" || $key=="[") {
         $st->push($key);
     }
     //else if it get close parentheses then pop
     elseif ($key == ")" || $key=="}" || $key=="]") {
         if ($st->isEmpty()) {
             echo "not balace\n";
            return;
         }
         $st->pop();
     }
 }
 //int the end if stack is empty then parentheses is balance else not balance
 if ($st->isEmpty()) {
     echo "balance\n";
 }else {
     echo "not balace\n";
 }
 
?>
