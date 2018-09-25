<?php
abstract class Animal
{
    private $type;
    abstract public function sound();
}

class Dog extends Animal
{
    protected static $legs = 4;

    public function __construct()
    {
        $this->type = "Dog";
    }

    public function sound()
    {
        return $this->type . " says vov vov!!!\n";
    }

    public function legs()
    {
        return $this->type . " has " . self::$legs . " legs.\n";
    }

    public static function getLegs()
    {
        return "I have " . self::$legs . " legs.\n";
    }
}

// $dog = new Dog();
// echo $dog->sound();
// echo $dog->legs();
// echo $dog->getLegs();
// echo Dog::getLegs();
// echo "\n\n";


// ---------------------------------------------------

class DogDebuggable extends Dog
{
    function __toString()
    {
        return $this->sound() . $this->legs();
    }

    function __debugInfo()
    {
        return [
            "legs" => self::$legs,
            "type" => $this->type,
        ];
    }

    function __invoke()
    {
        return $this->sound() . $this->legs();
    }
}

$dog = new DogDebuggable();
echo $dog;
//var_dump($dog);
echo $dog();
echo "\n";









//
