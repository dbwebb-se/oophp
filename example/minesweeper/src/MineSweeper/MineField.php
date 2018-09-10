<?php

namespace Mos\MineSweeper;

/**
 * The minefield
 */
class MineField
{
    /**
     * @var int   $size   Height and width of the field.
     * @var array $blocks All blocks of the minefiled.
     */
    private $size = 64;
    private $blocks = [];



    /**
     * Init the minefield and include mines.
     *
     * @param int $mines number of mines to place out.
     *
     * @return void
     */
    public function init(int $mines) : void
    {
        for ($i = 0; $i < $this->size; $i++) {
            $this->blocks[$i] = new MineFieldBlock();
        }

        for ($i = 0; $i < $mines; $i++) {
            $pos = rand(0, $this->size - 1);
            $this->blocks[$pos]->placeMine();
        }
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
        return $this->blocks[$pos];
    }
}
