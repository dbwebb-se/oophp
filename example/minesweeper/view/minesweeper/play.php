<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

//var_dump($game);
$size = 64/8;



?><h1>Minesweeper board</h1>

<div class="board">
<?php for ($i = 0; $i < $size; $i++) : ?>
    <div class="row">
    <?php for ($j = 0; $j < $size; $j++) :
        $pos = $i * 8 + $j;
        $block = $game->getBlock($pos);
        $open = $block->isOpen() ? "open" : null;
        $mine = $block->hasMine() ? "mine" : null;
        ?>
        <a href="<?= url("minesweeper/push/$pos") ?>" class="block <?= $open ?> <?= $mine ?>"></a>
    <?php endfor; ?>
    </div>
<?php endfor; ?>
</div>

<p><a href="<?= url("minesweeper/play") ?>">Play the game!</a></p>
