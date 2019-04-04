<?php
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

// echo "Hello oophp\n";
// echo PHP_VERSION . "\n";
echo "\n";

$orc = new Orc();

var_dump($orc);

echo "\n";

echo "My name is " . $orc->getName() . " I am " . $orc->getAge() . "years old.\n";

echo "\n";

//
// echo "\n" . $orc->getName() . "\n";
