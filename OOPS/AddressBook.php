<?php
//Address Book program
class AddressBook{
    //declare the variables and arrays
    public $firstname;
    public $lastname;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phone_number;
    public $user_details_array;
    public $addressbook_array;
    //constructor to initialize the variables and arrays
    function __construct(){
        $this->firstname=null;
        $this->lastname=null;
        $this->address=null;
        $this->city=null;
        $this->state=null;
        $this->zip=null;
        $this->phone_number=null;
        $this->user_details_array=array();
        $this->addressbook_array=array();
    }
    //function to add new contact details from user input
    function add(){
        echo "Enter first name:\n";
        fscanf(STDIN,"%s",$this->firstname);
        echo "Enter last name:\n";
        fscanf(STDIN,"%s",$this->lastname);
        echo "Enter Address:\n";
        fscanf(STDIN,"%s",$this->address);
        echo "Enter City:\n";
        fscanf(STDIN,"%s",$this->city);
        echo "Enter State:\n";
        fscanf(STDIN,"%s",$this->state);
        echo "Enter Zip:\n";
        fscanf(STDIN,"%d",$this->zip);
        echo "Enter phone number:\n";
        fscanf(STDIN,"%d",$this->phone_number);
        //read the json file AddressBook.json
        $jsonfile_content=file_get_contents("AddressBook.json");
        $this->addressbook_array=json_decode($jsonfile_content,true);
        //store user entered details in user_details_array
        $this->user_details_array=array("Firstname"=>$this->firstname,"Lastname"=>$this->lastname,"Address"=>$this->address,
        "City"=>$this->city,"State"=>$this->state,"Zip"=>$this->zip,"PhoneNumber"=>$this->phone_number);
        //push the entered details into addressbook_array
        array_push($this->addressbook_array,$this->user_details_array);
    }
    //function to save updated details into json file
    function save_AddressBook(){
        $result=file_put_contents("AddressBook.json",json_encode($this->addressbook_array));
        if(!$result){
            echo "Nothing to print in AddressBook\n";
        }
        else{
            echo "AddressBook Updated Successfully\n";
        }
    }
    //function to edit the existing contact details
    function edit(){
        //read AddressBook.json file
        $jsonfile_content=file_get_contents("AddressBook.json");
        $this->addressbook_array=json_decode($jsonfile_content,true);
        echo "Enter first name whose details you want to edit:\n";
        fscanf(STDIN,"%s",$first_name);
        echo "Enter last name whose details you want to edit:\n";
        fscanf(STDIN,"%s",$last_name);
        //match name with all the contacts to edit
        for($i=0;$i<count($this->addressbook_array);$i++){
            //if match found
            if($first_name==$this->addressbook_array[$i]["Firstname"] && $last_name==$this->addressbook_array[$i]["Lastname"]){
               echo "Which details do you want to edit?\n";
               echo "Enter 1 for firstname\nEnter 2 for lastname\nEnter 3 for Address\nEnter 4 for City\nEnter 5 for State\nEnter 6 for Zip\nEnter 7 for PhoneNumber\n";
               fscanf(STDIN,"%d",$reponse);
               switch($reponse){
                   case 1:
                   echo "Enter new Firstname:\n";
                   fscanf(STDIN,"%s",$new_firstname);
                   $this->addressbook_array[$i]["Firstname"]=$new_firstname;
                   break;
                   case 2:
                   echo "Enter new Lastname:\n";
                   fscanf(STDIN,"%s",$new_lastname);
                   $this->addressbook_array[$i]["Lastname"]=$new_lastname;
                   break;
                   case 3:
                   echo "Enter new Address:\n";
                   fscanf(STDIN,"%s",$new_address);
                   $this->addressbook_array[$i]["Address"]=$new_address;
                   break;
                   case 4:
                   echo "Enter new City:\n";
                   fscanf(STDIN,"%s",$new_city);
                   $this->addressbook_array[$i]["City"]=$new_city;
                   break;
                   case 5:
                   echo "Enter new State:\n";
                   fscanf(STDIN,"%s",$new_state);
                   $this->addressbook_array[$i]["State"]=$new_state;
                   break;
                   case 6:
                   echo "Enter new Zip:\n";
                   fscanf(STDIN,"%s",$new_zip);
                   $this->addressbook_array[$i]["Zip"]=$new_zip;
                   break;
                   case 7:
                   echo "Enter new PhoneNumber:\n";
                   fscanf(STDIN,"%s",$new_phone_number);
                   $this->addressbook_array[$i]["PhoneNumber"]=$new_phone_number;
               }
              
            }
            //if match does not found
            else{
                echo "Sorry Name does not Match\n";
            }
        }
        
    }
    //function to delete particular contact
    function delete(){
        //read AddressBook.json file
        $jsonfile_content=file_get_contents("AddressBook.json");
        $this->addressbook_array=json_decode($jsonfile_content,true);
        echo "Enter first name whose details you want to delete:\n";
        fscanf(STDIN,"%s",$first_name);
        echo "Enter last name whose details you want to delete:\n";
        fscanf(STDIN,"%s",$last_name);
        //match name with all the contacts
        for($i=0;$i<count($this->addressbook_array);$i++){
            //if match found
            if($first_name==$this->addressbook_array[$i]["Firstname"] && $last_name==$this->addressbook_array[$i]["Lastname"]){
               //use unset function to remove particular element
               unset($this->addressbook_array[$i]);
               $temp=array_values($this->addressbook_array);
               //use array_values for re-indexing
               $this->addressbook_array=array_values($temp);
            }
            //if match not found
            else{
                echo "Sorry Name does not match\n";
            }
        }
    }
    //function to sort contacts by name in json file
    function sortbyName(){
        //read the AddressBook.json file
        $jsonfile_content=file_get_contents("AddressBook.json");
        $this->addressbook_array=json_decode($jsonfile_content,true);
        //use asort function to sort array by a value
        asort($this->addressbook_array);
        print_r($this->addressbook_array);
    }
    //function to sort contacts by zip in json file
    function sortbyZip(){
        //read the AddressBook.json file
        $jsonfile_content=file_get_contents("AddressBook.json");
        $this->addressbook_array=json_decode($jsonfile_content,true);
        $zip_array=array();
        //first sort the zip values and store it in zip_array
        for($i=0;$i<count($this->addressbook_array);$i++){
        array_push($zip_array,$this->addressbook_array[$i]["Zip"]);
        }
        sort($zip_array);
        //push sorted addressbook_array by zip into temp array
        $temp=array();
        for($j=0;$j<count($zip_array);$j++){
            for($i=0;$i<count($this->addressbook_array);$i++){
                if($zip_array[$j]==$this->addressbook_array[$i]["Zip"]){
                    array_push($temp,$this->addressbook_array[$i]);
                }
            }
        }
        //use array_values function for re-indexing
        $this->addressbook_array=array_values($temp);
        print_r($this->addressbook_array);
    }
}
//create an object of class AddressBook
$object_addressbook=new AddressBook;
$loop=1;
//while loop for user enter options
while($loop>0){
    echo "Enter 1 to Add\nEnter 2 to save in AddressBook\nEnter 3 to Edit\nEnter 4 to Delete\nEnter 5 to Sort by Name\nEnter 6 to Sort by Zip\nEnter 7 to Exit\n";
    fscanf(STDIN,"%d",$reponse);
    switch($reponse){
        //to add new contact
        case 1:
        $object_addressbook->add();
        break;
        //to save update in json file 
        case 2:
        $object_addressbook->save_AddressBook();
        break;
        //to edit existing contacts
        case 3:
        $object_addressbook->edit();
        break;
        //to delete particular contact 
        case 4:
        $object_addressbook->delete();
        break;
        //to sort contacts by name
        case 5:
        $object_addressbook->sortbyName();
        break;
        //to sort contacts by zip
        case 6:
        $object_addressbook->sortbyZip();
        break;
        //to exit the program
        case 7:
        exit(0);
        echo "\n";
    }
}
?>