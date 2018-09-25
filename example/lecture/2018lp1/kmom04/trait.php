<?php
/**
 * @codingStandardsIgnoreStart
 * @SuppressWarnings(PHPMD)
 */
trait B
{
    private $b = "B";

    public function bb()
    {
        return $this->b;
    }
}

/**
 * @SuppressWarnings(PHPMD)
 */
trait C
{
    public function cc()
    {
        return "C";
    }
}

/**
 * @SuppressWarnings(PHPMD)
 */
class A
{
    use B, C;

    private $a = "A";

    public function aa()
    {
        return $this->a;
    }
}

$a = new A();
echo $a->aa() . "\n";
echo $a->bb() . "\n";
echo $a->cc() . "\n";
echo "\n\n";
