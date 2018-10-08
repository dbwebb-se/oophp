<?php

interface ThatInterface
{
    public function thatMethod();
}

interface SomeInterface
{
    public function someMethod();
}

trait SomeTrait
{
    public function someMethod()
    {
        return "Trait implementing support for SomeInterface.";
    }
}

/**
 * A testclass SomeClass which implements the interface Someinterface
 * by using SomeTrait.
 */
class SomeClass implements someInterface
{
    use SomeTrait;
}
