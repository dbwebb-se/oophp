<?php
require __DIR__ . "/config.php";
require __DIR__ . "/../vendor/autoload.php";

use \Mos\Guess\Guess;

// For the view
$title = "Guess my number (GET)";

// Get incoming
$guess  = isset($_GET["guess"])  ? $_GET["guess"]  : null;
$number = isset($_GET["number"]) ? $_GET["number"] : null;
$tries  = isset($_GET["tries"])  ? $_GET["tries"]  : null;

// Start up the game
$game = new Guess($number, $tries);

// Reset the game
if (isset($_GET["reset"])) {
    $game->random();
}

// Do a guess
$res = null;
if (isset($_GET["doGuess"])) {
    $res = $game->makeGuess($guess);
}



?><!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<h1><?= $title ?></h1>

<?php if (isset($res)) : ?>
<p>Your guess <?= $guess ?> is <b><?= $res ?></b></p>
<?php endif; ?>

<p>Guess a number between 1 and 100, you have <?= $game->tries() ?> tries left.</p>

<form method="GET">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <input type="text" name="guess" value="<?= $guess ?>" autofocus>
    <input type="submit" name="doGuess" value="Make a Guess">
</form>

<p><a href="?reset">Reset the game</a></p>
