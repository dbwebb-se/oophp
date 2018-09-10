<?php

namespace Mos\MineSweeper;

/**
 * A block on the minefield.
 */
class MineFieldBlock
{
    /**
     * @var boolen $open True for clicked block, otherwise closed.
     * @var boolen $mine True for having a mine, otherwise false.
     */
    private $open = false;
    private $mine = false;



    /**
     * Place a mine on this block.
     *
     * @return void
     */
    public function placeMine() : void
    {
        $this->mine = true;
    }



    /**
     * Is a mine placed on this block?
     *
     * @return bool true if block has a mine, else false.
     */
    public function hasMine() : bool
    {
        return $this->mine;
    }



    /**
     * Is this block open or closed?
     *
     * @return bool true if block is open, else false.
     */
    public function isOpen() : bool
    {
        return $this->open;
    }



    /**
     * Open this block.
     *
     * @return void.
     */
    public function open() : void
    {
        $this->open = true;
    }
}
