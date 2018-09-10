<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Welcome to the Minesweeper game.
 */
$app->router->get("minesweeper", function () use ($app) {
    $app->page->add("minesweeper/index");

    return $app->page->render([
        "title" => "Play Minesweeper"
    ]);
});



/**
 * Play the game of minesweeper.
 */
$app->router->get("minesweeper/play", function () use ($app) {
    $game = $app->session->get("minesweeper");
    if (!$game) {
        $game = new \Mos\MineSweeper\Game();
        $game->init();
        $app->session->set("minesweeper", $game);
    }

    $app->page->add("minesweeper/play", [
        "game" => $game
    ]);

    return $app->page->render([
        "title" => "Play Minesweeper"
    ]);
});



/**
 * Push a block.
 */
$app->router->get("minesweeper/push/{id:digit}", function ($id) use ($app) {
    $game = $app->session->get("minesweeper");
    $game->pushBlock($id);

    return $app->response->redirect("minesweeper/play");
});
