<?php
class CDice
{
    public $rolls;
    public $faces;

    public function __construct($faces = 6)
    {
        $this->faces = $faces;
    }

    public function roll($times = 1)
    {
        $this->rolls = [];
   
        for ($i = 0; $i < $times; $i++) {
            $this->rolls[] = rand(1, 6);
        }
    }
}

// Create a new object from the class
$dice = new CDice();

// Access methods
$dice->roll(6);

// Access public properties
echo $dice->rolls[0];
print_r($dice->rolls);

//var_dump($dice);
