<?php
//stack implementation
class Stack
{
    protected $stack;
    protected $limit;

    public function __construct($limit = 101) {
        // initialize the stack
        $this->stack = array();
        // stack can only contain this many items
        $this->limit = $limit;
    }

    public function push($item) {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
          throw new RunTimeException('Stack is empty!');
      } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
    }

    public function peek() {
        echo "Top item:".current($this->stack)."\n";
    }

    public function isEmpty() {
        return empty($this->stack);
        
    }

    public function search($item)
    {
        $search_result=in_array($item,$this->stack);    //prints 1 if $item is present otherwise false
        if($search_result==1){
            echo "true\n";
        }
        else{
            echo "false\n";
        }
    }

    public function show(){
        print_r($this->stack);
    }

    public function size(){
        echo "Size is:".count($this->stack)."\n";
    }
}
// $obj=new Stack;
// $obj->push(10);
// $obj->push(20);
// $obj->push(30);
// $obj->push(40);
// $obj->pop();
// $obj->push(50);
// $obj->peek();
// $obj->show();
// $obj->size();
// $obj->search(20);
?>