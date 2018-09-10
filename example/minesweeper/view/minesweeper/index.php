<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Minesweeper</h1>

<p>Play a game of minesweeper?</p>

<p><a href="<?= url("minesweeper/play") ?>">Play the game!</a></p>
