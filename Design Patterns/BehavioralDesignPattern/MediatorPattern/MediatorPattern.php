<?php
//Mediator Design Pattern

//interface chat_mediator
interface ChatMediator{
    public function sendMessage($msg,User $user);
    function addUser(User $user);
}
//abstract class user
abstract class User{
    protected $mediator;
    protected $name;
    //constructor with parameter as object of chat_mediator and name of user
    function __construct(ChatMediator $med,$name){
        $this->mediator=$med;
        $this->name=$name;
    }
    //abstract function send and receive
    abstract function send($msg);
    abstract function receive($msg);
}
//class chat_mediatorImp implementing interface chat_mediator
class ChatMediatorImp implements ChatMediator{
    public $users;
    //constructor initializes array to store objects of user
    function __construct(){
        $this->users=array();
    }
    //function to add users in array
    function addUser(User $user){
    array_push($this->users,$user);
    }
    //function to send message to all other users
    function sendMessage($msg,User $user){
        foreach($this->users as $u){
            //except sender all other users should receive message
            if($u!=$user){
                $u->receive($msg);
            }
        }
    }
}
//class userImp extends abstract class User
class UserImp extends User{
    ////constructor with parameter as object of chat_mediator and name of user
    function __construct(ChatMediator $med,$name){
        $this->med=$med;
        $this->name=$name;
    }
    //function to send message
    function send($msg){
        echo $this->name." Sending Message:".$msg."\n";
        $this->med->sendMessage($msg,$this);
    }
    //function to receive message
    function receive($msg){
        echo $this->name." Received Message:".$msg."\n";
    }
}
//create object of class chatmediatorImp
$mediator=new ChatMediatorImp;
//creat objects of class UserImp
$user1=new UserImp($mediator,"Pankaj");
$user2=new UserImp($mediator,"Rohit");
$user3=new UserImp($mediator,"Lalit");
$user4=new UserImp($mediator,"Lisa");
//add objects of UserImp into array $users
$mediator->addUser($user1);
$mediator->addUser($user2);
$mediator->addUser($user3);
$mediator->addUser($user4);
//user1 sends message to all other users
$user1->send("Hi All");
echo "\n";
//user2 sends message to all other users
$user2->send("Bye");
?>
