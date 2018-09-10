<?php

namespace Mos\MineSweeper;

/**
 * Play the game of minesweeper.
 */
class Game
{
    /**
     * @var MineField $mineField as the current minefield.
     */
    private $mineField;



    /**
     * Init the game and read current settings from session, if available.
     *
     * @return void
     */
    public function init() : void
    {
        $this->mineField = new MineField();
        $this->mineField->init(10);
    }



    /**
     * Get the block on this positition.
     *
     * @param int $pos the position to get block from.
     *
     * @return MineFieldBlock
     */
    public function getBlock(int $pos) : object
    {
        return $this->mineField->getBlock($pos);
    }



    /**
     * Push a block on this positition.
     *
     * @param int $pos the position to push block.
     *
     * @return void
     */
    public function pushBlock(int $pos)
    {
        $this->mineField->getBlock($pos)->open();
    }
}
