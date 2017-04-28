<?php

namespace Mos\Guess;

/**
 * Guess my number.
 */
class Guess
{
    /**
     * @var integer $number the number to guess.
     * @var number  $tries  number of tries allowed.
     */
    public $number;
    public $tries;



    /**
     * Constructor to initiate a object.
     *
     * @param null|integer $number the number to guess.
     * @param  integer     $tries  number of tries allowed.
     */
    public function __construct($number = null, $tries = 6)
    {
        $this->number = $number;
        $this->tries = $tries;

        if (is_null($number)) {
            $this->random($tries);
        }
    }



    /**
     * Randomize a new number.
     *
     * @param  integer $tries  number of tries allowed.
     *
     * @return void
     */
    public function random($tries = 6)
    {
        $this->number = rand(1, 100);
        $this->tries = $tries;
    }



    /**
     * Get number of tries left.
     *
     * @return integer as number of tries left.
     */
    public function tries()
    {
        return $this->tries;
    }



    /**
     * Get the current guess number.
     *
     * @return integer as current random number.
     */
    public function number()
    {
        return $this->number;
    }



    /**
     * Make a guess.
     *
     * @param integer $number a guess.
     *
     * @return string saying if the guess was correct, to high or
     *                to low.
     *
     * @throws GuessException when guess is out of range.
     */
    public function makeGuess($number)
    {
        if ($number < 1 || $number > 100) {
            throw new GuessException("Out of range.");
        }

        if ($this->tries < 1) {
            return "no guesses left.";
        }
        $this->tries--;

        if ($this->number > $number) {
            return "to low...";
        } elseif ($this->number < $number) {
            return "to high...";
        }
        return "correct!!!";
    }
}
