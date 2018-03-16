<?php
/**
 * Bootstrap the framework and handle the request.
 */

// Were are all the files?
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
define("ANAX_APP_PATH", ANAX_INSTALL_PATH);

// Include essentials
require ANAX_INSTALL_PATH . "/config/error_reporting.php";

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . "/vendor/autoload.php";

// Add all resources to $app
$di  = new \Anax\DI\DIFactoryConfig("di.php");
$app = new \Anax\App\AppDIMagic();
$di->setShared("app", $app);
$app->setDI($di);

// Include more routes
require(__DIR__ . "/../src/route/app.php");

// Leave to router to match incoming request to routes
$app->router->handle(
    $app->request->getRoute(),
    $app->request->getMethod()
);
