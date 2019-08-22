<?php

define('APP_START', microtime(true));

require __DIR__ . "/../vendor/autoload.php";

$GLOBALS['app'] = $app = \Core\App::getInstance();

$app->initialize();

echo $app->run();
