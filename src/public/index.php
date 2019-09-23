<?php

define('APP_START', microtime(true));

require __DIR__ . "/../vendor/autoload.php";

$app = \Core\App::getInstance();
$app->boot();

exit($app->run());
