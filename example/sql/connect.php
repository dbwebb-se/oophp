<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

// $databaseConfig = [
//     "dsn"      => "mysql:host=127.0.0.1;dbname=oophp;",
//     "login"    => "user",
//     "password" => "pass",
//     "options"  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
// ];

$databaseConfig = [
    //"dsn"      => "mysql:host=127.0.0.1;charset=utf8;",
    "dsn"      => "mysql:host=127.0.0.1;port=13306;charset=utf8;",
    "login"    => "user",
    "password" => "pass",
    "options"  => null,
];

$db = new PDO(...array_values($databaseConfig));

$sql = "SHOW DATABASES";
$stm = $db->prepare($sql);
$stm->execute();
$res = $stm->fetchAll();
var_dump($res);
