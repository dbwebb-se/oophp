<?php

class A
{
    public $number;

    public function __construct($number = 1)
    {
        $this->number = $number;
    }
}

class B extends A
{
    public function __construct($number = 2)
    {
        parent::__construct($number);
    }
}

$c = new B();
echo "2 = {$c->number}\n";
