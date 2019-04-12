<?php

define('APP_START', microtime(true));

require __DIR__ . "/../vendor/autoload.php";

$GLOBALS['app'] = (new \Core\App(__DIR__ . '/..'));
$GLOBALS['app']->serve();
