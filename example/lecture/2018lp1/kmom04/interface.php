<?php
/**
 * @codingStandardsIgnoreStart
 * @SuppressWarnings(PHPMD)
 */
interface B
{
    public function bb();
}

/**
 * @SuppressWarnings(PHPMD)
 */
class A implements B
{
    private $a = "A";

    public function aa()
    {
        return $this->a;
    }

    public function bb()
    {
        return "B";
    }
}

$a = new A();
echo $a->aa() . "\n";
echo $a->bb() . "\n";
echo "\n\n";
