<?php

namespace Core\Logger;

use Core\Support\Singleton;
use Core\Filesystem\Filesystem;

class Log extends Singleton {
	private $logpath;
	private $prefixformat;

	public function __construct($app) {
		$logfolder = pather([$app->config('paths.root'), $app->config('paths.logs')]);
		$logname = date($app->config('logging.fileformat')) . '.log';
		$this->logpath = pather([$logfolder, $logname]);
		$this->prefixformat = $app->config('logging.prefixformat');
	}

	public static function important($msg) { static::getInstance()->write((string) $msg, '*'); }
	public static function success($msg)   { static::getInstance()->write((string) $msg, '+'); }
	public static function debug($msg)     { static::getInstance()->write((string) $msg, '?'); }
	public static function error($msg)     { static::getInstance()->write((string) $msg, '!'); }
	public static function warn($msg)      { static::getInstance()->write((string) $msg, '^'); }
	public static function info($msg)      { static::getInstance()->write((string) $msg, '$'); }
	public static function log($msg)       { static::getInstance()->write((string) $msg, '='); }

	private function write($msg, $type = '=') {
		return (bool) Filesystem::append($this->logpath, sprintf("%s\r\n", sprintf($this->prefixformat, $type, date('m-d-y h:m:s'), $msg)));
	}
}
