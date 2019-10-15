<?php
//interface item_element
interface ItemElement{
    public function accept(ShoppingCartVisitor $visitor);
}
//class book implementing interface item_element
class Book implements ItemElement{
    private $price;
    private $isbnNumber;
    //constructor with input paraments as cost and isbn number
    public function __construct($cost,$isbn){
        $this->price=$cost;
        $this->isbnNumber=$isbn;
    }
    //function to get price of book
    public function get_Price(){
        return $this->price;
    }
    //function to get isbn number of book
    public function get_isbnNumber(){
        return $this->isbnNumber;
    }
    //function calls visit1()
    public function accept(ShoppingCartVisitor $visitor){
        return $visitor->visit1($this);
    }
}
//class fruits implementing interface item_element
class Fruits implements ItemElement{
    private $pricePerKg;
    private $weight;
    private $name;
    //constructor with parameters as price_perkg,weight,name of fruit
    public function __construct($pricekg,$w,$nm){
        $this->pricePerKg=$pricekg;
        $this->weight=$w;
        $this->name=$nm;
    }
    //function to get the price per kg fruit
    public function get_pricePerKg(){
        return $this->pricePerKg;
    }
    //function to get weight in kg
    public function get_weight(){
        return $this->weight;
    }
    //function to get the name of fruit
    public function get_name(){
        return $this->name;
    }
    //function calls visit2()
    public function accept(ShoppingCartVisitor $visitor){
        return $visitor->visit2($this);
    }
}
//interface shoppingcart_visitor
interface ShoppingCartVisitor{
    public function visit1(Book $book);
    public function visit2(Fruits $fruit);
}
//class shoppingcartvisitorImp implementing interface shoppingcartvisitor
class shoppingCartVisitorImp implements ShoppingCartVisitor{
    //function returns the cost of book
    public function visit1(Book $book){
        $cost=0;
        if($book->get_Price()>50){
            $cost=$book->get_Price()-5;
        }
        else{
            $cost=$book->get_Price();
        }
        echo "Book isbnNumber:".$book->get_isbnNumber()." Price:".$cost."\n";
        return $cost;
    }
    //function returns the cost of fruit
    public function visit2(Fruits $fruit){
        $cost=$fruit->get_pricePerKg()*$fruit->get_weight();
        echo $fruit->get_name()." Cost:".$cost."\n";
        return $cost;
    }
}
//client code to do business logic

//create objects of class Book and Fruits
$book1=new Book("50","11071");
$book2=new Book("75","19235");
$fruit1=new Fruits("5","7","Apple");
$fruit2=new Fruits("6","8","Watermelon");
$fruit3=new Fruits("4","6","Pineapple");
$fruit4=new Fruits("9","9","Mango");
//storing all the similar kinds of object into an array item_element
$ItemElement=array($book1,$book2,$fruit1,$fruit2,$fruit3,$fruit4);
echo "Totalprice of Selected items:".calculate_price($ItemElement)."\n";
//function to calculate totalprice 
function calculate_price($ItemElement){
    //creating object $visitor of class ShoppingCartVisitor
    $visitor=new ShoppingCartVisitorImp;
    $sum=0;
    //
	foreach($ItemElement as $items){
	$sum = $sum + $items->accept($visitor);
	}
	return $sum;
}
?>