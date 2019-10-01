<?php
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
class linkedlist{
    private $firstNode;
    private $lastNode;
    private $count;
    function __construct(){
        $this->firstNode=null;
        $this->lastNode=null;
    }
    public function isEmpty(){
        return $this->firstNode=null;
    }
    public function insertFirst($data)
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
 
    public function insertLast($data)
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
            $this->insertFirst($data);
        }
    }
 
    public function deleteFirstNode()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;
        if($this->firstNode != NULL)
            $this->count--;
 
        return $temp;
    }

    public function deleteLastNode()
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
 
    public function deleteNode($key)
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

    public function readNode()
    {
        $current = $this->firstNode;
        while($current!= null)
        {
            echo $current->readNode()." ";
            $current = $current->next;
        }
        echo "\n";
    }

    public function totalNodes()
    {
        echo $this->count."\n";
    }

}
$obj=new linkedlist;
$obj->insertFirst(10);
$obj->insertFirst(60);
$obj->insertFirst(40);
$obj->insertLast(50);
$obj->insertFirst(30);
$obj->deleteFirstNode();
$obj->readNode();
$obj->totalNodes();
?>