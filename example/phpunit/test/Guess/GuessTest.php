<?php

namespace Mos\Guess;

/**
 * Test cases for class Guess.
 */
class GuessTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test case to construct object and verify that the object
     * has the expected properties due various ways of constructing
     * it.
     */
    public function testCreateObject()
    {
        $guess = new Guess();
        $this->assertInstanceOf("\Mos\Guess\Guess", $guess);
        $this->assertEquals(6, $guess->tries());

        $guess = new Guess(42);
        $this->assertInstanceOf("\Mos\Guess\Guess", $guess);
        $this->assertEquals(6, $guess->tries());
        $this->assertEquals(42, $guess->number());

        $guess = new Guess(42, 7);
        $this->assertInstanceOf("\Mos\Guess\Guess", $guess);
        $this->assertEquals(7, $guess->tries());
        $this->assertEquals(42, $guess->number());
    }


    /**
     * Test case to initiate through re-randomze an object.
     */
    public function testRandom()
    {
        $guess = new Guess();
        $guess->random();
        $this->assertEquals(6, $guess->tries());

        $guess->random(7);
        $this->assertEquals(7, $guess->tries());
    }
}
