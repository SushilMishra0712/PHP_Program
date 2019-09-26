<?php
/*A library for reading in 2D arrays of integers, doubles, or booleans
 from standard input and printing them out to standard output.*/

class Array2D{
    //function for integer array
    function arrayInt($rows,$columns){
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                //scan input user for each element
                fscanf(STDIN,"%d",$arrayInt[$i][$j]);
            }
        }
        echo "Elements in Integer Array are:\n";
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                //prints elements of array
                echo $arrayInt[$i][$j]."\t";
            }
            //new line for new row 
            echo "\n";
        }
    }
    //function for double array
    function arrayDouble($rows,$columns){
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                //scan input user for each element
                fscanf(STDIN,"%f",$arrayDouble[$i][$j]);
            }
        }
        echo "Elements in Double Array are:\n";
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                //prints elements of array
                echo $arrayDouble[$i][$j]."\t";
            }
            //new line for new row
            echo "\n";
        }
    }
    //function for boolean array
    function arrayBoolean($rows,$columns){
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                //scan user input for each element
                fscanf(STDIN,"%d",$arrayBoolean[$i][$j]);
            }
        }
        echo "Elements in Boolean Array are:\n";
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                //prints true in array if user enter 1
                if($arrayBoolean[$i][$j]==1)
                {
                    echo "true\t";
                }
                //prints false in array if user enter 0
                elseif($arrayBoolean[$i][$j]==0)
                {
                    echo "false\t";
                }
            }
            //new line for new row
            echo "\n";
        }
    }
}
//create object of class Array2D
$obj=new Array2D;
echo "Enter number of Rows:\n";
fscanf(STDIN,"%d",$rows);
echo "Enter number of Columns:\n";
fscanf(STDIN,"%d",$columns);
echo "\nEnter elements of integer array\n";
//call function arrayInt
$obj->arrayInt($rows,$columns);
echo "\nEnter elements of double array\n";
//call function arrayDouble
$obj->arrayDouble($rows,$columns);
echo "\nEnter elements of boolean array\n1 for true and 0 for false\n";
//call function arrayBoolean
$obj->arrayBoolean($rows,$columns);
?>
