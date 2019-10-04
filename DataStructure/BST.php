<?php
//Number of Binary Search Tree
class BST{
    public $total;
    function __construct()
    {
        $this->total = null;
    }
    //function searchTree to search possible tree
    function searchTree(){
        $total=array();
        $total[0]=1;
        $total[1]=1;
        $number;
        //user input number
        echo "Enter number of nodes:";
        fscanf(STDIN,"%d/n",$number);
        for($i=2;$i<=$number;$i++)
        {
            $total[$i]=0;
            for($j=0;$j<$i;$j++)
            {   
                //cathlon formula for search node
                $total[$i]+=$total[$j]*$total[$i-$j-1];
            }
        }
        $this->total = $total[$number];
    }
    //function to display the result
    function display()
    {
        echo  "Number of possible binary tree can be:".$this->total."\n";
    }
}
//create object of class BST
$object_BST=new BST;
//call the function searchTree
$object_BST->searchTree();
//call function display
$object_BST->display();

?>