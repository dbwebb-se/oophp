<pre>
<?php
require "Movie.php";
require "../php-pdo-mysql/src/autoload.php";
require "../php-pdo-mysql/src/config.php";

$db = new Database();
$db->connect($databaseConfig);
$sql = "SELECT * FROM movie;";

echo "###FETCHALL\n";
$movie = $db->executeFetchAll($sql);
var_dump($movie);

echo "###FETCH\n";
$movie = $db->executeFetch($sql);
var_dump($movie);

echo "###FETCH CLASS\n";
$movie = $db->executeFetchClass($sql, "\Mos\Movie\Movie");
var_dump($movie);

echo "###FETCH INTO\n";
$aMovie = new \Mos\Movie\Movie();
$aMovie->title = "No title";
$aMovie->anotherProperty = true;
$movie = $db->executeFetchInto($sql, $aMovie);
var_dump($movie);
