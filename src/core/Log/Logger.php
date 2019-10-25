<?php

namespace Core\Log;

use Core\Support\Singleton;

class Logger extends Singleton {
	private $logpath;

	function __construct($app) {
		$this->logpath = $app->config('paths.root')
			. $app->config('paths.logs')
			. '/'
			. date($app->config('logging.fileformat'))
			. '.log';
	}

	public static function error($msg) {
		static::getInstance()->write('[!] ' . $msg);
	}

	public static function warn($msg) {
		static::getInstance()->write('[?] ' . $msg);
	}

	public static function info($msg) {
		static::getInstance()->write('[^] ' . $msg);
	}

	public static function success($msg) {
		static::getInstance()->write('[#] ' . $msg);
	}

	public static function log($msg) {
		static::getInstance()->write('[+] ' . $msg);
	}

	private function write($data) {
		$logfile = fopen($this->logpath, 'a');
		if ( ! $logfile) {
			print('failed to open log file');
			return;
		}
		fwrite($logfile, print_r($data, true) . '\n');
		fclose($logfile);
	}
}
