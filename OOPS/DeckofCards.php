<?php
//Deck of Cards programs
class DeckofCards{
    //declare all the arrays as private
    private $cards_array;
    private $totalcard_array;
    private $player_array;
    //constructor to initialize all the arrays
    function __construct(){
        $this->cards_array=array();
        $this->totalcard_array=array();
        $this->player_array=array();
    }
    //function to print all the 52 cards
    function play_cards(){
        $this->cards_array=array(
        array(array("Clubs","Diamonds","Hearts","Spades"),"2","3","4","5","6","7","8","9","10","King","Queen","Jack","Ace"));
        $this->totalcard_array=array();
        for($i=0;$i<4;$i++){
            for($j=1;$j<14;$j++){
            //temp_array to store each card
            $temp_array=array($this->cards_array[0][0][$i],$this->cards_array[0][$j]);
            //push each cards into totalcard_array
            array_push($this->totalcard_array,$temp_array);
            }
        }
        //print all the 52 cards of array
        print_r($this->totalcard_array);
    }
    //function to distribute 9 cards to 4 players
    function distribute_cards(){
        $this->player_array=array(array("Player1"),array("Player2"),array("Player3"),array("Player4"));
        for($i=0;$i<4;$i++){
            for($j=0;$j<9;$j++){
            $random_distribute=rand(0,51);
                if(!in_array($this->totalcard_array[$random_distribute],$this->player_array)){
                array_push($this->player_array[$i],$this->totalcard_array[$random_distribute]);
                }
            }
        }
        echo "Cards distributed to all players\n\n";
    }
    //function to print the cards of 4 players
    function print_cards(){
    print_r($this->player_array);
    }
}
//create object of class DeckofClass
$object=new DeckofCards;
$loop=1;
//while loop to execute until user exit the program
while($loop>0){
    echo "Enter 1 to play deck of cards\nEnter 2 to shuffle and distribute cards\nEnter 3 to print cards of players\nEnter 4 to exit\n";
    fscanf(STDIN,"%d",$response);
    switch($response){
        //to print the total deck of cards
        case 1:
        $object->play_cards();
        break;
        //to shuffle and distribute cards
        case 2:
        $object->distribute_cards();
        break;
        //to print cards of each players
        case 3:
        $object->print_cards();
        break;
        //to exit the program
        case 4:
        exit(0);
        echo "\n";
    }
}
?>


