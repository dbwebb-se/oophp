<?php
interface B
{
    public function b();
}

class A implements B
{
    private $a = "A";

    public function a()
    {
        return $this->a;
    }

    public function b()
    {
        return "B";
    }
}

$a = new A();
echo $a->a() . "\n";
echo $a->b() . "\n";
echo "\n\n";
