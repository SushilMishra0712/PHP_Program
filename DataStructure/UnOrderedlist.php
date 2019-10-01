<?php
//unordered list abstract data type
class listnode{
    public $data;
    public $next;
    function __construct($data){
        $this->data=$data;
        $this->next=null;
    }
    public function readNode(){
        return $this->data;
    }
}
class UnOrderedlist{
    private $firstNode;
    private $lastNode;
    private $count;
    function __construct(){
        $this->firstNode=null;
        $this->lastNode=null;
    }
    //function to search string data
    public function search($data)
    {
        //temp to hold head node
        $temp = $this->firstNode;
        //for loop to check data one by one 
         for ($i=0; $i < $this->count; $i++) { 
           //if temp data is equal to data in it will return true
           if ($temp->data == $data) {
                return true;
            }
            $temp = $temp->next;
        }
            return false;
    }
    //finds list is empty or not
    public function isEmpty(){
        return $this->firstNode=null;
    }
    //add new string data at start
    public function addFirst($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;
 
        /* If this is the first node inserted in the list
           then set the lastNode pointer to it.
        */
        if($this->lastNode == NULL)
            $this->lastNode = &$link;
 
        $this->count++;
    }
    //add the new string data at end 
    public function add($data)
    {
        if($this->firstNode != NULL)
        {
            $link = new ListNode($data);
            $this->lastNode->next = $link;
            $link->next = NULL;
            $this->lastNode = &$link;
            $this->count++;
        }
        else
        {
            $this->addFirst($data);
        }
    }
    //removes first word 
    public function removeFirst()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;
        if($this->firstNode != NULL)
            $this->count--;
 
        return $temp;
    }
    //removes last item
    public function pop()         
    {
        if($this->firstNode != NULL)
        {
            if($this->firstNode->next == NULL)
            {
                $this->firstNode = NULL;
                $this->count--;
            }
            else
            {
                $previousNode = $this->firstNode;
                $currentNode = $this->firstNode->next;
 
                while($currentNode->next != NULL)
                {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }
 
                $previousNode->next = NULL;
                $this->count--;
            }
        }
    }
    //removes selective data
    public function remove($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;
 
        while($current->data != $key)
        {
            if($current->next == NULL)
                return NULL;
            else
            {
                $previous = $current;
                $current = $current->next;
            }
        }
 
        if($current == $this->firstNode)
         {
              if($this->count == 1)
               {
                  $this->lastNode = $this->firstNode;
               }
               $this->firstNode = $this->firstNode->next;
        }
        else
        {
            if($this->lastNode == $current)
            {
                 $this->lastNode = $previous;
             }
            $previous->next = $current->next;
        }
        $this->count--;  
    }
    //prints all the words of the list
    public function readNode()
    {
        $current = $this->firstNode;
        while($current!= null)
        {
            echo $current->readNode()."\n";
            $current = $current->next;
        }
        echo "\n";
    }
    //prints the size
    public function size()
    {
        echo "size is:".$this->count."\n";
    }

}
//create object of class UnOrderedlist
$obj=new UnOrderedlist;
$string='';
$fp = fopen('word.txt', "r"); //open file in read mode    
$string= fread($fp,filesize('word.txt')); //concate charecter in the file at the string 
echo "\n";
$arr = explode(" ", $string);
//store the words in temporary array
for($i=0;$i<count($arr);$i++){
    $obj->add($arr[$i]);
}
//perform functions in list of words
echo "list of word in file\n";
$obj->readNode();
$obj->size();
echo "after removing bablu from list\n";
$obj->remove("bablu");
$obj->add("danny");
$obj->add("samar");
$obj->readNode();
$obj->add("rahul");
$obj->readNode();
echo "pop operation performed\n\n";
$obj->pop();
echo "after add at start of list:\n";
$obj->addFirst("helloeveryone");
$obj->readNode();
?>