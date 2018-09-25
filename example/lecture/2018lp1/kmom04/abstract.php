<?php
abstract class Animal
{
    private $type;
    abstract public function sound();
}

class Dog extends Animal
{
    public function __construct()
    {
        $this->type = "Dog";
    }

    public function sound()
    {
        return $this->type . " says vov vov!!!";
    }
}

$dog = new Dog();
echo $dog->sound();
echo "\n\n";
