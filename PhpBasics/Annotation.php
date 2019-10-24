<?php
class Person
{
    /**
     * @var string
     * @length(50)
     * @required
     * @text('label'=>'full name')
     */
    public $name;
    /**
     * @var string
     * @length(50)
     * @text('label'=>'street address')
     */
    public $address;
    /**
     * @var int
     * @range(0,100)
     */
    public $age;
}

// use ORM\Entity;
// use ORM\Id;
// use ORM\Column;
// [@Entity]
// [@Table("foo")]

class Foo
{
    // [@Id]
    // [@Column("id","uuid")]
    private $id;
}

// use MVC\Route;
class FooController
{
    // [@Route("/api/foo",["POST"],"foo-created")
    public function create(Request $request):Response
    {
        //specific implementation
    }
}