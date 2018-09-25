<?php
trait B
{
    private $b = "B";

    public function b()
    {
        return $this->b;
    }
}

trait C
{
    public function c()
    {
        return "C";
    }
}

class A
{
    use B, C;

    private $a = "A";

    public function a()
    {
        return $this->a;
    }
}

$a = new A();
echo $a->a() . "\n";
echo $a->b() . "\n";
echo $a->c() . "\n";
echo "\n\n";
