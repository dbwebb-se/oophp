<pre>
<?php
require "Movie.php";
require "../php-pdo-mysql/src/autoload.php";
require "../php-pdo-mysql/src/config.php";

$db = new Database();
$db->connect($databaseConfig);
$sql = "SELECT * FROM movie;";

echo "Various ways of fetching resultset from the database.\n";
echo "--------------------------------------------\n$sql\n";



echo "\n\nFETCH\n--------------------------------------------\n";
echo "Fetch one item, object style (not array style).\n";
$movie = $db->executeFetch($sql);
var_dump($movie);



echo "\n\nFETCH CLASS\n--------------------------------------------\n";
echo "Fetch one item, and return it within an object of the selected class. The properties are public.\n\n";
$movie = $db->executeFetchClass($sql, "\Mos\Movie\Movie");
var_dump($movie);



echo "\n\nFETCH INTO\n--------------------------------------------\n";
echo "Pre-create an object from an class, use it and populate its properties from an resultset. The properties are public.\n\n";
$aMovie = new \Mos\Movie\Movie();
$aMovie->title = "No title";
$aMovie->anotherProperty = true;
$movie = $db->executeFetchInto($sql, $aMovie);
var_dump($movie);



echo "\n\nFETCH ALL\n--------------------------------------------\n";
echo "Fetch all items, object style (not array style).\n";
$movie = $db->executeFetchAll($sql);
var_dump($movie);
