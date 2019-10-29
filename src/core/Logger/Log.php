<?php

namespace Core\Logger;

use Core\Support\Singleton;
use Core\Filesystem\Filesystem;

class Log extends Singleton {
	public function __construct($app) {
		$this->logfolder = pather([$app->config('paths.root'), $app->config('paths.logs')]);
		$this->logname = date($app->config('logging.fileformat')) . '.log';
		$this->logpath = pather([$this->logfolder, $this->logname]);
	}

	public static function important($msg) { static::getInstance()->write((string) $msg, '*'); }
	public static function success($msg)   { static::getInstance()->write((string) $msg, '+'); }
	public static function error($msg)     { static::getInstance()->write((string) $msg, '!'); }
	public static function debug($msg)     { static::getInstance()->write((string) $msg, '?'); }
	public static function warn($msg)      { static::getInstance()->write((string) $msg, '^'); }
	public static function info($msg)      { static::getInstance()->write((string) $msg, '$'); }
	public static function log($msg)       { static::getInstance()->write((string) $msg, '='); }

	private function write($contents, $type = '=') {
		return (bool) Filesystem::append($this->logpath, sprintf("[%s] (%s) %s\r\n", $type, date('m-d-y h:m:s'), $contents));
	}
}
