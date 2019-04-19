<?php

define('APP_START', microtime(true));

require __DIR__ . "/../vendor/autoload.php";

$GLOBALS['app'] = $app = new \Core\App();

$app->run();
