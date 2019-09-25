<?php
class Array2D{
    function arrayInt($rows,$columns){
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                fscanf(STDIN,"%d",$arrayInt[$i][$j]);
            }
        }
        echo "Elements in Integer Array are:\n";
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                echo $arrayInt[$i][$j]."\t";
            }
            echo "\n";
        }
    }
    function arrayDouble($rows,$columns){
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                fscanf(STDIN,"%f",$arrayDouble[$i][$j]);
            }
        }
        echo "Elements in Double Array are:\n";
        for($i=0;$i<$rows;$i++){
            for($j=0;$j<$columns;$j++){
                echo $arrayDouble[$i][$j]."\t";
            }
            echo "\n";
        }
    }
}
$obj=new Array2D;
echo "Enter number of Rows:\n";
fscanf(STDIN,"%d",$rows);
echo "Enter number of Columns:\n";
fscanf(STDIN,"%d",$columns);
echo "\nEnter elements of integer array\n";
$obj->arrayInt($rows,$columns);
echo "\nEnter elements of double array\n";
$obj->arrayDouble($rows,$columns);
?>
