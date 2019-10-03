<?php
//single linkedlist 
class listnode{
    public $data;
    public $next;
    function __construct($data){
        $this->data=$data;
        $this->next=null;
    }
    public function show(){
        return $this->data;
    }
}
class linkedlist{
    private $firstNode;
    private $lastNode;
    private $count;
    function __construct(){
        $this->firstNode=null;
        $this->lastNode=null;
    }

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

    public function isEmpty(){
        return $this->firstNode=null;
    }
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
 
    public function removeFirst()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;
        if($this->firstNode != NULL)
            $this->count--;
 
        return $temp;
    }

    public function removeLast()          //removes last item
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

    public function show()
    {
        $current = $this->firstNode;
        while($current!= null)
        {
            echo $current->show()." ";
            $current = $current->next;
        }
        echo "\n";
    }

    public function size()
    {
        echo "size is:".$this->count."\n";
    }

}
// $obj=new linkedlist;
// $obj->add(10);
// $obj->add(60);
// $obj->add(40);
// $obj->add(50);
// $obj->add(99);
// $obj->addFirst(30);
// $obj->remove(40);
// $obj->show();
// $obj->removeLast();
// $obj->show();
// $obj->size();
?>