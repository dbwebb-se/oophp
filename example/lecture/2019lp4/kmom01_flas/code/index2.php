<?php
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

session_name("mosstud");
session_start();

?><hr>
<pre>
SESSION
<?= var_dump($_SESSION) ?>
</pre>

<?php

$who = $_POST["who"] ?? "nobody";

$counter = $_SESSION["counter"] ?? 0;
$_SESSION["counter"] = ++$counter;


?><h1>Sample GET, POST, SESSION</h1>
<form>
    <input type="text" name="who" value="<?= $who ?>">
    <input type="submit" name="doit">
</form>

<form method="post">
    <input type="text" name="who" value="<?= $who ?>">
    <input type="submit" name="doit">
</form>

<hr>
<pre>
SESSION
<?= var_dump($_SESSION) ?>
POST
<?= var_dump($_POST) ?>
GET
<?= var_dump($_GET) ?>
