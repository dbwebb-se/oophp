<?php
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

echo "<pre>";

$request = new Request();
echo $request->getMethod() . "\n";
echo $request->getCurrentUrl() . "\n";

$url = $request->getCurrentUrl();
$parts = parse_url($url);
print_r($parts);

$path = trim($parts["path"], "/");
$pathElements = explode("/", $path);
print_r($pathElements);

$script = $_SERVER["SCRIPT_NAME"];
echo "Script: '$script'\n";
echo "Path:   '$path'";

// $val = 42;
// echo $val . " fyra två ";
// echo "{$this->val}fyra två;
