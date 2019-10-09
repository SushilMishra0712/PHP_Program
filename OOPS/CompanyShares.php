<?php
require "Linkedlist.php";
//List of CompanyShares in a Linked List
class CompanyShares{
    public $object;
    public $associate_array;
    public $userinput_array;
    //function constructor to initialize
    function __construct(){
        $this->object=$object;
        $this->associate_array=array();
        $this->userinput_array=array();
    }
    //function to get contents of company shares from json file
    function get_content(){
        $jsonfile_content=file_get_contents("CompanyShares.json");
        $array=json_decode($jsonfile_content,true);
        //create object of class Linkedlist
        $this->object=new Linkedlist;
        //use associative to store company shares into key i.e 0,1,2,3...
        $this->associate_array=array("0"=>$array["Book"],"1"=>$array["Newspaper"],"2"=>$array["Magzines"],"3"=>$array["Article"]);
        // for loop to add all the company shares into the list
        for($i=0;$i<count($array);$i++){
        $this->object->add($this->associate_array[$i]);
        }
    }
    //function to show the contents of linkedlist
    function show_content(){
        $this->object->show();
    }
    //function to add new share from user input
    function addnew_share(){
        echo "Enter share name:\n";
        fscanf(STDIN,"%s",$name);
        echo "How many category ".$name." has?\n";
        fscanf(STDIN,"%d",$num);
        for($i=0;$i<$num;$i++){
            echo "Enter symbol:\n";
            fscanf(STDIN,"%s",$symbol);
            echo "Enter number of shares:\n";
            fscanf(STDIN,"%d",$no_of_shares);
            echo "Enter price:\n";
            fscanf(STDIN,"%d",$price);
            //store input details in userinput_array
            $this->userinput_array[$name][$i][$symbol]=$symbol;
            $this->userinput_array[$name][$i][$no_of_shares]=$no_of_shares;
            $this->userinput_array[$name][$i][$price]=$price;
        }
        //add the details in linkedlist
        $this->object->add($userinput_array);
    }
    //function to remove the share from the linkedlist
    function remove_share(){
        echo "Which share you want to remove?\n";
        fscanf(STDIN,"%s",$remove);
        //if want to remove from already stored companyshare
        switch($remove){
        case 'Book':
        $this->object->remove($this->associate_array["0"]);
        echo "Book share is Removed\n";
        break;
        case 'Newspaper':
        $this->object->remove($this->associate_array["1"]);
        echo "Newspaper share is Removed\n";
        break;
        case 'Magzines':
        $this->object->remove($this->associate_array["2"]);
        echo "Magzines share is Removed\n";
        break;
        case 'Article':
        $this->object->remove($this->associate_array["3"]);
        echo "Article share is Removed\n";
        }
        //if want to remove from newly added companyshare
        $this->object->remove($this->userinput_array["$remove"]);
        echo $remove." share is removed\n";
    }
    
}
//create object of class CompanyShares
$object_companyshares=new CompanyShares;
//call function get_content to read from json file
$object_companyshares->get_content();
$loop=1;
//while loop to take user input till user exits program
while($loop>0){
    echo "Enter 1 to Check Company Shares\nEnter 2 to add new Share\nEnter 3 to remove share\nEnter 4 to Exit\n";
    fscanf(STDIN,"%d",$choice);
    switch($choice){
    //to view all the company shares of linkedlist
    case 1:
    $object_companyshares->show_content();
    break;
    //to add user input shares
    case 2:
    $object_companyshares->addnew_share();
    break;
    //to remove share from linkedlist
    case 3:
    $object_companyshares->remove_share();
    break;
    //to exit the program
    case 4:
    exit(0);
    }
    echo "\n";
}
?>